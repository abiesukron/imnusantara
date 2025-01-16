<?php

namespace App\Service\Api;

use AbieSoft\AsetCode\Auth\Authentication;
use AbieSoft\AsetCode\Http\Middleware;
use AbieSoft\AsetCode\Mysql\DB;
use App\Model\Berita;
use App\Model\Kategori;
use App\Service\Output;
use App\Service\Service;

class HomeApi extends Service
{

    use Middleware;
    public function load()
    {
        return match (strtolower($_SERVER['REQUEST_METHOD'])) {
            'get' => $this->dashboard(),
            default => $this->dashboard()
        };
    }

    public function dashboard()
    {
        $this->authentication("get");
        $data = [
            'totalberita' => Berita::all(output: "hitung"),
            'beritapopuler' => "data populer",
            'kategoriberita' => "kategori berita",
            'totalpengunjung' => 0,
            'totalkunjungan' => 0,
            'statistikbulanan' => 'Statistik data bulanan',
            'totalkategori' => Kategori::all(output: "hitung"),
            'kategori' => 'data kategori'
        ];
        $result = [];
        $result['code'] = 200;
        $result['message'] = "OK";
        $result['data'] = $data;
        echo json_encode($result);
    }
}
