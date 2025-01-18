<?php

namespace App\Service\Api;

use AbieSoft\AsetCode\Auth\Authentication;
use AbieSoft\AsetCode\Mysql\DB;
use AbieSoft\AsetCode\Utilities\Config;
use AbieSoft\AsetCode\Utilities\Input;
use AbieSoft\AsetCode\Utilities\Guard;
use AbieSoft\AsetCode\Utilities\Metafile;
use App\Model\Berita;
use App\Model\Kategori;
use App\Service\Service;
use Nette\Utils\Html;
use Shuchkin\SimpleXLSXGen;

class BeritaApi extends Service
{

    public $id, $judul, $namakategori, $dibaca, $publikasi;
    public function load($parameter = "")
    {
        return match (strtolower($_SERVER['REQUEST_METHOD'])) {
            'get' => $this->list($parameter),
            default => $this->post()
        };
    }

    protected function post()
    {
        $method = Input::get('__method');
        return match ($method) {
            'DELETE' => $this->remove(),
            'PATCH' => $this->replace(),
            default => $this->keep()
        };
    }

    public function excel()
    {
        $this->authentication('get');

        $data = [
            ['judul', 'isi', 'cover', 'link']
        ];

        $cek = DB::terhubung()->query("SELECT judul, isi, cover, slug FROM berita")->hasil();

        foreach ($cek as $c) {
            $item = [];
            $item[] = $c->judul;
            $item[] = strip_tags($c->isi);
            $item[] = Config::baseURL() . $c->cover;
            $item[] = Config::baseURL() . "berita/read/" . $c->slug;
            array_push($data, $item);
        }

        SimpleXLSXGen::fromArray($data)->saveAs('assets/download/berita_tabel.xlsx');

        $result = [];
        $result['code'] = 200;
        $result['message'] = 'OK';
        $result['data'] = ['assets/download/berita_tabel.xlsx'];
        echo json_encode($result);
    }

    protected function list($parameter)
    {
        if (count($parameter) > 0) {
            return match ($parameter[0]) {
                'terbaru' => $this->terbaru(),
                'populer' => $this->populer(),
                'kriminal' => $this->kriminal(),
                'nasional' => $this->nasional(),
                'politik' => $this->politik(),
                'bisnis' => $this->bisnis(),
                'katawarga' => $this->katawarga(),
                'institusi' => $this->institusi(),
                'lintasberita' => $this->lintasberita(),
                'olahraga' => $this->olahraga(),
                'internasional' => $this->internasional(),
                'edukasi' => $this->edukasi(),
                'terkait' => $this->terkait($parameter),
                'index_kriminal' => $this->indexkriminal(),
                'index_nasional' => $this->indexnasional(),
                'index_politik' => $this->indexpolitik(),
                'index_bisnis' => $this->indexbisnis(),
                'index_katawarga' => $this->indexkatawarga(),
                'index_institusi' => $this->indexinstitusi(),
                'index_lintasberita' => $this->indexlintasberita(),
                'index_olahraga' => $this->indexolahraga(),
                'index_internasional' => $this->indexinternasional(),
                'index_edukasi' => $this->indexedukasi(),
                'detail' => $this->detail($parameter),
                default => $this->error()
            };
        }

        $this->authentication('get');

        $auth = new Authentication;
        $data = [];

        $where = "";
        if ($auth->getGrupId() == "2") {
            $where = " AND berita.penulis = '" . $auth->getGrupId() . "' ";
        }

        $databerita = DB::terhubung()->query("SELECT berita.id, berita.judul, kategori.nama as namakategori, berita.dibaca, berita.publikasi, berita.editor FROM berita, kategori WHERE berita.kategoriid = kategori.id " . $where . " ")->hasil();
        foreach ($databerita as $db) {
            $berita = new BeritaApi;
            $berita->id = $db->id;
            $berita->judul = $db->judul;
            $berita->namakategori = "<div class='text-center'>" . $db->namakategori . "</div>";
            $berita->dibaca = "<div class='text-center'>" . $db->dibaca . "</div>";
            $badgeColor = "info";
            $publikasi = "Pending";
            if ($db->editor != 0) {
                if ($db->publikasi == "terbit") {
                    $badgeColor = "success";
                    $publikasi = $db->publikasi;
                } else {
                    $badgeColor = "danger";
                    $publikasi = $db->publikasi;
                }
            } else {
                if ($db->publikasi == "draft") {
                    $badgeColor = "danger";
                    $publikasi = $db->publikasi;
                }
            }
            $berita->publikasi = "<div class='text-center'><span class='badge " . $badgeColor . "'>" . ucfirst($publikasi) . "</span></div>";
            $data[] = $berita;
        }
        $result = [];
        $result['code'] = 200;
        $result['message'] = 'OK';
        $result['data'] = $data;
        $result['opsi'] = 'EDR';
        echo json_encode($result);
    }

