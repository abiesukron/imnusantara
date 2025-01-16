<?php

namespace App\Controller;

use AbieSoft\AsetCode\Auth\Authentication;
use AbieSoft\AsetCode\Http\Controller;
use AbieSoft\AsetCode\Http\Lanjut;
use AbieSoft\AsetCode\Mysql\DB;
use AbieSoft\AsetCode\Utilities\Config;
use AbieSoft\AsetCode\Utilities\Guard;
use AbieSoft\AsetCode\Utilities\Split;
use AbieSoft\AsetCode\Utilities\Tanggal;
use App\Model\Berita as ModelBerita;
use App\Model\Kategori;
use App\Model\Users;
use App\Schema\berita;
use Nette\Utils\Html;

class BeritaController extends Controller
{

    public function index($parameter)
    {
        if (!is_string($parameter) and count($parameter) > 0) {
            return $this->websiteBerita($parameter);
        } else {
            if ($parameter == "index") {
                return $this->websiteBerita($parameter);
            } else {
                if (explode("/", $_SERVER['REQUEST_URI'])[1] != Config::envReader("ADMIN_PREFIX")) {
                    Lanjut::ke(Config::envReader("ADMIN_PREFIX") . "/berita");
                }
            }
        }

        $this->indexMiddleware("berita");
        return $this->view(
            page: 'berita/index',
            data: [
                'title' => 'Berita',
            ]
        );
    }

    public function add()
    {
        $this->createMiddleware("berita");
        return $this->view(
            page: 'berita/add',
            data: [
                'title' => 'Buat Berita',
                'kategori' => Kategori::all()
            ]
        );
    }

    public function edit($id)
    {
        $this->editMiddleware("berita");
        $auth = new Authentication;

        if (ModelBerita::only(id: $id, select: "penulis", output: "string") != $auth->getId()) {
            if ($auth->getNamaGrup() != "Administrator" && $auth->getNamaGrup() != "Editor") {
                Lanjut::ke(Config::envReader("ADMIN_PREFIX") . "/berita");
            }
        }

        return $this->view(
            page: 'berita/edit',
            data: [
                'title' => 'Edit Berita',
                'id' => $id,
                'kategori' => Kategori::all(),
                'cover' => ModelBerita::only(id: $id, select: "cover", output: "string"),
                'slug' => ModelBerita::only(id: $id, select: "slug", output: "string"),
                'judul' => ModelBerita::only(id: $id, select: "judul", output: "string"),
                'isi' => ModelBerita::only(id: $id, select: "isi", output: "string"),
                'potongan' => ModelBerita::only(id: $id, select: "potongan", output: "string"),
                'tag' => ModelBerita::only(id: $id, select: "tag", output: "string"),
                'idkategori' => ModelBerita::only(id: $id, select: "kategoriid", output: "string"),
                'namakategori' => Kategori::only(id: ModelBerita::only(id: $id, select: "kategoriid", output: "string"), select: "nama", output: "string"),
                'komentar' => ModelBerita::only(id: $id, select: "komentar", output: "string"),
                'publikasi' => ModelBerita::only(id: $id, select: "publikasi", output: "string"),
                'jadwal' => ModelBerita::only(id: $id, select: "jadwal", output: "string"),
            ]
        );
    }

