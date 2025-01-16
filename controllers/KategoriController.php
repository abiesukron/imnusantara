<?php 

namespace App\Controller;

use AbieSoft\AsetCode\Http\Controller;

class KategoriController extends Controller
{

    public function index()
    {
        return $this->view(
            page: 'kategori/index',
            data: [
                'title' => 'Kategori',
            ]
        );
    }

    public function add()
    {
        return $this->view(
            page: 'kategori/add',
            data: [
                'title' => 'Buat Kategori',
            ]
        );
    }

    public function edit($id)
    {
        return $this->view(
            page: 'kategori/edit',
            data: [
                'title' => 'Edit Kategori',
                'id' => $id,
            ]
        );
    }

    public function read($parameter)
    {
        return $this->view(
            page: 'kategori/read',
            data: [
                'title' => 'Detail Kategori',
            ]
        );
    }

}
