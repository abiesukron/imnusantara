<?php

namespace App\Service\Api;

use AbieSoft\AsetCode\Mysql\DB;
use AbieSoft\AsetCode\Utilities\Guard;
use AbieSoft\AsetCode\Utilities\Input;
use App\Model\Grup;
use App\Service\Service;
use Shuchkin\SimpleXLSXGen;

class GrupApi extends Service
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

    public function excel()
    {
        $this->authentication("get");
        $data = [
            ["Nama Grup"]
        ];

        $cek = DB::terhubung()->query("SELECT nama FROM grup ")->hasil();

        foreach ($cek as $c) {
            $item = [];
            $item[] = $c->nama;
            array_push($data, $item);
        }

        SimpleXLSXGen::fromArray($data)->saveAs('assets/download/grup_tabel.xlsx');

        $result = [];
        $result['code'] = 200;
        $result['message'] = "OK";
        $result['data'] = ["assets/download/grup_tabel.xlsx"];
        echo json_encode($result);
    }

    protected function list()
    {
        $this->authentication("get");
        Grup::all(select: "id,nama,dibuat", sort: false, opsi: "D", output: 'json');
    }

    protected function keep()
    {
        $this->authentication("post");
        $nama = Input::get('nama');
        $csrf = Input::get('__csrf');
        if (Guard::formChecker($csrf)) {
            $cek = DB::terhubung()->query("SELECT id FROM grup WHERE nama = '" . $nama . "' ");
            if ($cek->hitung() > 0) {
                die("Grup <strong>" . $nama . "</strong> sudah ada.");
            } else {
                $input = DB::terhubung()->input("grup", [
                    'nama' => $nama
                ]);
                if ($input) {
                    die("Berhasil");
                } else {
                    die("Gagal membuat kategori");
                }
            }
        } else {
            die("Token expire");
        }
    }

    protected function replace()
    {
        $this->authentication("post");
    }

    protected function remove()
    {
        $this->authentication("post");
        $id = Input::get('id');
        $csrf = Input::get('__csrf');
        $nama = "";
        if (Guard::formChecker($csrf)) {
            $data = DB::terhubung()->query("SELECT nama FROM grup WHERE id='" . $id . "' ");
            foreach ($data->hasil() as $d) {
                $nama = $d->nama;
            }
            $hapus = DB::terhubung()->hapus("grup", ["id", "=", $id]);
            if ($hapus) {
                die("Berhasil|Grup <strong>" . $nama . "</strong> sudah dihapus");
            }
        } else {
            die("Token Expire");
        }
    }
}
