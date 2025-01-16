<?php

namespace App\Controller;

use AbieSoft\AsetCode\Auth\Authentication;
use AbieSoft\AsetCode\Http\Controller;

class HomeController extends Controller
{

    public function index()
    {

        $auth = new Authentication;
        $dashboard = "index";
        if ($auth->getGrupId() == 2) {
            $dashboard = "penulis";
        }
        if ($auth->getGrupId() == 3) {
            $dashboard = "editor";
        }

        return $this->view(
            page: 'home/' . $dashboard,
            data: [
                'title' => 'Home',
                'page' => 'home'
            ]
        );
    }
}
