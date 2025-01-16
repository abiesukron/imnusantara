<?php

namespace AbieSoft\AsetCode\Console;

use AbieSoft\AsetCode\Console\Controller\DeleteController;
use AbieSoft\AsetCode\Console\Controller\MakeController;
use AbieSoft\AsetCode\Console\Database\Backup;
use AbieSoft\AsetCode\Console\Database\Import;
use AbieSoft\AsetCode\Console\Database\Refresh;
use AbieSoft\AsetCode\Console\Database\Restore;
use AbieSoft\AsetCode\Console\Model\DeleteModel;
use AbieSoft\AsetCode\Console\Model\MakeModel;
use AbieSoft\AsetCode\Console\Resource\DeleteResource;
use AbieSoft\AsetCode\Console\Resource\MakeResource;
use AbieSoft\AsetCode\Console\Schema\DeleteSchema;
use AbieSoft\AsetCode\Console\Schema\MakeSchema;
use AbieSoft\AsetCode\Console\Service\DeleteApi;
use AbieSoft\AsetCode\Console\Service\MakeApi;
use AbieSoft\AsetCode\Http\Route;
use AbieSoft\AsetCode\Utilities\Config;
use Exception;

class Terminal
{

    public function __construct($command)
    {
        unset($command[0]);

        $action = "";
        $class = "";
        $namafile = "";
        if (isset($command[1])) {
            if (count(explode(":", $command[1])) > 1) {
                $action = explode(":", $command[1])[0];
                $class = explode(":", $command[1])[1];
                if (isset($command[2])) {
                    $namafile = $command[2];
                } else {
                    if (explode(":", $command[1])[0] == "db") {
                        $action = explode(":", $command[1])[0];
                        $class = explode(":", $command[1])[1];
                    } else {
                        return $this->help();
                    }
                }
            } else {
                $action = $command[1];
            }
        }

        return match ($action) {
            'start' => $this->start($class),
            'db' => $this->database($class),
            'make' => $this->make($class, $namafile),
            'delete' => $this->delete($class, $namafile),
            'api' => $this->test($command),
            'info' => $this->info($command),
            default => $this->help()
        };
    }

    protected function start()
    {
        $dir = __DIR__ . "/../../../" . Config::envReader('PUBLIC_FOLDER');
        chdir($dir);
        $output = null;
        $result = null;
        exec("ping " . Config::envReader('DOMAIN'), $output, $result);
        if ($result) {
            echo "\n\e[0m\e[0;101m Domain Error! \e[0m\n";
            echo "\e[0;36mPesan:\e[0m \e[0m Cek setingan domain pada file .env\e[0m\n\n";
            die();
        } else {
            $ipdestination = str_replace(":", "", explode(" ", $output[3])[2]);
            if (Config::envReader('DOMAIN') ==  $ipdestination || Config::envReader('DOMAIN') == "127.0.0.1") {
                echo "\n\n\n\e[0m\e[0;102m Server Running \e[0m\n";
                echo "\e[0;36mBerjalan di Url:\e[0m \e[0m http://" . Config::envReader('DOMAIN') . ":" . Config::envReader('PORT') . "\e[0m\n";
                echo "\e[0;36mCatatan:\e[0m \e[0m Untuk mematikan server close terminal atau tekan ctrl + C\e[0m\n\n\n\n";
                exec("php -S " . Config::envReader('DOMAIN') . ":" . Config::envReader('PORT'), $output, $result);
            } else {
                echo "\n\e[0m\e[0;101m Domain Error! \e[0m\n";
                echo "\e[0;36mPesan:\e[0m \e[0m Cek setingan domain pada file .env\e[0m\n\n";
                die();
            }
        }
    }

    protected function info($command)
    {
        unset($command[1]);
        $info = $command[2];
        return match ($info) {
            'route' => $this->route(),
            default => $this->help()
        };
    }

    protected function route()
    {
        echo "\n";
        echo "\n\e[0;102m Daftar Route \e[0m\n";
        $tabel = "%-5.5s %-100.100s  %7.7s \n";
        printf($tabel, 'No', 'Route', 'Method');
        $no = 1;
        $router = new Route;
        foreach ($router->listRoute() as $k => $v) {
            foreach ($v as $kv => $vv) {
                printf($tabel, $no . ". ", $kv . "  --------------------------------------------------------------------------------------------------------------------------", strtoupper($k));
                $no++;
            }
        }
        echo "\n";
    }

    protected function test($command)
    {
        unset($command[1]);
        $tabel = $command[2];
        $function = $command[3];
        return match ($function) {
            '--excel' => $this->excelTest($tabel),
            '--excel-o' => $this->excelTestOutput($tabel),
            '--tabel' => $this->tabelTest($tabel),
            default => $this->help()
        };
    }

