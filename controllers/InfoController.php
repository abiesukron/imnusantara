<?php 

namespace App\Controller;

use AbieSoft\AsetCode\Http\Controller;
use AbieSoft\AsetCode\Http\Lanjut;

class InfoController extends Controller
{

    public function index($param)
    {

        Lanjut::ke(' ');

        if(is_array($param)){
            Lanjut::ke(' ');
        }else{
            return match($param){
                'tentang-kami' => $this->tentang(),
                'redaksi' => $this->redaksi(),
                'kontak' => $this->kontak(),
                default => Lanjut::ke(' ')
            };
        }
    }

    protected function tentang()
    {
        return $this->view(
            page: 'website/info/tentang',
            data: [
                'title' => 'Info',
            ]
        );
    }

    protected function redaksi()
    {
        return $this->view(
            page: 'website/info/redaksi',
            data: [
                'title' => 'Info',
            ]
        );
    }

    protected function kontak()
    {
        return $this->view(
            page: 'website/info/kontak',
            data: [
                'title' => 'Info',
            ]
        );
    }

}