    protected function keep()
    {
        $this->authentication('post');

        $csrf = Input::get('__csrf');

        if (Guard::formChecker($csrf)) {
            return $this->postWithFile();
        } else {
            die('Token Expire');
        }
    }

    protected function postWithFile()
    {
        $meta = new Metafile;
        if (count(explode("/", $meta->approver("cover"))) > 2) {
            $cover = $meta->approver("cover");
            return $this->postWithoutFile($cover);
        } else {
            die($meta->approver("cover"));
        }
    }

    protected function postWithoutFile($cover = "")
    {
        $auth = new Authentication;

        $judul = Input::get('judul');
        $slug = Input::get('slug');
        $potongan = Input::get('potongan');
        $isi = Input::get('isi');
        $tag = Input::get('tag');
        $kategoriid = Input::get('kategoriid');
        $komentar = Input::get('komentar');
        $publikasi = Input::get('publikasi');
        $jadwal = Input::get('jadwal');
        $infogambar = Input::get('infogambar');

        $input = DB::terhubung()->input("berita", [
            'judul' => $judul,
            'slug' => $slug,
            'potongan' => $potongan,
            'isi' => $isi,
            'tag' => $tag,
            'kategoriid' => $kategoriid,
            'komentar' => $komentar,
            'publikasi' => $publikasi,
            'jadwal' => $jadwal,
            'cover' => $cover,
            'infogambar' => $infogambar,
            'penulis' => $auth->getId()
        ]);

        if ($input) {
            die("Berhasil");
        } else {
            die("Gagal memperbarui data");
        }
    }

    protected function replace()
    {
        $this->authentication('post');
        $csrf = Input::get('__csrf');

        if (Guard::formChecker($csrf)) {
            if (Input::file("cover", "name") != "") {
                return $this->patchWithFile();
            } else {
                return $this->patchWithoutFile();
            }
        } else {
            die('Token Expire');
        }
    }

    protected function patchWithFile()
    {
        $meta = new Metafile;
        if (count(explode("/", $meta->approver("cover"))) > 2) {
            $cover = $meta->approver("cover");
            return $this->postWithoutFile($cover);
        } else {
            die($meta->approver("cover"));
        }
    }

    protected function patchWithoutFile($cover = "")
    {
        $id = Input::get('id');
        $judul = Input::get('judul');
        $slug = Input::get('slug');
        $potongan = Input::get('potongan');
        $isi = Input::get('isi');
        $tag = Input::get('tag');
        $kategoriid = Input::get('kategoriid');
        $komentar = Input::get('komentar');
        $publikasi = Input::get('publikasi');
        $jadwal = Input::get('jadwal');
        if ($cover != "") {
            $cover = $cover;
        } else {
            $cover = Berita::only(id: $id, select: "cover", output: "string");
        }
        $infogambar = Input::get('infogambar');

        $perbarui = DB::terhubung()->perbarui("berita", $id, [
            'judul' => $judul,
            'slug' => $slug,
            'potongan' => $potongan,
            'isi' => $isi,
            'tag' => $tag,
            'kategoriid' => $kategoriid,
            'komentar' => $komentar,
            'publikasi' => $publikasi,
            'jadwal' => $jadwal,
            'cover' => $cover,
            'infogambar' => $infogambar
        ]);

        if ($perbarui) {
            die("Berhasil");
        } else {
            die("Gagal memperbarui data");
        }
    }