    protected function excelTest($tabel)
    {
        $ch = curl_init();
        $apikey = Config::envReader('APIKEY');
        $headers = [
            "x-API-key:$apikey"
        ];
        curl_setopt($ch, CURLOPT_URL, Config::baseURL() . "api/" . $tabel . "/excel");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        if ($response != "Not Found") {
            $result = json_decode($response);
            if ($result) {
                echo "\n\e[0;102m Api Sukses! \e[0m \n";
                print_r($result);
                echo "\n\n";
                die();
            } else {
                echo "\n\e[0;101m Api Error! \e[0m \n";
                echo "Json Error | Cek function \e[36mexcel()\e[0m di file \e[36mservice/Api/" . ucfirst($tabel) . "Api.php\e[0m pastikan outputnya berupa json\n\n";
                die();
            }
        } else {
            echo "\n\e[0;101m Api Error! \e[0m \n";
            echo "Pastikan terdapat file \e[36m" . ucfirst($tabel) . "Api.php\e[0m di folder \e[36mservice/Api/\e[0m\n\n";
            die();
        }
        curl_close($ch);
    }

    protected function excelTestOutput($tabel)
    {
        $ch = curl_init();
        $apikey = Config::envReader('APIKEY');
        $headers = [
            "x-API-key:$apikey"
        ];
        curl_setopt($ch, CURLOPT_URL, Config::baseURL() . "api/" . $tabel . "/excel");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        if ($response != "Not Found") {
            echo $response;
            die();
        } else {
            echo "\n\e[0;101m Api Error! \e[0m \n";
            echo "Pastikan terdapat file \e[36m" . ucfirst($tabel) . "Api.php\e[0m di folder \e[36mservice/Api/\e[0m\n\n";
            die();
        }
        curl_close($ch);
    }

    protected function tabelTest($tabel)
    {
        $ch = curl_init();
        $apikey = Config::envReader('APIKEY');
        $headers = [
            "x-API-key:$apikey"
        ];
        curl_setopt($ch, CURLOPT_URL, Config::baseURL() . "api/" . $tabel);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        if ($response != "Not Found") {
            echo "\n\e[0;102m Api Sukses! \e[0m \n";
            $result = $response;
            echo $result . "\n\n";
            die();
        } else {
            echo "\n\e[0;101m Api Error! \e[0m \n";
            echo "Pastikan terdapat file \e[36m" . ucfirst($tabel) . "Api.php\e[0m di folder \e[36mservice/Api/\e[0m\n\n";
            die();
        }
        curl_close($ch);
    }

    protected function database(string $class)
    {
        return match ($class) {
            'backup' => Backup::run(),
            'import' => Import::run(),
            'refresh' => Refresh::run(),
            'restore' => Restore::run(),
            default => $this->help()
        };
    }

    protected function make(string $class, string $namafile)
    {
        return match ($class) {
            'schema' => MakeSchema::run($namafile),
            'controller' => MakeController::run($namafile),
            'model' => MakeModel::run($namafile),
            'api' => MakeApi::run($namafile),
            'resource' => MakeResource::run($namafile),
            default => $this->help()
        };
    }

    protected function delete(string $class, string $namafile)
    {
        return match ($class) {
            'schema' => DeleteSchema::run($namafile),
            'controller' => DeleteController::run($namafile),
            'model' => DeleteModel::run($namafile),
            'api' => DeleteApi::run($namafile),
            'resource' => DeleteResource::run($namafile),
            default => $this->help()
        };
    }

    protected function help()
    {
        echo "\n\n\e[0;102mHelp! \e[0m\n";
        echo "\e[0;36mAplikasi:\e[0m \n";
        echo "\e[0m     start \n";
        echo "\e[0m     info route \n";
        echo "\e[0;36mApi Test:\e[0m \n";
        echo "\e[0m     api:test [namatabel] --excel \n";
        echo "\e[0m     api:test [namatabel] --excel-o \n";
        echo "\e[0m     api:test [namatabel] --tabel \n";
        echo "\e[0;36mDatabase:\e[0m \n";
        echo "\e[0m     db:import \n";
        echo "\e[0m     db:refresh \n";
        echo "\e[0m     db:backup \n";
        echo "\e[0m     db:restore \n";
        echo "\e[0;36mSchema:\e[0m \n";
        echo "\e[0m     make:schema [nama] \n";
        echo "\e[0m     delete:schema [nama] \n";
        echo "\e[0;36mController:\e[0m \n";
        echo "\e[0m     make:controller [nama] \n";
        echo "\e[0m     delete:controller [nama] \n";
        echo "\e[0;36mModel:\e[0m \n";
        echo "\e[0m     make:model [nama] \n";
        echo "\e[0m     delete:model [nama] \n";
        echo "\e[0;36mApi Service:\e[0m \n";
        echo "\e[0m     make:api [nama] \n";
        echo "\e[0m     delete:api [nama] \n";
        echo "\e[0;36mResource:\e[0m \n";
        echo "\e[0m     make:resource [nama] \n";
        echo "\e[0m     delete:resource [nama] \n";
        echo "\n\n";
    }
}
