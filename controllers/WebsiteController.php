<?php

namespace App\Controller;

use AbieSoft\AsetCode\Http\Controller;
use AbieSoft\AsetCode\Utilities\Config;

class WebsiteController extends Controller
{

    public function index()
    {
        return $this->view(
            page: 'website/home/index',
            data: [
                'title' => Config::envReader("APP_NAME"),
                'page' => 'home'
            ]
        );
    }
}
