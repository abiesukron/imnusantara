<?php


namespace AbieSoft\AsetCode;

use AbieSoft\AsetCode\Http\Route;

class Sistem
{

    public function start()
    {
        $router = new Route;
        echo $router->aktif();
    }
}
