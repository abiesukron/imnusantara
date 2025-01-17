<?php

namespace App\Controller;

use AbieSoft\AsetCode\Http\Controller;
use AbieSoft\AsetCode\Mysql\DB;
use AbieSoft\AsetCode\Utilities\Config;

class WebsiteController extends Controller
{

    public function index()
    {
        return $this->view(
            page: 'website/home/index',
            data: [
                'title' => Config::envReader("APP_NAME"),
                'page' => 'home',
                'beritautama' => DB::terhubung()->query("SELECT slug,judul,cover,dibuat FROM berita ORDER BY id DESC LIMIT 5")->hasil()
            ]
        );
    }
}