    protected function remove()
    {
        $this->authentication('post');
        $csrf = Input::get('__csrf');
        $id = Input::get('id');
        $nama = '';

        if (Guard::formChecker($csrf)) {
            $data = DB::terhubung()->query("SELECT nama FROM users WHERE  id='" . $id . "'  ");
            foreach ($data->hasil() as $d) {
                $nama = $d->nama;
            }
            $hapus = DB::terhubung()->hapus('berita', ['id', '=', $id]);
            if ($hapus) {
                die('Berhasil|User <strong>' . $nama . '</strong> sudah dihapus');
            }
        } else {
            die('Token Expire');
        }
    }

    protected function error()
    {
        $data = [];
        $result = [];
        $result['code'] = 503;
        $result['message'] = 'BAD REQUEST';
        $result['data'] = $data;
        echo json_encode($result);
    }


    protected function terbaru()
    {
        $data = [];

        $cek = DB::terhubung()->query("SELECT id, slug, judul, cover, jadwal as tglpublis FROM berita WHERE publikasi = 'terbit' AND editor != '0' ORDER BY id DESC LIMIT 5 OFFSET 5")->hasil();

        foreach ($cek as $c) {
            $item = [];
            $item['slug'] = $c->slug;
            $item['judul'] = $c->judul;
            $item['cover'] = Config::baseURL() . $c->cover;
            $item['tglpublis'] = $c->tglpublis;
            array_push($data, $item);
        }

        $result = [];
        $result['code'] = 200;
        $result['message'] = 'OK';
        $result['data'] = $data;
        echo json_encode($result);
    }

    protected function populer()
    {
        $data = [];

        $cek = DB::terhubung()->query("SELECT id, slug, judul, cover, jadwal as tglpublis FROM berita WHERE publikasi = 'terbit' AND editor != '0' ORDER BY dibaca DESC LIMIT 8")->hasil();

        foreach ($cek as $c) {
            $item = [];
            $item['slug'] = $c->slug;
            $item['judul'] = $c->judul;
            $item['cover'] = Config::baseURL() . $c->cover;
            $item['tglpublis'] = $c->tglpublis;
            array_push($data, $item);
        }

        $result = [];
        $result['code'] = 200;
        $result['message'] = 'OK';
        $result['data'] = $data;
        echo json_encode($result);
    }


    protected function nasional()
    {
        $data = [];

        $cek = DB::terhubung()->query("SELECT id, slug, judul, potongan, cover, jadwal as tglpublis FROM berita WHERE publikasi = 'terbit' AND editor != '0' AND kategoriid = '1' ORDER BY id DESC LIMIT 10")->hasil();

        foreach ($cek as $c) {
            $item = [];
            $item['slug'] = $c->slug;
            $item['judul'] = $c->judul;
            $item['potongan'] = strip_tags(Html::htmlToText($c->potongan));
            $item['cover'] = Config::baseURL() . $c->cover;
            $item['tglpublis'] = $c->tglpublis;
            array_push($data, $item);
        }

        $result = [];
        $result['code'] = 200;
        $result['message'] = 'OK';
        $result['data'] = $data;
        echo json_encode($result);
    }

    protected function kriminal()
    {
        $data = [];

        $cek = DB::terhubung()->query("SELECT id, slug, judul, cover, jadwal as tglpublis FROM berita WHERE publikasi = 'terbit' AND editor != '0' AND kategoriid = '3' ORDER BY id DESC LIMIT 5")->hasil();

        foreach ($cek as $c) {
            $item = [];
            $item['slug'] = $c->slug;
            $item['judul'] = $c->judul;
            $item['cover'] = Config::baseURL() . $c->cover;
            $item['tglpublis'] = $c->tglpublis;
            array_push($data, $item);
        }

        $result = [];
        $result['code'] = 200;
        $result['message'] = 'OK';
        $result['data'] = $data;
        echo json_encode($result);
    }

