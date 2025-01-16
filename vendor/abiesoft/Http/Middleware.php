<?php

namespace AbieSoft\AsetCode\Http;

use AbieSoft\AsetCode\Auth\Authentication;
use AbieSoft\AsetCode\Utilities\Config;
use Nette\Utils\Html;

trait Middleware
{
    public function routeMiddleware(): array
    {
        $result = [];
        $auth = new Authentication;
        $middleware = Config::yamlReader("middleware");
        $routegrup = str_replace(" ", "_", strtolower($auth->getNamaGrup()));
        $result = $middleware[$routegrup];
        return $result;
    }

    public function indexMiddleware(string $tabel)
    {
        if (is_bool(strpos($this->routeMiddleware()[$tabel], "I"))) {
            Lanjut::ke(Config::envReader("ADMIN_PREFIX") . "");
        }
    }

    public function editMiddleware(string $tabel)
    {
        $auth = new Authentication;
        if (is_bool(strpos($this->routeMiddleware()[$tabel], "E"))) {
            Lanjut::ke(Config::envReader("ADMIN_PREFIX") . "/" . $tabel);
        }
    }

    public function createMiddleware(string $tabel)
    {
        if (is_bool(strpos($this->routeMiddleware()[$tabel], "C"))) {
            Lanjut::ke(Config::envReader("ADMIN_PREFIX") . "/" . $tabel);
        }
    }

    public function readMiddleware(string $tabel)
    {
        if (is_bool(strpos($this->routeMiddleware()[$tabel], "R"))) {
            Lanjut::ke(Config::envReader("ADMIN_PREFIX") . "/" . $tabel);
        }
    }

    public function updateMiddleware(string $tabel)
    {
        if (is_bool(strpos($this->routeMiddleware()[$tabel], "U"))) {
            Lanjut::ke(Config::envReader("ADMIN_PREFIX") . "/" . $tabel);
        }
    }

    public function deleteMiddleware(string $tabel)
    {
        if (is_bool(strpos($this->routeMiddleware()[$tabel], "D"))) {
            Lanjut::ke(Config::envReader("ADMIN_PREFIX") . "/" . $tabel);
        }
    }

    public function menuMiddleware(): string
    {
        $auth = new Authentication;
        return Html::fromHtml($this->html());
    }

    protected function html()
    {
        return "
            <li><a href='javascript:void(0)'><i class='las la-globe'></i><span>Lihat Website</span></a></li>
        ";
    }
}
