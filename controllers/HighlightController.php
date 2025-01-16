<?php 

namespace App\Controller;

use AbieSoft\AsetCode\Http\Controller;

class HighlightController extends Controller
{

    public function index()
    {
        return $this->view(
            page: 'highlight/index',
            data: [
                'title' => 'Highlight',
            ]
        );
    }

    public function add()
    {
        return $this->view(
            page: 'highlight/add',
            data: [
                'title' => 'Buat Highlight',
            ]
        );
    }

    public function edit($id)
    {
        return $this->view(
            page: 'highlight/edit',
            data: [
                'title' => 'Edit Highlight',
                'id' => $id,
            ]
        );
    }

    public function read($parameter)
    {
        return $this->view(
            page: 'highlight/read',
            data: [
                'title' => 'Detail Highlight',
            ]
        );
    }

}
