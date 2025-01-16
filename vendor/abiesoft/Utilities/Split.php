<?php

namespace AbieSoft\AsetCode\Utilities;

class Split
{

    public static function pattren(string $string, string $pattern = "div"): array
    {
        $result = [];
        $pat = "/<" . $pattern . ">(.*?)<\/" . $pattern . ">/";
        preg_match_all($pat, $string, $matches);
        $result = $matches[1];
        return $result;
    }
}
