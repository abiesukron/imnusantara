<?php

namespace App\Service;

trait Output
{
    protected function jsonFormat($data = [])
    {
        $result = [];
        $result['code'] = 200;
        $result['message'] = "OK";
        $result['data'] = $data;
        return json_encode($result);
    }
}
