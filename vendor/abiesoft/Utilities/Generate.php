<?php

namespace AbieSoft\AsetCode\Utilities;

use AbieSoft\AsetCode\Mysql\DB;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Generate
{
    protected static $token = null;

    protected static function acak()
    {
        $karakter = 'AaBbCcDdEeFfGgHhIiJjKkLMmNnOoPpQqRrSsTtUuVvWwXxYyZz0123456789';
        $batas = strlen($karakter);
        $result = '';
        for ($i = 0; $i < 12; $i++) {
            $result .= $karakter[rand(0, $batas - 1)];
        }
        return $result;
    }

    public static function csrf(): string
    {
        $result = "";
        $token = self::acak();
        $uid = self::kode(4) . "-" . substr(sha1(date('Y-m-d H:i:s')), 0, 15);

        if (Cookies::ada('ABIESOFT-SID')) {
            $jwtread = Cookies::lihat('ABIESOFT-SID');
            $csrfID = JWT::decode($jwtread, new Key(Config::envReader('TOKEN'), 'HS256'))->csrfID;
            $cek = DB::terhubung()->query("SELECT uid FROM token WHERE uid = '" . $csrfID . "' ");
            if ($cek->hitung() > 0) {
                DB::terhubung()->query("UPDATE token SET token = '" . $token . "' WHERE uid = '" . $csrfID . "' ");
                $result = $token;
            } else {
                DB::terhubung()->input("token", [
                    'uid' => $csrfID,
                    'token' => $token
                ]);
                $result = $token;
            }
        } else {
            $cek = DB::terhubung()->query("SELECT id FROM token WHERE uid = '" . $uid . "' ");
            if ($cek->hitung() > 0) {
                return self::csrf();
            } else {
                DB::terhubung()->input("token", [
                    'uid' => $uid,
                    'token' => $token
                ]);
                $payload = [
                    'csrfID' => $uid
                ];
                $jwtcreate = JWT::encode($payload, Config::envReader('TOKEN'), 'HS256');
                Cookies::simpan('ABIESOFT-SID', $jwtcreate);
                $result = $token;
            }
        }

        return $result;
    }

    public static function kode($jumlah): int
    {
        if ($jumlah == "") {
            $jl = 4;
        } else {
            $jl = $jumlah;
        }

        $karakter = '0123456789';
        $batas = strlen($karakter);
        $result = '';
        for ($i = 0; $i < $jl; $i++) {
            $result .= $karakter[rand(0, $batas - 1)];
        }

        return $result;
    }

    public static function salt(): string
    {
        $charset = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz!~^@#$%^&*";
        $base = strlen($charset);
        $result = '';

        $now = explode(' ', microtime())[1];
        while ($now >= $base) {
            $i = $now % $base;
            $result = $charset[$i] . $result;
            $now /= $base;
        }
        return substr($result, -20);
    }

    public static function make(string $string, string $salt): string
    {
        return hash('sha256', $string . $salt);
    }
}
