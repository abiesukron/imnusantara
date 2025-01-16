<?php

namespace AbieSoft\AsetCode\Http;

use AbieSoft\AsetCode\Auth\Authentication;
use AbieSoft\AsetCode\Utilities\Config;
use Latte\Engine;

class Controller
{

    use Middleware;

    public string   $url = "",
        $title = "",
        $nama_sesi = "",
        $email_sesi = "",
        $photo_sesi = "",
        $salt_sesi = "",
        $id_sesi = "",
        $grupid_sesi = "",
        $namagrup_sesi = "",
        $menu = "",
        $current = "home";

    public array $middleware = [];

    public function view(string $page, array $data)
    {

        $finaldata = [];

        $d = new Controller;
        $d->url = Config::baseURL();
        $d->title = "";
        $d->current = str_replace("/index", "", $page);

        $auth = new Authentication;
        if ($auth->isLogin()) {
            $d->nama_sesi = $auth->getNama();
            $d->email_sesi = $auth->getEmail();
            $d->photo_sesi = $auth->getPhoto();
            $d->salt_sesi = $auth->getSalt();
            $d->id_sesi = $auth->getId();
            $d->grupid_sesi = $auth->getGrupId();
            $d->namagrup_sesi = $auth->getNamaGrup();
            $d->middleware = $this->routeMiddleware();
            $d->menu = $this->menuMiddleware();
        }

        foreach ($data as $k => $v) {
            $d->$k = $v;
        }

        $finaldata = $d;

        $dir = __DIR__ . "/../../../";
        $latte = new Engine();
        $latte->setTempDirectory($dir . "temp");

        if (explode("/", $page)[0] == "website") {
            if (file_exists($dir . "templates/" . $page . ".latte")) {
                $latte->render($dir . "templates/" . $page . ".latte", $finaldata);
                die();
            } else {
                $latte->render($dir . "templates/theme/error/404.latte", $finaldata);
                die();
            }
        } else {
            if (file_exists($dir . "templates/page/" . $page . ".latte")) {
                $latte->render($dir . "templates/page/" . $page . ".latte", $finaldata);
                die();
            } else {
                $latte->render($dir . "templates/theme/error/404.latte", $finaldata);
                die();
            }
        }
    }
}
