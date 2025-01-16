<?php

namespace AbieSoft\AsetCode\Collection;

use AbieSoft\AsetCode\Mysql\DB;

trait DataManagement
{

    protected static function namaTabel(string $tabel = "")
    {
        if ($tabel != "") {
            $result = $tabel;
        } else {
            $result = strtolower(str_replace("App\Model\\", "", __CLASS__));
        }
        return $result;
    }

    public static function all(string $tabel = "", string $select = "*", string $orderby = "id", bool $sort = true, string $opsi = "ERD", string $output = "")
    {
        $data = [];

        $forSelect = "*";
        if ($select != "*") {
            $forSelect = $select;
        }

        $order = " ORDER BY id ";
        if ($orderby != "id") {
            $order = " ORDER BY " . $orderby . " ";
        }

        $forSort = "";
        if ($sort == false) {
            $forSort = " DESC ";
        }

        $forTabel = self::namaTabel($tabel);

        $cek = DB::terhubung()->query("SELECT {$forSelect}  FROM  {$forTabel} {$order} {$forSort} ");
        if ($cek->hitung()) {
            $data = $cek->hasil();
        }

        if ($output == "json") {
            $result = [];
            $result['code'] = 200;
            $result['message'] = "OK";
            $result['data'] = $data;
            $result['opsi'] = $opsi;
            echo json_encode($result);
        } else if ($output == "string") {
            $result = "";
            foreach ($cek->hasil() as $c) {
                $result = $c->$forSelect;
            }
            return $result;
        } else if ($output == "hitung") {
            return $cek->hitung();
        } else {
            return $cek->hasil();
        }
    }

    public static function only(string $tabel = "", string $select = "*", string $orderby = "id", bool $sort = false, string $id = "", string $output = "")
    {
        $data = [];

        $forSelect = "*";
        if ($select != "*") {
            $forSelect = $select;
        }

        $order = " ORDER BY id ";
        if ($orderby != "id") {
            $order = " ORDER BY " . $orderby . " ";
        }

        $forSort = "";
        if ($sort == false) {
            $forSort = " DESC ";
        }

        $forTabel = self::namaTabel($tabel);

        if (count(explode("|", $id)) > 1) {
            $id = " " . explode("|", $id)[0] . "='" . explode("|", $id)[1] . "' ";
        } else {
            $id = " id='" . $id . "' ";
        }

        $cek = DB::terhubung()->query("SELECT {$forSelect}  FROM  {$forTabel} WHERE {$id} {$order} {$forSort} LIMIT 1 ");
        if ($cek->hitung()) {
            $data = $cek->hasil();
        }

        if ($output == "json") {
            $result = [];
            $result['code'] = 200;
            $result['message'] = "OK";
            $result['data'] = $data;
            echo json_encode($result);
        } else if ($output == "string") {
            $result = "";
            foreach ($cek->hasil() as $c) {
                $result = $c->$forSelect;
            }
            return $result;
        } else if ($output == "hitung") {
            return $cek->hitung();
        } else {
            return $cek->hasil();
        }
    }

    protected static function badRequest()
    {
        $result = [];
        $result['code'] = 403;
        $result['message'] = "BAD REQUEST";
        $result['data'] = [];
        return json_encode($result);
    }
}
