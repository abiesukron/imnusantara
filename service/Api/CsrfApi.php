<?php

namespace App\Service\Api;

use AbieSoft\AsetCode\Utilities\Generate;
use App\Service\Service;

class CsrfApi extends Service
{
    public function load()
    {
        return match (strtolower($_SERVER['REQUEST_METHOD'])) {
            'get' => $this->list(),
            default => $this->list()
        };
    }

    protected function list()
    {
        $this->authentication("get");
        $data = [];
        $data['code'] = 200;
        $data['message'] = "OK";
        $data['csrf'] = Generate::csrf();
        echo json_encode($data);
        die();
    }
}
