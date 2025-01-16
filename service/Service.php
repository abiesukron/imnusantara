<?php

namespace App\Service;

use AbieSoft\AsetCode\Utilities\Config;

class Service
{
    protected function authentication(string $method)
    {

        $reqMethod = strtolower($_SERVER['REQUEST_METHOD']);


        if ($reqMethod != $method) {
            return $this->badrequest();
        }

        $apikey = "";
        if (isset($_SERVER['HTTP_X_API_KEY'])) {
            $apikey = $_SERVER['HTTP_X_API_KEY'];
        } else {
            return $this->unauthorized();
        }

        $keysafe = Config::envReader("APIKEY");
        if ($apikey == $keysafe) {
            return;
        }

        return $this->forbidden();
    }

    protected function badrequest()
    {
        $data = [];
        $data['code'] = 400;
        $data['message'] = "BAD REQUEST";
        echo json_encode($data);
        die();
    }

    protected function unauthorized()
    {
        $data = [];
        $data['code'] = 401;
        $data['message'] = "UNAUTHORIZED";
        echo json_encode($data);
        die();
    }

    protected function forbidden()
    {
        $data = [];
        $data['code'] = 403;
        $data['message'] = "FORBIDDEN";
        echo json_encode($data);
        die();
    }
}