    protected function politik()
    {
        $data = [];

        $cek = DB::terhubung()->query("SELECT id, slug, judul, cover, jadwal as tglpublis FROM berita WHERE publikasi = 'terbit' AND editor != '0' AND kategoriid = '4' ORDER BY id DESC LIMIT 5")->hasil();

        foreach ($cek as $c) {
            $item = [];
            $item['slug'] = $c->slug;
            $item['judul'] = $c->judul;
            $item['cover'] = Config::baseURL() . $c->cover;
            $item['tglpublis'] = $c->tglpublis;
            array_push($data, $item);
        }

        $result = [];
        $result['code'] = 200;
        $result['message'] = 'OK';
        $result['data'] = $data;
        echo json_encode($result);
    }

    protected function bisnis()
    {
        $data = [];

        $cek = DB::terhubung()->query("SELECT id, slug, judul, cover, jadwal as tglpublis FROM berita WHERE publikasi = 'terbit' AND editor != '0' AND kategoriid = '8' ORDER BY id DESC LIMIT 5")->hasil();

        foreach ($cek as $c) {
            $item = [];
            $item['slug'] = $c->slug;
            $item['judul'] = $c->judul;
            $item['cover'] = Config::baseURL() . $c->cover;
            $item['tglpublis'] = $c->tglpublis;
            array_push($data, $item);
        }

        $result = [];
        $result['code'] = 200;
        $result['message'] = 'OK';
        $result['data'] = $data;
        echo json_encode($result);
    }

    protected function katawarga()
    {
        $data = [];

        $cek = DB::terhubung()->query("SELECT id, slug, judul, cover, jadwal as tglpublis FROM berita WHERE publikasi = 'terbit' AND editor != '0' AND kategoriid = '5' ORDER BY id DESC LIMIT 5")->hasil();

        foreach ($cek as $c) {
            $item = [];
            $item['slug'] = $c->slug;
            $item['judul'] = $c->judul;
            $item['cover'] = Config::baseURL() . $c->cover;
            $item['tglpublis'] = $c->tglpublis;
            array_push($data, $item);
        }

        $result = [];
        $result['code'] = 200;
        $result['message'] = 'OK';
        $result['data'] = $data;
        echo json_encode($result);
    }

    protected function institusi()
    {
        $data = [];

        $cek = DB::terhubung()->query("SELECT id, slug, judul, potongan, cover, jadwal as tglpublis FROM berita WHERE publikasi = 'terbit' AND editor != '0' AND kategoriid = '2' ORDER BY id DESC LIMIT 10")->hasil();

        foreach ($cek as $c) {
            $item = [];
            $item['slug'] = $c->slug;
            $item['judul'] = $c->judul;
            $item['potongan'] = strip_tags(Html::htmlToText($c->potongan));
            $item['cover'] = Config::baseURL() . $c->cover;
            $item['tglpublis'] = $c->tglpublis;
            array_push($data, $item);
        }

        $result = [];
        $result['code'] = 200;
        $result['message'] = 'OK';
        $result['data'] = $data;
        echo json_encode($result);
    }

    protected function lintasberita()
    {
        $data = [];

        $cek = DB::terhubung()->query("SELECT id, slug, judul, cover, jadwal as tglpublis FROM berita WHERE publikasi = 'terbit' AND editor != '0' AND kategoriid = '9' ORDER BY id DESC LIMIT 5")->hasil();

        foreach ($cek as $c) {
            $item = [];
            $item['slug'] = $c->slug;
            $item['judul'] = $c->judul;
            $item['cover'] = Config::baseURL() . $c->cover;
            $item['tglpublis'] = $c->tglpublis;
            array_push($data, $item);
        }

        $result = [];
        $result['code'] = 200;
        $result['message'] = 'OK';
        $result['data'] = $data;
        echo json_encode($result);
    }

    protected function olahraga()
    {
        $data = [];

        $cek = DB::terhubung()->query("SELECT id, slug, judul, cover, jadwal as tglpublis FROM berita WHERE publikasi = 'terbit' AND editor != '0' AND kategoriid = '6' ORDER BY id DESC LIMIT 5")->hasil();

        foreach ($cek as $c) {
            $item = [];
            $item['slug'] = $c->slug;
            $item['judul'] = $c->judul;
            $item['cover'] = Config::baseURL() . $c->cover;
            $item['tglpublis'] = $c->tglpublis;
            array_push($data, $item);
        }

        $result = [];
        $result['code'] = 200;
        $result['message'] = 'OK';
        $result['data'] = $data;
        echo json_encode($result);
    }

