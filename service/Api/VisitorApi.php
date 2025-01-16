<?php 

namespace App\Service\Api;

use AbieSoft\AsetCode\Mysql\DB;
use AbieSoft\AsetCode\Utilities\Info;
use AbieSoft\AsetCode\Utilities\Input;
use AbieSoft\AsetCode\Utilities\Reader;
use App\Service\Output;
use App\Service\Service;

class VisitorApi extends Service
{

    use Output;
    public function load($param)
    {
        return match (strtolower($_SERVER['REQUEST_METHOD'])) {
            'get' => $this->list($param),
            default => $this->post()
        };
    }

    protected function post()
    {
        $method = Input::get('__method');
        return match ($method) {
            'DELETE' => $this->remove(),
            'PUT' => $this->replace(),
            default => $this->keep()
        };
    }

    protected function excel()
    {
        $this->authentication('get');
    }

    protected function list($param)
    {
        $this->authentication('get');
        return match($param[0]){
            'addvisitor' => $this->addvisitor($param),
            default => $this->defaultlist()
        };
    }

    protected function addvisitor($param)
    {
        unset($param[0]);
        
        if(count(explode("|",$param[1])) > 1){
            $model = explode("|",$param[1])[0];
            $kolom = explode("|",$param[1])[1];
        }else{
            $model = explode("%7C",$param[1])[0];
            $kolom = explode("%7C",$param[1])[1];
        }   

        $id = $param[2];
        $tgl = date('Y-m-d');
        $cek = DB::terhubung()->query("SELECT id FROM visitor WHERE model ='".$model."' AND kontenid ='".$id."' AND device ='".Info::device()."' AND ip = '".Reader::ip()."' AND tglvisit LIKE '%".$tgl."%' ");
        if($cek->hitung() == 0){
            $set = DB::terhubung()->input('visitor', [
                'model' => $model,
                'kontenid' => $id,
                'device' => Info::device(),
                'ip' => Reader::ip(),
                'tglvisit' => date('Y-m-d H:i:s')
            ]);

            if($set){
                $addcountmodel = DB::terhubung()->query("SELECT $kolom FROM $model WHERE id = '".$id."' LIMIT 1");
                if($addcountmodel->hitung() == 1){
                    foreach($addcountmodel->hasil() as $cm){
                        DB::terhubung()->perbarui($model,$id,[
                            $kolom => $cm->$kolom + 1
                        ]);
                    }
                }
            }
        }
    }

    protected function defaultlist()
    {

    }

    protected function keep()
    {
        $this->authentication('post');
        /*
            End point untuk menambahkan data via api
            url : api/Visitor
            __method : POST
        */
    }

    protected function replace()
    {
        $this->authentication('post');
        /*
            End point untuk memperbarui data via api
            url : api/Visitor
            __method : PUT
        */
    }

    protected function remove()
    {
        $this->authentication('post');
        /*
            End point untuk menambahkan data via api
            url : api/Visitor
            __method : DELETE
        */
    }

}
