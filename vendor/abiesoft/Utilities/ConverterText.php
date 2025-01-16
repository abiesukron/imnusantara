<?php

namespace AbieSoft\AsetCode\Utilities;

class ConverterText
{
    public static function formatUang($angka = 0): string
    {
        $result = 0;
        if ($angka != 0) {
            $result = number_format($angka, 0, ",-", ".");
        }
        return $result;
    }
}