    protected function internasional()
    {
        $data = [];

        $cek = DB::terhubung()->query("SELECT id, slug, judul, cover, jadwal as tglpublis FROM berita WHERE publikasi = 'terbit' AND editor != '0' AND kategoriid = '10' ORDER BY id DESC LIMIT 5")->hasil();

        foreach ($cek as $c) {
            $item = [];
            $item['slug'] = $c->slug;
            $item['judul'] = $c->judul;
            $item['cover'] = Config::baseURL() . $c->cover;
            $item['tglpublis'] = $c->tglpublis;
            array_push($data, $item);
        }

        $result = [];
        $result['code'] = 200;
        $result['message'] = 'OK';
        $result['data'] = $data;
        echo json_encode($result);
    }

    protected function edukasi()
    {
        $data = [];

        $cek = DB::terhubung()->query("SELECT id, slug, judul, potongan, cover, jadwal as tglpublis FROM berita WHERE publikasi = 'terbit' AND editor != '0' AND kategoriid = '7' ORDER BY id DESC LIMIT 5")->hasil();

        foreach ($cek as $c) {
            $item = [];
            $item['slug'] = $c->slug;
            $item['judul'] = $c->judul;
            $item['potongan'] = strip_tags(Html::htmlToText($c->potongan));
            $item['cover'] = Config::baseURL() . $c->cover;
            $item['tglpublis'] = $c->tglpublis;
            array_push($data, $item);
        }

        $result = [];
        $result['code'] = 200;
        $result['message'] = 'OK';
        $result['data'] = $data;
        echo json_encode($result);
    }

    protected function terkait($parameter)
    {

        $data = [];

        $cek = DB::terhubung()->query("SELECT id, slug, judul, potongan, cover, jadwal as tglpublis FROM berita WHERE publikasi = 'terbit' AND editor != '0' AND isi LIKE '%".Kategori::only(select:'nama', id:Berita::only(select:'kategoriid', id:$parameter[1], output:'string'),output:'string')."%' AND id !='".$parameter[1]."' ORDER BY id DESC LIMIT 5");

        if($cek->hitung() == 0){
            $cek = DB::terhubung()->query("SELECT id, slug, judul, potongan, cover, jadwal as tglpublis FROM berita WHERE publikasi = 'terbit' AND editor != '0' AND kategoriid = '1' AND id !='".$parameter[1]."' ORDER BY id DESC LIMIT 5")->hasil();
        }else{
            $cek = $cek->hasil();
        }

        foreach ($cek as $c) {
            $item = [];
            $item['slug'] = $c->slug;
            $item['judul'] = $c->judul;
            $item['potongan'] = strip_tags(Html::htmlToText($c->potongan));
            $item['cover'] = Config::baseURL() . $c->cover;
            $item['tglpublis'] = $c->tglpublis;
            array_push($data, $item);
        }

        $result = [];
        $result['code'] = 200;
        $result['message'] = 'OK';
        $result['data'] = $data;
        echo json_encode($result);
    }


























    protected function indexnasional()
    {
        $data = [];

        $cek = DB::terhubung()->query("SELECT id, slug, judul, potongan, cover, jadwal as tglpublis FROM berita WHERE publikasi = 'terbit' AND editor != '0' AND kategoriid = '1' ORDER BY id DESC")->hasil();

        foreach ($cek as $c) {
            $item = [];
            $item['slug'] = $c->slug;
            $item['judul'] = $c->judul;
            $item['potongan'] = strip_tags(Html::htmlToText($c->potongan));
            $item['cover'] = Config::baseURL() . $c->cover;
            $item['tglpublis'] = $c->tglpublis;
            array_push($data, $item);
        }

        $result = [];
        $result['code'] = 200;
        $result['message'] = 'OK';
        $result['data'] = $data;
        echo json_encode($result);
    }

