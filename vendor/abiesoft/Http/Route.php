<?php

namespace AbieSoft\AsetCode\Http;

use AbieSoft\AsetCode\Utilities\Config;

class Route
{

    use Request;
    private $route = [];

    public function __construct()
    {
        foreach (Config::yamlReader('route') as $k => $v) {
            if (is_array($v)) {
            } else {
                if ($k == "home") {
                    $path = "";
                    $apipath = "home";
                } else {
                    if (substr($k, 0, 1) == "_") {
                        $path = Config::envReader('ADMIN_PREFIX') . "/" . ltrim($k, "_");
                        $apipath = ltrim($k, "_");
                    } else {
                        $path = $k;
                        $apipath = $k;
                    }
                }

                /* 
                    Page
                */
                $this->get("/", ["WebsiteController", "index"]);
                $this->get("/" . Config::envReader('ADMIN_PREFIX'), ["HomeController", "index"]);
                if ($path != "") {
                    if (count(explode("_", $k)) > 1) {
                        $this->get("/" . $path, [ucfirst(ltrim($k, "_")) . "Controller", "index"]);
                        $this->get("/" . $path . "/add", [ucfirst(ltrim($k, "_")) . "Controller", "add"]);
                        $this->get("/" . $path . "/edit/:id", [ucfirst(ltrim($k, "_")) . "Controller", "edit"]);
                        $this->get("/" . $path . "/baca/:parameter", [ucfirst(ltrim($k, "_")) . "Controller", "read"]);
                        $this->get("/" . $path . "/baca/:id", [ucfirst(ltrim($k, "_")) . "Controller", "read"]);
                        $this->get("/" . $path . "/read/:parameter", [ucfirst(ltrim($k, "_")) . "Controller", "read"]);
                        $this->get("/" . $path . "/read/:id", [ucfirst(ltrim($k, "_")) . "Controller", "read"]);
                    } else {
                        $this->get("/" . $path, [ucfirst(ltrim($k, "_")) . "Controller", "index"]);
                        $this->get("/" . $path . "/:parameter", [ucfirst(ltrim($k, "_")) . "Controller", "index"]);
                    }
                }
                /* 
                    Api
                */
                $this->get("/api/" . $apipath, [ucfirst(ltrim($k, "_")) . "Api", "load"]);
                $this->get("/api/" . $apipath . "/:id", [ucfirst(ltrim($k, "_")) . "Api", "load"]);
                $this->get("/api/" . $apipath . "/:parameter", [ucfirst(ltrim($k, "_")) . "Api", "load"]);
                $this->post("/api/" . $apipath, [ucfirst(ltrim($k, "_")) . "Api", "load"]);
                $this->patch("/api/" . $apipath, [ucfirst(ltrim($k, "_")) . "Api", "load"]);
                $this->delete("/api/" . $apipath, [ucfirst(ltrim($k, "_")) . "Api", "load"]);
                /* 
                    Api Convert Tabel To Excel
                */
                if ($path != "") {
                    $this->get("/api/" . str_replace(Config::envReader('ADMIN_PREFIX') . "/", "", $path) . "/excel", [ucfirst(ltrim($k, "_")) . "Api", "excel"]);
                }
                /*
                    Api Authentication
                */
            }
        }

        $this->get("/".Config::envReader('AUTH_PREFIX')."/login", ["AuthController", "login"]);
        $this->get("/".Config::envReader('AUTH_PREFIX')."/login/:parameter", ["AuthController", "login"]);
        $this->get("/".Config::envReader('AUTH_PREFIX')."/registrasi", ["AuthController", "registrasi"]);
        $this->get("/".Config::envReader('AUTH_PREFIX')."/registrasi/:parameter", ["AuthController", "registrasi"]);
        $this->get("/".Config::envReader('AUTH_PREFIX')."/reset/kode/:parameter", ["AuthController", "reset"]);
        $this->post("/api/auth", ["AuthApi", "load"]);
        $this->get("/api/csrf", ["CsrfApi", "load"]);
        $this->get("/api/email/:parameter", ["EmailApi", "load"]);
    }

    public function get(string $path, string|array $callback)
    {
        $this->route['get'][$path] = $callback;
    }

    public function post(string $path, string|array $callback)
    {
        $this->route['post'][$path] = $callback;
    }

    public function patch(string $path, string|array $callback)
    {
        $this->route['patch'][$path] = $callback;
    }

    public function delete(string $path, string|array $callback)
    {
        $this->route['delete'][$path] = $callback;
    }

    public function aktif()
    {
        $method = $this->method();
        $path = $this->path();
        $parameter = $this->params();
        $api = explode("/", $path)[1];
        $session = $this->session();
        $page = explode("/", $path)[1];

        if ($page == explode('/',Config::envReader('AUTH_PREFIX'))[0]) {
            if ($session) {
                Lanjut::ke(Config::envReader('ADMIN_PREFIX'));
            }
        } else {
            if ($page == Config::envReader('ADMIN_PREFIX')) {
                if (!$session) {
                    Lanjut::ke(Config::envReader('AUTH_PREFIX')."/login");
                }
            }
        }


        (isset($this->route[$method][$path])) ? $callback = $this->route[$method][$path] : $callback = "Not Found";
        (Config::envReader("MODE") == "running" && $callback == "Not Found") ? Lanjut::ke(" ") : $callback == "Not Found";

        if (is_array($callback)) {
            if ($api == "api") {
                $controller = "\App\Service\Api\\" . $callback[0];
                $ctrl = new $controller;
                $function = $callback[1];
                $ctrl->$function($parameter);
            } else {
                $controller = "\App\Controller\\" . $callback[0];
                $ctrl = new $controller;
                $function = $callback[1];
                $ctrl->$function($parameter);
            }
        }

        if (is_string($callback)) {
            die($callback);
        }
    }

    public function listRoute()
    {
        return $this->route;
    }
}
