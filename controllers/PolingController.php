<?php 

namespace App\Controller;

use AbieSoft\AsetCode\Http\Controller;
use AbieSoft\AsetCode\Http\Lanjut;

class PolingController extends Controller
{

    public function index()
    {

        Lanjut::ke(' ');
        
        return $this->view(
            page: 'website/poling/index',
            data: [
                'title' => 'Poling',
            ]
        );
    }

    public function add()
    {
        /*

            Halaman form tambah data
            method GET
        */
    }

    public function edit($parameter)
    {
        /*

            Halaman form edit data
            method GET
        */
    }

    public function read($parameter)
    {
        /*

            Halaman detail data
            method GET
        */
    }

}
