<?php

namespace AbieSoft\AsetCode\Utilities;

use AbieSoft\AsetCode\Mysql\DB;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Guard
{

    public static function formChecker($token): bool
    {
        $result = false;
        if (Cookies::ada('ABIESOFT-SID')) {
            $jwtread = Cookies::lihat('ABIESOFT-SID');
            try {
                $uid = JWT::decode($jwtread, new Key(Config::envReader('TOKEN'), 'HS256'))->csrfID;
                $cek = DB::terhubung()->query("SELECT id FROM token WHERE uid = '" . $uid . "' AND token = '" . $token . "' ");
                if ($cek->hitung() > 0) {
                    $result = true;
                }
            } catch (Exception $e) {
                Cookies::hapus('ABIESOFT-SID');
                $result = false;
            }
        }

        return $result;
    }

    public static function hapusKarakter($karakter = [], $teks = "", $index = 0)
    {
        $jumlahkarakter = count($karakter)-1;
        if($index < $jumlahkarakter){
            $index += 1;
            $teks = str_replace($karakter[$index], "", $teks);
            return self::hapusKarakter($karakter, $teks, $index);
        }
        return $teks;
    }
}
