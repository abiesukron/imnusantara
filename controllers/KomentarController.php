<?php 

namespace App\Controller;

use AbieSoft\AsetCode\Http\Controller;

class KomentarController extends Controller
{

    public function index()
    {
        return $this->view(
            page: 'komentar/index',
            data: [
                'title' => 'Komentar',
            ]
        );
    }

    public function add()
    {
        return $this->view(
            page: 'komentar/add',
            data: [
                'title' => 'Buat Komentar',
            ]
        );
    }

    public function edit($id)
    {
        return $this->view(
            page: 'komentar/edit',
            data: [
                'title' => 'Edit Komentar',
                'id' => $id,
            ]
        );
    }

    public function read($parameter)
    {
        return $this->view(
            page: 'komentar/read',
            data: [
                'title' => 'Detail Komentar',
            ]
        );
    }

}