    protected function indexkriminal()
    {
        $data = [];

        $cek = DB::terhubung()->query("SELECT id, slug, judul, potongan, cover, jadwal as tglpublis FROM berita WHERE publikasi = 'terbit' AND editor != '0' AND kategoriid = '3' ORDER BY id DESC")->hasil();

        foreach ($cek as $c) {
            $item = [];
            $item['slug'] = $c->slug;
            $item['judul'] = $c->judul;
            $item['potongan'] = strip_tags(Html::htmlToText($c->potongan));
            $item['cover'] = Config::baseURL() . $c->cover;
            $item['tglpublis'] = $c->tglpublis;
            array_push($data, $item);
        }

        $result = [];
        $result['code'] = 200;
        $result['message'] = 'OK';
        $result['data'] = $data;
        echo json_encode($result);
    }

    protected function indexpolitik()
    {
        $data = [];

        $cek = DB::terhubung()->query("SELECT id, slug, judul, potongan, cover, jadwal as tglpublis FROM berita WHERE publikasi = 'terbit' AND editor != '0' AND kategoriid = '4' ORDER BY id DESC")->hasil();

        foreach ($cek as $c) {
            $item = [];
            $item['slug'] = $c->slug;
            $item['judul'] = $c->judul;
            $item['potongan'] = strip_tags(Html::htmlToText($c->potongan));
            $item['cover'] = Config::baseURL() . $c->cover;
            $item['tglpublis'] = $c->tglpublis;
            array_push($data, $item);
        }

        $result = [];
        $result['code'] = 200;
        $result['message'] = 'OK';
        $result['data'] = $data;
        echo json_encode($result);
    }

    protected function indexbisnis()
    {
        $data = [];

        $cek = DB::terhubung()->query("SELECT id, slug, judul, potongan, cover, jadwal as tglpublis FROM berita WHERE publikasi = 'terbit' AND editor != '0' AND kategoriid = '8' ORDER BY id DESC")->hasil();

        foreach ($cek as $c) {
            $item = [];
            $item['slug'] = $c->slug;
            $item['judul'] = $c->judul;
            $item['potongan'] = strip_tags(Html::htmlToText($c->potongan));
            $item['cover'] = Config::baseURL() . $c->cover;
            $item['tglpublis'] = $c->tglpublis;
            array_push($data, $item);
        }

        $result = [];
        $result['code'] = 200;
        $result['message'] = 'OK';
        $result['data'] = $data;
        echo json_encode($result);
    }

    protected function indexkatawarga()
    {
        $data = [];

        $cek = DB::terhubung()->query("SELECT id, slug, judul, potongan, cover, jadwal as tglpublis FROM berita WHERE publikasi = 'terbit' AND editor != '0' AND kategoriid = '5' ORDER BY id DESC")->hasil();

        foreach ($cek as $c) {
            $item = [];
            $item['slug'] = $c->slug;
            $item['judul'] = $c->judul;
            $item['potongan'] = strip_tags(Html::htmlToText($c->potongan));
            $item['cover'] = Config::baseURL() . $c->cover;
            $item['tglpublis'] = $c->tglpublis;
            array_push($data, $item);
        }

        $result = [];
        $result['code'] = 200;
        $result['message'] = 'OK';
        $result['data'] = $data;
        echo json_encode($result);
    }

    protected function indexinstitusi()
    {
        $data = [];

        $cek = DB::terhubung()->query("SELECT id, slug, judul, potongan, cover, jadwal as tglpublis FROM berita WHERE publikasi = 'terbit' AND editor != '0' AND kategoriid = '2' ORDER BY id DESC")->hasil();

        foreach ($cek as $c) {
            $item = [];
            $item['slug'] = $c->slug;
            $item['judul'] = $c->judul;
            $item['potongan'] = strip_tags(Html::htmlToText($c->potongan));
            $item['cover'] = Config::baseURL() . $c->cover;
            $item['tglpublis'] = $c->tglpublis;
            array_push($data, $item);
        }

        $result = [];
        $result['code'] = 200;
        $result['message'] = 'OK';
        $result['data'] = $data;
        echo json_encode($result);
    }

