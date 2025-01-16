<?php 

namespace App\Service\Api;

use AbieSoft\AsetCode\Mysql\DB;
use AbieSoft\AsetCode\Utilities\Input;
use AbieSoft\AsetCode\Utilities\Guard;
use App\Service\Service;
use Shuchkin\SimpleXLSXGen;

class KomentarApi extends Service
{
    public function load()
    {
        return match (strtolower($_SERVER['REQUEST_METHOD'])) {
            'get' => $this->list(),
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

            $cek = DB::terhubung()->query("SELECT nama FROM komentar")->hasil();

            foreach ($cek as $c) {
                $item = [];
                $item[] = $c->nama;
                array_push($data, $item);
            }

            SimpleXLSXGen::fromArray($data)->saveAs('assets/download/komentar_tabel.xlsx');

            $result = [];
            $result['code'] = 200;
            $result['message'] = 'OK';
            $result['data'] = ['assets/download/komentar_tabel.xlsx'];
            echo json_encode($result);
        */
    }

    protected function list()
    {
        $this->authentication('get');
        $data = [];
        $result = [];
        $result['code'] = 200;
        $result['message'] = 'OK';
        $result['data'] = $data;
        $result['opsi'] = 'ED';
        echo json_encode($result);
    }

    protected function keep()
    {
        $this->authentication('post');
        /*
            $nama = Input::get('nama');
            $csrf = Input::get('__csrf');

            if (Guard::formChecker($csrf)) {
                $input = DB::terhubung()->input('komentar', [
                    'nama' => $nama,
                ]);
                if ($input) {
                    die('Berhasil');
                }else{
                    die('Gagal');
                }
            }else{
                die('Token Expire');
            }
        */
    }

    protected function replace()
    {
        $this->authentication('post');
        /*
            $nama = Input::get('nama');
            $csrf = Input::get('__csrf');
            $id = Input::get('id');

            if (Guard::formChecker($csrf)) {
                $perbarui = DB::terhubung()->perbarui('komentar', $id, [
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
        /*
            $csrf = Input::get('__csrf');
            $id = Input::get('id');
            $nama = '';

            if (Guard::formChecker($csrf)) {
                $data = DB::terhubung()->query("SELECT nama FROM users WHERE  id='".$id."'  ");
                foreach ($data->hasil() as $d) {
                    $nama = $d->nama;
                }
                $hapus = DB::terhubung()->hapus('komentar', ['id', '=', $id]);
                if ($hapus) {
                    die('Berhasil|User <strong>' . $nama . '</strong> sudah dihapus');
                }
            }else{
                die('Token Expire');
            }
        */
    }

}
