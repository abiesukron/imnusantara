<?php

namespace AbieSoft\AsetCode\Auth;

use AbieSoft\AsetCode\Http\Lanjut;
use AbieSoft\AsetCode\Mysql\DB;
use AbieSoft\AsetCode\Utilities\Config;
use AbieSoft\AsetCode\Utilities\Cookies;
use AbieSoft\AsetCode\Utilities\Info;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Authentication
{
    protected $isLogin = false;

    protected function cariuser(string $email)
    {
        if ($email) {
            $data = DB::terhubung()->tampilkan('users', ['email', '=', $email]);
            if ($data->hitung()) {
                return $data->awal();
            }

            Cookies::hapus("ABIESOFT-UID");
        }
        return false;
    }

    public function login(string $email)
    {
        return $this->cariuser($email);
    }

    public function isLogin()
    {
        $this->isLogin = false;
        if (Cookies::ada("ABIESOFT-UID")) {
            try {
                $email = JWT::decode(Cookies::lihat("ABIESOFT-UID"), new Key(Config::envReader('TOKEN'), 'HS256'))->email;
                $kode = JWT::decode(Cookies::lihat("ABIESOFT-UID"), new Key(Config::envReader('TOKEN'), 'HS256'))->kode;
                $login = JWT::decode(Cookies::lihat("ABIESOFT-UID"), new Key(Config::envReader('TOKEN'), 'HS256'))->login;
                $data = DB::terhubung()->query("SELECT id, device FROM log WHERE email = '" . $email . "' AND kode = '" . $kode . "' AND login = '" . $login . "' ");
                if ($data->hitung() > 0) {
                    foreach ($data->hasil() as $d) {
                        if ($d->device == "") {
                            DB::terhubung()->perbarui("log", $d->id, [
                                'device' => Info::device()
                            ]);
                        }
                    }
                    $this->isLogin = true;
                }
            } catch (Exception $e) {
                Cookies::hapus("ABIESOFT-UID");
                Cookies::hapus("ABIESOFT-SID");
                Lanjut::ke("");
            }
        }
        return $this->isLogin;
    }

    public function getNama(): string
    {
        if (Cookies::ada("ABIESOFT-UID")) {
            $email = JWT::decode(Cookies::lihat("ABIESOFT-UID"), new Key(Config::envReader('TOKEN'), 'HS256'))->email;
            return $this->cariuser($email)->nama;
        }
    }

    public function getEmail(): string
    {
        if (Cookies::ada("ABIESOFT-UID")) {
            $email = JWT::decode(Cookies::lihat("ABIESOFT-UID"), new Key(Config::envReader('TOKEN'), 'HS256'))->email;
            return $this->cariuser($email)->email;
        }
    }

    public function getPhoto(): string
    {
        if (Cookies::ada("ABIESOFT-UID")) {
            $email = JWT::decode(Cookies::lihat("ABIESOFT-UID"), new Key(Config::envReader('TOKEN'), 'HS256'))->email;
            $photo = "assets/images/default.png";
            if (file_exists(__DIR__ . "/../../../" . Config::envReader("PUBLIC_FOLDER") . "/" . $this->cariuser($email)->photo)) {
                $photo = $this->cariuser($email)->photo;
            }
            return $photo;
        }
    }

    public function getSalt(): string
    {
        if (Cookies::ada("ABIESOFT-UID")) {
            $email = JWT::decode(Cookies::lihat("ABIESOFT-UID"), new Key(Config::envReader('TOKEN'), 'HS256'))->email;
            return $this->cariuser($email)->salt;
        }
    }

    public function getId(): string
    {
        if (Cookies::ada("ABIESOFT-UID")) {
            $email = JWT::decode(Cookies::lihat("ABIESOFT-UID"), new Key(Config::envReader('TOKEN'), 'HS256'))->email;
            return $this->cariuser($email)->id;
        }
    }

    public function getGrupId(): string
    {
        if (Cookies::ada("ABIESOFT-UID")) {
            $email = JWT::decode(Cookies::lihat("ABIESOFT-UID"), new Key(Config::envReader('TOKEN'), 'HS256'))->email;
            return $this->cariuser($email)->grupid;
        }
    }

    public function getNamaGrup(): string
    {
        if (Cookies::ada("ABIESOFT-UID")) {
            $email = JWT::decode(Cookies::lihat("ABIESOFT-UID"), new Key(Config::envReader('TOKEN'), 'HS256'))->email;
            $grup = DB::terhubung()->query("SELECT nama FROM grup WHERE id='" . $this->cariuser($email)->grupid . "' ");
            if ($grup->hitung()) {
                foreach ($grup->hasil() as $g) {
                    return $g->nama;
                }
            }
        }
    }
}
