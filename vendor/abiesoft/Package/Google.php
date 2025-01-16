<?php

namespace AbieSoft\AsetCode\Package;

use AbieSoft\AsetCode\Auth\Authentication;
use AbieSoft\AsetCode\Http\Lanjut;
use AbieSoft\AsetCode\Mysql\DB;
use AbieSoft\AsetCode\Utilities\Config;
use AbieSoft\AsetCode\Utilities\Cookies;
use AbieSoft\AsetCode\Utilities\Generate;
use Firebase\JWT\JWT;
use Google\Client;
use Google\Service\Oauth2;

class Google extends Authentication
{

    protected function konfigurasi($label)
    {
        $clientID = Config::envReader("GOOGLE_CLIENT_ID");
        $clientSecret = Config::envReader("GOOGLE_CLIENT_SECRET");
        $redirectUri = Config::baseURL() . "login";

        return match ($label) {
            'clientID' => $clientID,
            'clientSecret' => $clientSecret,
            'redirectUri' => $redirectUri,
            default => $clientID
        };
    }

    public function loginDenganGoogle()
    {
        $client = new Client();
        $client->setClientId($this->konfigurasi("clientID"));
        $client->setClientSecret($this->konfigurasi("clientSecret"));
        $client->setRedirectUri($this->konfigurasi("redirectUri"));
        $client->addScope("email");
        $client->addScope("profile");
        return $client->createAuthUrl();
    }

    public function setLogin($code)
    {
        $client = new Client();
        $client->setClientId($this->konfigurasi("clientID"));
        $client->setClientSecret($this->konfigurasi("clientSecret"));
        $client->setRedirectUri($this->konfigurasi("redirectUri"));
        $client->addScope("email");
        $client->addScope("profile");

        $token = $client->fetchAccessTokenWithAuthCode($code);

        if (isset($token['access_token'])) {
            $client->setAccessToken($token['access_token']);

            $google_oauth = new Oauth2($client);
            $infoAkunGoogle = $google_oauth->userinfo->get();
            $email =  $infoAkunGoogle->email;
            $nama =  $infoAkunGoogle->name;

            if ($email) {

                $user = $this->cariuser($email);

                if ($user) {
                    $logintime = date('Y-m-d H:i:s');
                    $payload = [
                        'email' => $user->email,
                        'kode' => Generate::kode(4),
                        'login' => $logintime
                    ];
                    $input = DB::terhubung()->input("log", $payload);
                    if ($input) {
                        $jwtcreate = JWT::encode($payload, Config::envReader('TOKEN'), 'HS256');
                        Cookies::simpan('ABIESOFT-UID', $jwtcreate);
                        Lanjut::ke(Config::envReader("ADMIN_PREFIX"));
                    } else {
                        $result = "Login google error";
                        return $result;
                    }
                } else {
                    $payload = [
                        'email' => $email,
                        'nama' => $nama
                    ];
                    $jwtcreate = JWT::encode($payload, Config::envReader('TOKEN'), 'HS256');
                    Cookies::simpan('ABIESOFT-GOOGLE', $jwtcreate);
                    Lanjut::ke("registrasi");
                }
            } else {
                Lanjut::ke("login");
            }
        } else {
            Lanjut::ke("login");
        }
    }
}