    public function read($parameter)
    {
        $this->readMiddleware("berita");
        $id = "";
        if (is_string($parameter)) {
            $id = $parameter;
        } else {
            Lanjut::ke(Config::envReader("ADMIN_PREFIX") . "/berita");
        }

        $auth = new Authentication;

        if (ModelBerita::only(id: $id, select: "penulis", output: "string") != $auth->getId()) {
            if ($auth->getNamaGrup() != "Administrator" && $auth->getNamaGrup() != "Editor") {
                Lanjut::ke(Config::envReader("ADMIN_PREFIX") . "/berita");
            }
        }

        $berita = DB::terhubung()->query("
            SELECT 
                berita.id,
                berita.judul,
                berita.slug,
                berita.potongan,
                berita.isi,
                berita.cover,
                berita.dibaca,
                berita.copy,
                berita.facebook,
                berita.twitter,
                berita.wa,
                berita.tag,
                berita.publikasi,
                berita.jadwal,
                berita.dibuat,
                berita.diupdate,
                berita.penulis,
                berita.editor,
                kategori.nama as namakategori
            FROM
                berita,
                kategori
            WHERE 
                berita.kategoriid = kategori.id
                AND berita.id = '" . $id . "'
            ORDER BY id
            LIMIT 1
        ");
        $judul = "-";
        $slug = "-";
        $cover = "-";
        $potongan = "-";
        $penulis = "-";
        $editor = "-";
        $dibuat = "-";
        $diupdate = "-";
        $diterbitkan = "-";
        $dibaca = 0;
        $copy = 0;
        $facebook = 0;
        $twitter = 0;
        $wa = 0;
        $namakategori = "-";
        $emailpenulis = "-";
        $emaileditor = "-";
        $badge = "info";
        $publikasi = "Pending";
        if ($berita->hitung()) {
            foreach ($berita->hasil() as $b) {
                $cover = $b->cover;
                $slug = $b->slug;
                $judul = $b->judul;
                $isi = $b->isi;
                $potongan = $b->potongan;
                $penulis = Users::only(id: $b->penulis, select: "nama", output: "string");
                if ($b->editor != 0) {
                    $editor = Users::only(id: $b->editor, select: "nama", output: "string");
                }
                $dibuat = Tanggal::simpelAndTime(strVal($b->dibuat));
                if ($b->diupdate != null) {
                    $diupdate = Tanggal::simpelAndTime(strval($b->diupdate));
                }
                if ($b->editor != null || $b->editor != 0) {
                    $diterbitkan = Tanggal::simpelAndTime(strval($b->jadwal));
                    $publikasi = ucfirst($b->publikasi);
                    if ($b->publikasi != "terbit") {
                        $badge = "danger";
                    } else {
                        $badge = "success";
                    }
                } else {
                    if ($b->publikasi == "draft") {
                        $badge = "danger";
                    }
                }
                $dibaca = $b->dibaca;
                $copy = $b->copy;
                $facebook = $b->facebook;
                $twitter = $b->twitter;
                $wa = $b->wa;
                $namakategori = $b->namakategori;
                $emailpenulis = Users::only(id: $b->penulis, select: "email", output: "string");
                $emaileditor = Users::only(id: $b->editor, select: "email", output: "string");
            }
        }

        return $this->view(
            page: 'berita/read',
            data: [
                'title' => 'Detail Berita',
                'id' => $id,
                'cover' => $cover,
                'slug' => $slug,
                'judul' => $judul,
                'isi' => Html::htmlToText($isi),
                'potongan' => Html::htmlToText($potongan),
                'penulis' => $penulis,
                'editor' => $editor,
                'dibuat' => $dibuat,
                'diupdate' => $diupdate,
                'diterbitkan' => $diterbitkan,
                'dibaca' => $dibaca,
                'copy' => $copy,
                'facebook' => $facebook,
                'twitter' => $twitter,
                'wa' => $wa,
                'namakategori' => $namakategori,
                'namakategoriurl' => strtolower(str_replace(" ", "-", $namakategori)),
                'uidpenulis' => "@" . explode("@", $emailpenulis)[0],
                'uideditor' => "@" . explode("@", $emaileditor)[0],
                'badge' => $badge,
                'publikasi' => $publikasi
            ]
        );
    }


    protected function websiteBerita($parameter)
    {
        $model = "";
        if (is_array($parameter)) {
            $model = $parameter[0];
        }
        return match ($model) {
            'baca' => $this->bacaBerita($parameter),
            'index' => $this->indexBerita($parameter),
            default => Lanjut::ke(" ")
        };
    }

    protected function indexBerita($parameter)
    {
        $kategori = "Nasional";
        if (is_array($parameter)) {
            unset($parameter[0]);
            $kategori = ucwords(strtolower(str_replace("-", " ", $parameter[1])));
        }
        return $this->view(
            page: 'website/berita/index',
            data: [
                'title' => 'Index berita',
                'page' => 'berita',
                'kategori' => $kategori
            ]
        );
    }

    protected function bacaBerita($parameter)
    {
        $slug = "";
        $th = "";
        $bln = "";
        $hr = "";
        $tgl = "";
        if (is_array($parameter)) {
            unset($parameter[0]);
            $th = $parameter[1];
            $bln = $parameter[2];
            $hr = $parameter[3];
            $slug = $parameter[4];
        }

        $tgl = $th."-".$bln."-".$hr;

        $slug = Guard::hapusKarakter(
            karakter: [
                '"',
                "%22",
                "@",
                "'",
                ";",
                "=",
                ";"
            ],
            teks: $slug
        );

        $tgl = Guard::hapusKarakter(
            karakter: [
                '"',
                "%22",
                "@",
                "'",
                ";",
                "=",
                ";"
            ],
            teks: $tgl
        );

        $berita = DB::terhubung()->query("SELECT id, judul, kategoriid, dibaca FROM berita WHERE slug ='".$slug."' AND jadwal LIKE '%".$tgl."%' LIMIT 1 ");

        $beritaID = "";
        $kategoriID = "";
        $dibaca = "";
        $judul = "";
        
        if($berita->hitung() < 1){
            Lanjut::ke(" ");
        }

        foreach($berita->hasil() as $b){
            $beritaID = $b->id;
            $kategoriID = $b->kategoriid;
            $dibaca = $b->dibaca + 1;
            $judul = $b->judul;
            DB::terhubung()->perbarui("berita", $beritaID, ['dibaca' => $dibaca]);
        }

        return $this->view(
            page: 'website/berita/read',
            data: [
                'title' => 'Baca berita | '.$judul,
                'page' => 'berita',
                'kategori' => Kategori::only(select:'nama', id:$kategoriID, output:'string'),
                'beritaID' => $beritaID
            ]
        );
    }
}