    protected function indexlintasberita()
    {
        $data = [];

        $cek = DB::terhubung()->query("SELECT id, slug, judul, potongan, cover, jadwal as tglpublis FROM berita WHERE publikasi = 'terbit' AND editor != '0' AND kategoriid = '9' ORDER BY id DESC")->hasil();

        foreach ($cek as $c) {
            $item = [];
            $item['slug'] = $c->slug;
            $item['judul'] = $c->judul;
            $item['potongan'] = strip_tags(Html::htmlToText($c->potongan));
            $item['cover'] = Config::baseURL() . $c->cover;
            $item['tglpublis'] = $c->tglpublis;
            array_push($data, $item);
        }

        $result = [];
        $result['code'] = 200;
        $result['message'] = 'OK';
        $result['data'] = $data;
        echo json_encode($result);
    }

    protected function indexolahraga()
    {
        $data = [];

        $cek = DB::terhubung()->query("SELECT id, slug, judul, potongan, cover, jadwal as tglpublis FROM berita WHERE publikasi = 'terbit' AND editor != '0' AND kategoriid = '6' ORDER BY id DESC")->hasil();

        foreach ($cek as $c) {
            $item = [];
            $item['slug'] = $c->slug;
            $item['judul'] = $c->judul;
            $item['potongan'] = strip_tags(Html::htmlToText($c->potongan));
            $item['cover'] = Config::baseURL() . $c->cover;
            $item['tglpublis'] = $c->tglpublis;
            array_push($data, $item);
        }

        $result = [];
        $result['code'] = 200;
        $result['message'] = 'OK';
        $result['data'] = $data;
        echo json_encode($result);
    }

    protected function indexinternasional()
    {
        $data = [];

        $cek = DB::terhubung()->query("SELECT id, slug, judul, potongan, cover, jadwal as tglpublis FROM berita WHERE publikasi = 'terbit' AND editor != '0' AND kategoriid = '10' ORDER BY id DESC")->hasil();

        foreach ($cek as $c) {
            $item = [];
            $item['slug'] = $c->slug;
            $item['judul'] = $c->judul;
            $item['potongan'] = strip_tags(Html::htmlToText($c->potongan));
            $item['cover'] = Config::baseURL() . $c->cover;
            $item['tglpublis'] = $c->tglpublis;
            array_push($data, $item);
        }

        $result = [];
        $result['code'] = 200;
        $result['message'] = 'OK';
        $result['data'] = $data;
        echo json_encode($result);
    }

    protected function indexedukasi()
    {
        $data = [];

        $cek = DB::terhubung()->query("SELECT id, slug, judul, potongan, cover, jadwal as tglpublis FROM berita WHERE publikasi = 'terbit' AND editor != '0' AND kategoriid = '7' ORDER BY id DESC")->hasil();

        foreach ($cek as $c) {
            $item = [];
            $item['slug'] = $c->slug;
            $item['judul'] = $c->judul;
            $item['potongan'] = strip_tags(Html::htmlToText($c->potongan));
            $item['cover'] = Config::baseURL() . $c->cover;
            $item['tglpublis'] = $c->tglpublis;
            array_push($data, $item);
        }

        $result = [];
        $result['code'] = 200;
        $result['message'] = 'OK';
        $result['data'] = $data;
        echo json_encode($result);
    }

    protected function detail($parameter)
    {
        $result = [];
        $data=[];
        $idBerita =  $parameter[1];
        $cekBerita = DB::terhubung()->query("SELECT berita.judul, berita.slug, berita.isi, berita.cover, berita.infogambar, berita.komentar, berita.jadwal as tglterbit, kategori.nama as namakategori, users.nama as penulis FROM berita, kategori, users WHERE kategori.id = berita.kategoriid AND berita.penulis = users.id AND berita.id = '".$idBerita."' ");
        if($cekBerita->hitung()){
            foreach($cekBerita->hasil() as $b){
                $data['judul'] = $b->judul;
                $data['slug'] = $b->slug;
                $data['isi'] = Html::htmlToText($b->isi);
                $data['cover'] = $b->cover;
                $data['tglterbit'] = $b->tglterbit;
                $data['infogambar'] = ($b->infogambar) ? 'Foto: ' . $b->infogambar : '';
                $data['penulis'] = $b->penulis;
                $data['namakategori'] = $b->namakategori;
                $data['komentar'] = $b->komentar;
            }
        }
        $result['code'] = 200;
        $result['message'] = 'OK';
        $result['data'] = $data;
        echo json_encode($result);
    }
}
