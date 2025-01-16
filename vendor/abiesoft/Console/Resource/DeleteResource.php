<?php

namespace AbieSoft\AsetCode\Console\Resource;

class DeleteResource
{
    public static function run(string $string)
    {
        if (count(explode("Controller", $string)) > 1) {
            $nama = $string;
        } else {
            $nama = ucfirst($string) . "Controller";
        }

        $dir = __DIR__ . "/../../../../controllers";
        self::makeSure($dir, $nama);
    }

    protected static function makeSure(string $dir, string $nama): void
    {
        if (file_exists($dir . "/" . $nama . ".php")) {
            echo "\n\e[0;101m Hati-hati! \e[0m\nYakin ingin menghapus file " . $nama . ".php?\e[0m\n";
            echo "Ketik [\e[0;32mYa\e[0m] untuk menghapus file\e[0m\n";
            echo "Tekan [\e[0;32mEnter\e[0m] untuk membatalkan\e[0m\n";
            echo "Pilihan anda : ";
            $formjawab = fopen("php://stdin", "r");
            $jawab = trim(fgets($formjawab));
            if ($jawab == "Ya" || $jawab == "Y" || $jawab == "ya" || $jawab == "y" || $jawab == "Yes" || $jawab == "yes") {
                unlink($dir . "/" . $nama . ".php");
                echo "\n\e[0m\e[0;101m Dihapus! \e[0m\n";
                echo "\e[0;36mLokasi Controller:\e[0m \e[9mcontrollers/" . $nama . ".php\e[0m\n";
                self::removeServiceApi($nama);
            } else {
                echo "\n\e[0m\e[0;101m Dibatalkan! \e[0m\n\n";
                die();
            }
        } else {
            echo "\n\e[0m\e[0;101m file " . $nama . ".php Tidak ditemukan! \e[0m\n\n";
            die();
        }
    }

    protected static function removeServiceApi(string $nama): void
    {
        $serviceDir = __DIR__ . "/../../../../service/Api";
        $serviceName = str_replace("Controller", "Api", $nama);
        unlink($serviceDir . "/" . $serviceName . ".php");
        echo "\e[0;36mLokasi Service:\e[0m \e[9mservice/Api/" . $serviceName . ".php\e[0m\n";
        self::removeModel($serviceName);
    }

    protected static function removeModel(string $service): void
    {
        $modelDir = __DIR__ . "/../../../../models";
        $modelName = str_replace("Api", "", $service);
        unlink($modelDir . "/" . $modelName . ".php");
        echo "\e[0;36mLokasi Model:\e[0m \e[9mmodels/" . $modelName . ".php\e[0m\n";
        self::removeSchema($modelName);
    }

    protected static function removeSchema(string $model): void
    {
        $schemaDir = __DIR__ . "/../../../../schema";
        $schemaName = strtolower($model);
        unlink($schemaDir . "/" . $schemaName . ".php");
        echo "\e[0;36mLokasi Schema:\e[0m \e[9mschema/" . $schemaName . ".php\e[0m\n";
        self::removeTemplate($schemaName);
    }

    protected static function removeTemplate(string $nama): void
    {
        $templateDir = __DIR__ . "/../../../../templates/page/" . $nama;
        unlink($templateDir . "/index.latte");
        unlink($templateDir . "/add.latte");
        unlink($templateDir . "/edit.latte");
        unlink($templateDir . "/read.latte");
        echo "\e[0;36mLokasi Template:\e[0m \e[9mtemplates/page" . explode("/../../../../templates/page", $templateDir)[1] . "/index.latte\e[0m\n";
        echo "\e[0;36mLokasi Template:\e[0m \e[9mtemplates/page" . explode("/../../../../templates/page", $templateDir)[1] . "/add.latte\e[0m\n";
        echo "\e[0;36mLokasi Template:\e[0m \e[9mtemplates/page" . explode("/../../../../templates/page", $templateDir)[1] . "/edit.latte\e[0m\n";
        echo "\e[0;36mLokasi Template:\e[0m \e[9mtemplates/page" . explode("/../../../../templates/page", $templateDir)[1] . "/read.latte\e[0m\n\n";
        rmdir($templateDir);
    }
}
