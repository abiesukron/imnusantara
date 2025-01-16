<?php

namespace App\Controller;

use AbieSoft\AsetCode\Http\Controller;
use AbieSoft\AsetCode\Http\Lanjut;
use AbieSoft\AsetCode\Package\Google;
use AbieSoft\AsetCode\Utilities\Config;
use AbieSoft\AsetCode\Utilities\Cookies;
use AbieSoft\AsetCode\Utilities\Input;
use App\Model\Seting;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthController extends Controller
{

    public function login()
    {

        $google = new Google;

        if (isset($_GET['code'])) {
            $google->setLogin(Input::get('code'));
        }

        $linkRegistrasi = Seting::only(id: "1", select: "status", output: "string");

        $linkGoogle = "";
        if (Seting::only(id: "2", select: "status", output: "string") != "off") {
            $linkGoogle = $google->loginDenganGoogle();
        }

        return $this->view(
            page: '/../theme/auth/login',
            data: [
                'title' => Config::envReader("APP_NAME") . ' | Login',
                'nama_app' => Config::envReader("APP_NAME"),
                'page' => "Login",
                'linkgooglelogin' => $linkGoogle,
                'linkRegistrasi' => $linkRegistrasi,
            ]
        );
    }

    public function registrasi()
    {
        if (Seting::only(id: "1", select: "status", output: "string") == "off") {
            Lanjut::ke("login");
        }

        $google = new Google;

        $gNama = "";
        $gEmail = "";

        if (Cookies::ada("ABIESOFT-GOOGLE")) {
            $gNama = JWT::decode(Cookies::lihat("ABIESOFT-GOOGLE"), new Key(Config::envReader('TOKEN'), 'HS256'))->nama;
            $gEmail = JWT::decode(Cookies::lihat("ABIESOFT-GOOGLE"), new Key(Config::envReader('TOKEN'), 'HS256'))->email;
            Cookies::hapus("ABIESOFT-GOOGLE");
        }

        $linkGoogle = "";
        if (Seting::only(id: "2", select: "status", output: "string") != "off") {
            $linkGoogle = $google->loginDenganGoogle();
        }

        return $this->view(
            page: '/../theme/auth/registrasi',
            data: [
                'title' => Config::envReader("APP_NAME") . ' | Registrasi',
                'nama_app' => Config::envReader("APP_NAME"),
                'page' => "Registrasi",
                'linkgooglelogin' => $linkGoogle,
                'googleNama' => $gNama,
                'googleEmail' => $gEmail
            ]
        );
    }

    public function reset($kode)
    {
        $jwtcookies = Cookies::lihat("ABIESOFT-RESET");
        $jwt = $kode[1] . "." . $kode[2] . "." . $kode[3];
        if ($jwtcookies != $jwt) {
            Cookies::hapus("ABIESOFT-RESET");
            Lanjut::ke(" ");
        }

        if (Cookies::ada("ABIESOFT-RESET")) {
            $email = JWT::decode(Cookies::lihat("ABIESOFT-RESET"), new Key(Config::envReader('TOKEN'), 'HS256'))->email;
        }

        return $this->view(
            page: '/../theme/auth/reset',
            data: [
                'title' => Config::envReader("APP_NAME") . ' | Reset',
                'nama_app' => Config::envReader("APP_NAME"),
                'page' => "Reset Password",
                'email' => $email
            ]
        );
    }
}
