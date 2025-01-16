<?php

namespace AbieSoft\AsetCode\Utilities;

use Symfony\Component\Yaml\Yaml;

class Config
{

    public static function envReader($nama): string
    {
        return parse_ini_file(__DIR__ . "/../../../.env")[$nama];
    }

    public static function yamlReader(string $namafile)
    {
        return Yaml::parseFile(__DIR__ . "/../../../config/" . $namafile . ".yaml");
    }

    public static function baseURL(): string
    {
        $domain = self::envReader("DOMAIN");
        $port = self::envReader("PORT");
        $ssl = self::envReader("SSL");
        ($ssl) ? $http = "https://" : $http = "http://";

        if (count(explode(".", $domain)) > 3) {
            $domain = $domain . ":" . $port;
        } else {
            $domain = $domain;
        }

        return $http . $domain . "/";
    }
}
