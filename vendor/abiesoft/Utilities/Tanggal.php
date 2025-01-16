<?php

namespace AbieSoft\AsetCode\Utilities;

class Tanggal
{

    protected static function dt(string $datetime): string
    {
        $result = date("Y-m-d H:i:s");
        if ($datetime != "") {
            $result = $datetime;
        }
        return $result;
    }

    protected static function toBulanString(string $bulan)
    {
        return match ($bulan) {
            "1" => "Januari",
            "2" => "Februari",
            "3" => "Maret",
            "4" => "April",
            "5" => "Mei",
            "6" => "Juni",
            "7" => "Juli",
            "8" => "Agustus",
            "9" => "September",
            "10" => "Oktober",
            "11" => "November",
            "12" => "Desember",
            default => ""
        };
    }

    public static function full(string $datetime = ""): string
    {
        $result = "";
        ($datetime == "") ? $datetime = date('Y-m-d H:i:s') : $datetime;
        $tanggal = ltrim(substr(self::dt($datetime), 8, 2), "0");
        $bulan = ltrim(substr(self::dt($datetime), 5, 2), "0");
        $tahun = substr(self::dt($datetime), 0, 4);
        $result = $tanggal . " " . self::toBulanString($bulan) . " " . $tahun;
        return $result;
    }

    public static function simpel(string $datetime = ""): string
    {
        $result = "";
        ($datetime == "") ? $datetime = date('Y-m-d H:i:s') : $datetime;
        $tanggal = ltrim(substr(self::dt($datetime), 8, 2), "0");
        $bulan = ltrim(substr(self::dt($datetime), 5, 2), "0");
        $tahun = substr(self::dt($datetime), 0, 4);
        $result = $tanggal . " " . substr(self::toBulanString($bulan), 0, 3) . " " . $tahun;
        return $result;
    }

    public static function simpelAndTime(string $datetime = ""): string
    {
        $result = "";
        ($datetime == "") ? $datetime = date('Y-m-d H:i:s') : $datetime;
        $tanggal = ltrim(substr(self::dt($datetime), 8, 2), "0");
        $bulan = ltrim(substr(self::dt($datetime), 5, 2), "0");
        $tahun = substr(self::dt($datetime), 0, 4);
        $time = explode(" ", $datetime)[1];
        $result = $tanggal . " " . substr(self::toBulanString($bulan), 0, 3) . " " . $tahun . " " . substr($time, 0, 5) . " WIB";
        return $result;
    }
}
