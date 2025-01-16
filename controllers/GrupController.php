<?php

namespace App\Controller;

use AbieSoft\AsetCode\Http\Controller;
use AbieSoft\AsetCode\Http\Middleware;

class GrupController extends Controller
{

    use Middleware;

    public function index()
    {
        $this->indexMiddleware("grup");
        return $this->view(
            page: 'grup/index',
            data: [
                'title' => 'Grup',
            ]
        );
    }

    public function add()
    {
        $this->createMiddleware("grup");
    }

    public function edit()
    {
        $this->editMiddleware("grup");
    }

    public function read()
    {
        $this->readMiddleware("grup");
    }
}
