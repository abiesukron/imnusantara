<?php

namespace App\Service\Api;

use AbieSoft\AsetCode\Auth\Authentication;
use AbieSoft\AsetCode\Http\Lanjut;
use AbieSoft\AsetCode\Mysql\DB;
use AbieSoft\AsetCode\Package\Email;
use AbieSoft\AsetCode\Utilities\Config;
use AbieSoft\AsetCode\Utilities\Cookies;
use AbieSoft\AsetCode\Utilities\Generate;
use App\Service\Output;
use App\Service\Service;
use Firebase\JWT\JWT;

class EmailApi extends Service
{
    use Output;
    public function load($params)
    {
        return match (strtolower($_SERVER['REQUEST_METHOD'])) {
            default => $this->get($params)
        };
    }

    protected function get($params)
    {
        $email = "";
        if (isset($params[3])) {
            $email = $params[3] . "." . $params[4];
        }

        $model = "";
        if (isset($params[2])) {
            $model = $params[2];
        }

        return match ($params[0]) {
            'request' => $this->request($model, $email),
            'verifikasi' => $this->verifikasi($params[1], $params[2]),
            default => $this->badrequest()
        };
    }

    protected function request($model = "", $email = "")
    {
        $this->authentication("get");
        $user = new Authentication;
        $kode = Generate::kode(6);
        if ($email != "") {
            $where = " email = '" . $email . "'  ";
            $email = $email;
        } else {
            $email = $user->getEmail();
            $where = " usersid = '" . $user->getId() . "'  ";
        }
        $d = DB::terhubung()->query("SELECT id FROM verifikasi WHERE " . $where . " ");
        if ($d->hitung()) {
            $id = "";
            foreach ($d->hasil() as $dr) {
                $id = $dr->id;
            }
            $perbarui = DB::terhubung()->perbarui("verifikasi", $id, [
                "kode" => $kode
            ]);
            if ($perbarui) {
                if ($model == "reset") {
                    $payload = [
                        'email' => $email,
                    ];
                    $jwtcreate = JWT::encode($payload, Config::envReader('TOKEN'), 'HS256');
                    $data["kode"] = str_replace(".", "/", $jwtcreate);
                    Email::emailreset($email, "Reset Password", $kode);
                    Cookies::simpan('ABIESOFT-RESET', $jwtcreate);
                    echo $this->jsonFormat($data);
                } else {
                    $data["kode"] = $kode;
                    Email::verifikasi($email, Config::baseURL("APP_NAME") . " | Link verifikasi email", $kode);
                    echo $this->jsonFormat($data);
                }
            } else {
                $this->badrequest();
            }
        } else {
            if ($user->isLogin()) {
                $input = DB::terhubung()->input("verifikasi", [
                    "usersid" => $user->getId(),
                    "kode" => $kode
                ]);
                if ($input) {
                    $data["kode"] = $kode;
                    Email::verifikasi($user->getEmail(), Config::baseURL("APP_NAME") . " | Link verifikasi email", $kode);
                    echo $this->jsonFormat($data);
                } else {
                    $this->badrequest();
                }
            } else {
                $this->badrequest();
            }
        }
    }

    protected function verifikasi($kode, $redirect)
    {

        $user = new Authentication;
        $d = DB::terhubung()->query("SELECT id FROM verifikasi WHERE kode = '" . $kode . "' AND usersid = '" . $user->getId() . "' ");
        if ($d->hitung()) {
            $id = "";
            foreach ($d->hasil() as $dr) {
                $id = $dr->id;
            }
            $perbarui = DB::terhubung()->perbarui("verifikasi", $id, [
                "email" => $user->getEmail()
            ]);
            if ($perbarui) {
                if ($redirect == "next") {
                    Lanjut::ke(Config::envReader("ADMIN_PREFIX") . "/users/read/@" . explode("@", $user->getEmail())[0] . "/profile");
                } else {
                    echo $this->jsonFormat();
                }
            } else {
                $this->forbidden();
            }
        } else {
            if ($redirect == "next") {
                Lanjut::ke(" ");
            } else {
                $this->badrequest();
            }
        }
    }
}
