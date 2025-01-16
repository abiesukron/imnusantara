<?php

namespace AbieSoft\AsetCode\Http;

use AbieSoft\AsetCode\Auth\Authentication;
use AbieSoft\AsetCode\Utilities\Config;
use AbieSoft\AsetCode\Utilities\Input;

trait Request
{

    public function method()
    {
        $method = "get";

        if (strtolower($_SERVER['REQUEST_METHOD']) == "post") {
            if (Input::get('__method') == "PATCH") {
                $method = "patch";
            } else if (Input::get('__method') == "DELETE") {
                $method = "delete";
            } else {
                $method = "post";
            }
        }

        return $method;
    }

    public function path()
    {
        $path = "";

        (substr($_SERVER['REQUEST_URI'], -1) == "/") ? $path = substr($_SERVER['REQUEST_URI'], 0, -1) : $path = $_SERVER['REQUEST_URI'];
        ($path == "") ? $path = "/" : $path = $path;

        if (count(explode("?", $path)) == "2") {
            $path = explode("?", $path)[0] . "/:parameter";
        } else {
            if (explode("/", $path)[1] == "api") {
                if (count(explode("/", $path)) == 4) {
                    if (explode("/", $path)[3] != "excel") {
                        $path = "/" . explode("/", $path)[1] . "/" . explode("/", $path)[2] . "/:id";
                    } else {
                        $path = $path;
                    }
                } else if (count(explode("/", $path)) > 4) {
                    $path = "/" . explode("/", $path)[1] . "/" . explode("/", $path)[2] . "/:parameter";
                } else {
                    $path = $path;
                }
            } else if (explode("/", $path)[1] == Config::envReader('ADMIN_PREFIX')) {
                if (count(explode("/", $path)) == 5) {
                    $path = "/" . Config::envReader('ADMIN_PREFIX') . "/" . explode("/", $path)[2] . "/" . explode("/", $path)[3] . "/:id";
                } else if (count(explode("/", $path)) > 5) {
                    $path = "/" . Config::envReader('ADMIN_PREFIX') . "/" . explode("/", $path)[2] . "/" . explode("/", $path)[3] . "/:parameter";
                } else {
                    $path = $path;
                }
            } else {
                if (explode("/", $path)[1] !=  "login" && explode("/", $path)[1] != "registrasi" && explode("/", $path)[1] != "konfirmasi" && explode("/", $path)[1] != "api" && explode("/", $path)[1] != "") {
                    if (explode("/", $path)[1] == "reset") {
                        $path = "/" . explode("/", $path)[1] . "/" . explode("/", $path)[2] . "/:parameter";
                    } else {
                        $path = "/" . explode("/", $path)[1] . "/:parameter";
                    }
                } else {
                    $path = $path;
                }
            }
        }
        return $path;
    }

    public function params()
    {
        $path = "";
        $params = [];

        (substr($_SERVER['REQUEST_URI'], -1) == "/") ? $path = substr($_SERVER['REQUEST_URI'], 0, -1) : $path = $_SERVER['REQUEST_URI'];
        ($path == "") ? $path = "/" : $path = $path;

        if (count(explode("?", $path)) == "2") {
            $dataparam = [];
            $totalparams = count(explode("&", explode("?", $path)[1]));
            for ($i = 0; $i < $totalparams; $i++) {
                $dataparam[explode("=", explode("&", explode("?", $path)[1])[$i])[0]] = explode("=", explode("&", explode("?", $path)[1])[$i])[1];
            }
            $params = $dataparam;
        } else if (explode("/", $path)[1] == "api") {
            if (count(explode("/", $path)) > 3) {
                $dataparam = explode("/", $path);
                for ($i = 0; $i < count($dataparam); $i++) {
                    if ($i > 2) {
                        array_push($params, $dataparam[$i]);
                    }
                }
            } else {
                $params = [];
            }
        } else if (explode("/", $path)[1] == Config::envReader('ADMIN_PREFIX')) {
            if (count(explode("/", $path)) == 5) {
                $params = explode("/", $path)[4];
            } else if (count(explode("/", $path)) > 5) {
                $dataparam = explode("/", $path);
                for ($i = 0; $i < count($dataparam); $i++) {
                    if ($i > 3) {
                        array_push($params, $dataparam[$i]);
                    }
                }
            }
        } else {
            if (count(explode("/", $path)) == 3) {
                $params = explode("/", $path)[2];
            } else if (count(explode("/", $path)) > 3) {
                $dataparam = explode("/", $path);
                for ($i = 0; $i < count($dataparam); $i++) {
                    if ($i > 1) {
                        array_push($params, $dataparam[$i]);
                    }
                }
            } else {
                $params = [];
            }
        }

        return $params;
    }

    public function session()
    {
        $auth = new Authentication;
        return $auth->isLogin();
    }
}
