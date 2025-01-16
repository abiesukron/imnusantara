<?php

namespace App\Service\Api;

use AbieSoft\AsetCode\Mysql\DB;
use AbieSoft\AsetCode\Utilities\Input;
use App\Service\Output;
use App\Service\Service;

class SetingApi extends Service
{

    use Output;
    public function load($params)
    {
        return match (strtolower($_SERVER['REQUEST_METHOD'])) {
            'get' => $this->list($params),
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

    protected function list($params)
    {
        $this->authentication('get');
        return match ($params[0]) {
            'swicthseting' => $this->swicthseting($params)
        };
    }

    protected function swicthseting($params)
    {
        unset($params[0]);
        $id = $params[1];
        $status = $params[2];
        $perbarui = DB::terhubung()->perbarui("seting", $id, [
            'status' => $status
        ]);
        if ($perbarui) {
            echo $this->jsonFormat();
        } else {
            echo $this->badrequest();
        }
    }

    protected function keep()
    {
        $this->authentication('post');
        /*
            End point untuk menambahkan data via api
            url : api/Seting
            __method : POST
        */
    }

    protected function replace()
    {
        $this->authentication('post');
        /*
            End point untuk memperbarui data via api
            url : api/Seting
            __method : PUT
        */
    }

    protected function remove()
    {
        $this->authentication('post');
        /*
            End point untuk menambahkan data via api
            url : api/Seting
            __method : DELETE
        */
    }
}
