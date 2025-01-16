<?php 

namespace App\Service\Api;

use AbieSoft\AsetCode\Mysql\DB;
use AbieSoft\AsetCode\Utilities\Input;
use AbieSoft\AsetCode\Utilities\Guard;
use App\Model\Highlight;
use App\Service\Service;

class HighlightApi extends Service
{
    public function load($param)
    {
        return match (strtolower($_SERVER['REQUEST_METHOD'])) {
            'get' => $this->list($param),
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

    protected function excel()
    {
        $this->authentication('get');
        /*
            $data = [
                ['nama']
            ];

            $cek = DB::terhubung()->query("SELECT nama FROM highlight")->hasil();

            foreach ($cek as $c) {
                $item = [];
                $item[] = $c->nama;
                array_push($data, $item);
            }

            SimpleXLSXGen::fromArray($data)->saveAs('assets/download/highlight_tabel.xlsx');

            $result = [];
            $result['code'] = 200;
            $result['message'] = 'OK';
            $result['data'] = ['assets/download/highlight_tabel.xlsx'];
            echo json_encode($result);
        */
    }

    protected function list($param)
    {
        $this->authentication('get');

        $p = "";
        if(isset($param[0])){
            $p = $param[0];
        }
        return match($p){
            'load' => $this->webHighlight($param),
            default => $this->defaultList()
        };
    }

    protected function defaultList()
    {
        $data = Highlight::all(select:"id,judul,diklik,expire");
        $result = [];
        $result['code'] = 200;
        $result['message'] = 'OK';
        $result['data'] = $data;
        $result['opsi'] = 'ED';
        echo json_encode($result);
    }

    protected function webHighlight($param)
    {
        $data = Highlight::all(select:"id,judul,link");
        $result = [];
        $result['code'] = 200;
        $result['data'] = $data;
        $result['message'] = 'OK';
        echo json_encode($result);
    }

    protected function keep()
    {
        $this->authentication('post');
        $judul = Input::get('judul');
        $link = Input::get('link');
        $status = Input::get('status');
        $expire = Input::get('expire');
        $csrf = Input::get('__csrf');

        if (Guard::formChecker($csrf)) {
            $input = DB::terhubung()->input('highlight', [
                'judul' => $judul,
                'link' => $link,
                'status' => $status,
                'expire' => $expire,
                'diklik' => 0,
            ]);
            if ($input) {
                die('Berhasil');
            }else{
                die('Gagal');
            }
        }else{
            die('Token Expire');
        }
    }

    protected function replace()
    {
        $this->authentication('post');
        /*
            $nama = Input::get('nama');
            $csrf = Input::get('__csrf');
            $id = Input::get('id');

            if (Guard::formChecker($csrf)) {
                $perbarui = DB::terhubung()->perbarui('highlight', $id, [
                    'nama' => $nama,
                ]);
                if ($perbarui) {
                    die('Berhasil');
                }else{
                    die('Gagal');
                }
            }else{
                die('Token Expire');
            }
        */
    }

    protected function remove()
    {
        $this->authentication('post');
        $csrf = Input::get('__csrf');
        $id = Input::get('id');
        $judul = '';

        if (Guard::formChecker($csrf)) {
            $data = DB::terhubung()->query("SELECT judul FROM highlight WHERE  id='".$id."'  ");
            foreach ($data->hasil() as $d) {
                $judul = $d->judul;
            }
            $hapus = DB::terhubung()->hapus('highlight', ['id', '=', $id]);
            if ($hapus) {
                die('Berhasil|Highlight <strong>' . $judul . '</strong> sudah dihapus');
            }
        }else{
            die('Token Expire');
        }
    }

}
