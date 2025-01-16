<?php

namespace App\Service\Api;

use AbieSoft\AsetCode\Auth\Authentication;
use AbieSoft\AsetCode\Mysql\DB;
use AbieSoft\AsetCode\Utilities\Config;
use AbieSoft\AsetCode\Utilities\Cookies;
use AbieSoft\AsetCode\Utilities\Generate;
use AbieSoft\AsetCode\Utilities\Guard;
use AbieSoft\AsetCode\Utilities\Input;
use App\Model\Users;
use App\Model\Verifikasi;
use App\Service\Service;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthApi extends Service
{
    public function load()
    {
        return match (strtolower($_SERVER['REQUEST_METHOD'])) {
            default => $this->post()
        };
    }

    protected function post()
    {
        $method = Input::get('__method');
        return match ($method) {
            'UBAHPASSWORD' => $this->ubahpassword(),
            'REGISTRASI' => $this->registrasi(),
            'LOGOUT' => $this->logout(),
            default => $this->login()
        };
    }

    protected function login()
    {
        $this->authentication('post');
        $auth = new Authentication;
        $email = Input::get("email");
        $user = $auth->login($email);

        if ($user) {
            $password = Generate::make(Input::get("password"), $user->salt);
            if ($user->psw == $password) {
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
                    die("Logged");
                } else {
                    die("errorsession");
                }
            } else {
                die("errorpassword");
            }
        } else {
            die("notfound");
        }
    }

    protected function registrasi()
    {
        $this->authentication('post');
        $auth = new Authentication;
        $nama = Input::get('nama');
        $email = Input::get('email');
        $password = Input::get('password');
        $cek = DB::terhubung()->query("SELECT id FROM users WHERE email = '" . $email . "' ");
        if ($cek->hitung() > 0) {
            die("email <strong>" . $email . "</strong> sudah digunakan");
        } else {
            $salt = Generate::salt();
            $psw = Generate::make($password, $salt);
            $input = DB::terhubung()->input("users", [
                'nama' => $nama,
                'email' => $email,
                'photo' => 'assets/images/default.png',
                'grupid' => 2,
                'psw' => $psw,
                'salt' => $salt
            ]);

            if ($input) {
                $user = $auth->login($email);
                if ($user) {
                    $password = Generate::make(Input::get("password"), $user->salt);
                    if ($user->psw == $password) {
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
                            die("Logged");
                        } else {
                            die("Registrasi Gagal");
                        }
                    } else {
                        die("Registrasi Gagal");
                    }
                } else {
                    die("Registrasi Gagal");
                }
            } else {
                die("Registrasi Gagal");
            }
        }
    }

    protected function ubahpassword()
    {
        $csrf = Input::get('__csrf');
        if (Guard::formChecker($csrf)) {
            $email = "";
            $psw = Input::get("passwordbaru");
            if (Cookies::ada("ABIESOFT-RESET")) {
                $email = JWT::decode(Cookies::lihat("ABIESOFT-RESET"), new Key(Config::envReader('TOKEN'), 'HS256'))->email;
            }
            $kode = Input::get("kode");
            $verikode = Verifikasi::only(id: "email|" . $email, select: "kode", output: "string");

            if ($kode != $verikode) {
                die("Kode Salah");
            } else {
                $id = Users::only(id: "email|" . $email, select: "id", output: "string");
                $salt = Users::only(id: "email|" . $email, select: "salt", output: "string");
                $password = Generate::make($psw, $salt);
                $perbarui = DB::terhubung()->perbarui("users", $id, [
                    "salt" => $salt,
                    "psw" => $password
                ]);
                if ($perbarui) {
                    die("Berhasil");
                } else {
                    die("Gagal mengubah password");
                }
            }

            Cookies::hapus("ABIESOFT-RESET");
        } else {
            die("Token Expire");
        }
    }

    protected function logout()
    {
        $this->authentication('post');
        if (Cookies::ada("ABIESOFT-UID")) {
            $email = JWT::decode(Cookies::lihat("ABIESOFT-UID"), new Key(Config::envReader('TOKEN'), 'HS256'))->email;
            $kode = JWT::decode(Cookies::lihat("ABIESOFT-UID"), new Key(Config::envReader('TOKEN'), 'HS256'))->kode;
            $login = JWT::decode(Cookies::lihat("ABIESOFT-UID"), new Key(Config::envReader('TOKEN'), 'HS256'))->login;
            $sesi = DB::terhubung()->query("SELECT id FROM log WHERE email = '" . $email . "' AND kode = '" . $kode . "' AND login = '" . $login . "' LIMIT 1");
            if ($sesi->hitung() > 0) {
                foreach ($sesi->hasil() as $s) {
                    $perbarui = DB::terhubung()->perbarui("log", $s->id, [
                        'logout' => date('Y-m-d H:i:s')
                    ]);
                    if ($perbarui) {
                        Cookies::hapus("ABIESOFT-UID");
                    }
                }
            }
        }
    }
}
