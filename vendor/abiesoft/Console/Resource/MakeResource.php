<?php

namespace AbieSoft\AsetCode\Console\Resource;

class MakeResource
{
    public static function run(string $string)
    {

        if (count(explode("Controller", $string)) > 1) {
            $nama = $string;
        } else {
            $nama = ucfirst($string) . "Controller";
        }

        $dir = __DIR__ . "/../../../../controllers";
        if (!is_dir($dir)) {
            mkdir($dir, 0777, false);
        }
        self::makeSure($dir, $nama);
        self::releaseFile($dir, $nama);
    }

    protected static function makeSure(string $dir, string $nama): void
    {
        if (file_exists($dir . "/" . $nama . ".php")) {
            echo "\n\e[0;101m Hati-hati! \e[0m\nFile " . $nama . ".php sudah ada. Ingin menimpanya?\e[0m\n";
            echo "Ketik [\e[0;32mYa\e[0m] untuk menimpah file\e[0m\n";
            echo "Tekan [\e[0;32mEnter\e[0m] untuk membatalkan\e[0m\n";
            echo "Pilihan anda : ";
            $formjawab = fopen("php://stdin", "r");
            $jawab = trim(fgets($formjawab));
            if ($jawab == "Ya" || $jawab == "Y" || $jawab == "ya" || $jawab == "y" || $jawab == "Yes" || $jawab == "yes") {
                self::releaseFile($dir, $nama);
                die();
            } else {
                echo "\n\e[0m\e[0;101m Dibatalkan! \e[0m\n\n";
                die();
            }
        }
    }

    protected static function releaseFile(string $dir, string $nama): void
    {
        $file = fopen($dir . "/" . $nama . ".php", 'w') or die("Tidak Dapat Membuka File");
        $isi = "<?php \n\n";
        fwrite($file, $isi);
        $isi = "namespace App\Controller;\n\n";
        fwrite($file, $isi);
        $isi = "use AbieSoft\AsetCode\Http\Controller;\n\n";
        fwrite($file, $isi);
        $isi = "class " . $nama . " extends Controller\n";
        fwrite($file, $isi);
        $isi = "{\n\n";
        fwrite($file, $isi);

        $isi = "    public function index()\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        return $" . "" . "this->view(\n";
        fwrite($file, $isi);
        $isi = "            page: '" . strtolower(explode("Controller", $nama)[0]) . "/index',\n";
        fwrite($file, $isi);
        $isi = "            data: [\n";
        fwrite($file, $isi);
        $isi = "                'title' => '" . explode("Controller", $nama)[0] . "',\n";
        fwrite($file, $isi);
        $isi = "            ]\n";
        fwrite($file, $isi);
        $isi = "        );\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);

        $isi = "    public function add()\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        return $" . "" . "this->view(\n";
        fwrite($file, $isi);
        $isi = "            page: '" . strtolower(explode("Controller", $nama)[0]) . "/add',\n";
        fwrite($file, $isi);
        $isi = "            data: [\n";
        fwrite($file, $isi);
        $isi = "                'title' => 'Buat " . explode("Controller", $nama)[0] . "',\n";
        fwrite($file, $isi);
        $isi = "            ]\n";
        fwrite($file, $isi);
        $isi = "        );\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);

        $isi = "    public function edit($" . "" . "id)\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        return $" . "" . "this->view(\n";
        fwrite($file, $isi);
        $isi = "            page: '" . strtolower(explode("Controller", $nama)[0]) . "/edit',\n";
        fwrite($file, $isi);
        $isi = "            data: [\n";
        fwrite($file, $isi);
        $isi = "                'title' => 'Edit " . explode("Controller", $nama)[0] . "',\n";
        fwrite($file, $isi);
        $isi = "                'id' => $" . "" . "id,\n";
        fwrite($file, $isi);
        $isi = "            ]\n";
        fwrite($file, $isi);
        $isi = "        );\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);

        $isi = "    public function read($" . "" . "parameter)\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        return $" . "" . "this->view(\n";
        fwrite($file, $isi);
        $isi = "            page: '" . strtolower(explode("Controller", $nama)[0]) . "/read',\n";
        fwrite($file, $isi);
        $isi = "            data: [\n";
        fwrite($file, $isi);
        $isi = "                'title' => 'Detail " . explode("Controller", $nama)[0] . "',\n";
        fwrite($file, $isi);
        $isi = "            ]\n";
        fwrite($file, $isi);
        $isi = "        );\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);

        $isi = "}\n";
        fwrite($file, $isi);
        fclose($file);
        echo "\n\e[0;102m Sukses! \e[0m\n\e[0;36mLokasi Controller:\e[0m controllers/" . $nama . ".php \n";

        self::releaseApiFile($nama);
    }


    protected static function releaseApiFile(string $controller): void
    {
        $serviceDir = __DIR__ . "/../../../../service/Api";
        $serviceName = str_replace("Controller", "Api", $controller);

        $file = fopen($serviceDir . "/" . $serviceName . ".php", 'w') or die("Tidak Dapat Membuka File");
        $isi = "<?php \n\n";
        fwrite($file, $isi);
        $isi = "namespace App\Service\Api;\n\n";
        fwrite($file, $isi);

        $isi = "use AbieSoft\AsetCode\Mysql\DB;\n";
        fwrite($file, $isi);
        $isi = "use AbieSoft\AsetCode\Utilities\Input;\n";
        fwrite($file, $isi);
        $isi = "use AbieSoft\AsetCode\Utilities\Guard;\n";
        fwrite($file, $isi);
        $isi = "use App\Service\Service;\n";
        fwrite($file, $isi);
        $isi = "use Shuchkin\SimpleXLSXGen;\n\n";
        fwrite($file, $isi);
        $isi = "class " . $serviceName . " extends Service\n";
        fwrite($file, $isi);
        $isi = "{\n";
        fwrite($file, $isi);

        $isi = "    public function load()\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        return match (strtolower($" . "" . "_SERVER['REQUEST_METHOD'])) {\n";
        fwrite($file, $isi);
        $isi = "            'get' => $" . "" . "this->list(),\n";
        fwrite($file, $isi);
        $isi = "            default => $" . "" . "this->post()\n";
        fwrite($file, $isi);
        $isi = "        };\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);

        $isi = "    protected function post()\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        $" . "" . "method = Input::get('__method');\n";
        fwrite($file, $isi);
        $isi = "        return match ($" . "" . "method) {\n";
        fwrite($file, $isi);
        $isi = "            'DELETE' => $" . "" . "this->remove(),\n";
        fwrite($file, $isi);
        $isi = "            'PATCH' => $" . "" . "this->replace(),\n";
        fwrite($file, $isi);
        $isi = "            default => $" . "" . "this->keep()\n";
        fwrite($file, $isi);
        $isi = "        };\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);

        $isi = "    protected function excel()\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        $" . "" . "this->authentication('get');\n";
        fwrite($file, $isi);
        $isi = "        /*\n";
        fwrite($file, $isi);
        $isi = "            $" . "" . "data = [\n";
        fwrite($file, $isi);
        $isi = "                ['nama']\n";
        fwrite($file, $isi);
        $isi = "            ];\n\n";
        fwrite($file, $isi);
        $query = '"SELECT nama FROM ' . strtolower(explode("Api", $serviceName)[0]) . '"';
        $isi = "            $" . "" . "cek = DB::terhubung()->query(" . $query . ")->hasil();\n\n";
        fwrite($file, $isi);
        $isi = "            foreach ($" . "" . "cek as $" . "" . "c) {\n";
        fwrite($file, $isi);
        $isi = "                $" . "" . "item = [];\n";
        fwrite($file, $isi);
        $isi = "                $" . "" . "item[] = $" . "" . "c->nama;\n";
        fwrite($file, $isi);
        $isi = "                array_push($" . "" . "data, $" . "" . "item);\n";
        fwrite($file, $isi);
        $isi = "            }\n\n";
        fwrite($file, $isi);
        $isi = "            SimpleXLSXGen::fromArray($" . "" . "data)->saveAs('assets/download/" . strtolower(explode("Api", $serviceName)[0]) . "_tabel.xlsx');\n\n";
        fwrite($file, $isi);
        $isi = "            $" . "" . "result = [];\n";
        fwrite($file, $isi);
        $isi = "            $" . "" . "result['code'] = 200;\n";
        fwrite($file, $isi);
        $isi = "            $" . "" . "result['message'] = 'OK';\n";
        fwrite($file, $isi);
        $isi = "            $" . "" . "result['data'] = ['assets/download/" . strtolower(explode("Api", $serviceName)[0]) . "_tabel.xlsx'];\n";
        fwrite($file, $isi);
        $isi = "            echo json_encode($" . "" . "result);\n";
        fwrite($file, $isi);
        $isi = "        */\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);

        $isi = "    protected function list()\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        $" . "" . "this->authentication('get');\n";
        fwrite($file, $isi);
        $isi = "        $" . "" . "data = [];\n";
        fwrite($file, $isi);
        $isi = "        $" . "" . "result = [];\n";
        fwrite($file, $isi);
        $isi = "        $" . "" . "result['code'] = 200;\n";
        fwrite($file, $isi);
        $isi = "        $" . "" . "result['message'] = 'OK';\n";
        fwrite($file, $isi);
        $isi = "        $" . "" . "result['data'] = $" . "" . "data;\n";
        fwrite($file, $isi);
        $isi = "        $" . "" . "result['opsi'] = 'ED';\n";
        fwrite($file, $isi);
        $isi = "        echo json_encode($" . "" . "result);\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);

        $isi = "    protected function keep()\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        $" . "" . "this->authentication('post');\n";
        fwrite($file, $isi);
        $isi = "        /*\n";
        fwrite($file, $isi);
        $isi = "            $" . "" . "nama = Input::get('nama');\n";
        fwrite($file, $isi);
        $isi = "            $" . "" . "csrf = Input::get('__csrf');\n\n";
        fwrite($file, $isi);
        $isi = "            if (Guard::formChecker($" . "" . "csrf)) {\n";
        fwrite($file, $isi);
        $isi = "                $" . "" . "input = DB::terhubung()->input('" . strtolower(explode("Api", $serviceName)[0]) . "', [\n";
        fwrite($file, $isi);
        $isi = "                    'nama' => $" . "" . "nama,\n";
        fwrite($file, $isi);
        $isi = "                ]);\n";
        fwrite($file, $isi);
        $isi = "                if ($" . "" . "input) {\n";
        fwrite($file, $isi);
        $isi = "                    die('Berhasil');\n";
        fwrite($file, $isi);
        $isi = "                }else{\n";
        fwrite($file, $isi);
        $isi = "                    die('Gagal');\n";
        fwrite($file, $isi);
        $isi = "                }\n";
        fwrite($file, $isi);
        $isi = "            }else{\n";
        fwrite($file, $isi);
        $isi = "                die('Token Expire');\n";
        fwrite($file, $isi);
        $isi = "            }\n";
        fwrite($file, $isi);
        $isi = "        */\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);

        $isi = "    protected function replace()\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        $" . "" . "this->authentication('post');\n";
        fwrite($file, $isi);
        $isi = "        /*\n";
        fwrite($file, $isi);
        $isi = "            $" . "" . "nama = Input::get('nama');\n";
        fwrite($file, $isi);
        $isi = "            $" . "" . "csrf = Input::get('__csrf');\n";
        fwrite($file, $isi);
        $isi = "            $" . "" . "id = Input::get('id');\n\n";
        fwrite($file, $isi);
        $isi = "            if (Guard::formChecker($" . "" . "csrf)) {\n";
        fwrite($file, $isi);
        $isi = "                $" . "" . "perbarui = DB::terhubung()->perbarui('" . strtolower(explode("Api", $serviceName)[0]) . "', $" . "" . "id, [\n";
        fwrite($file, $isi);
        $isi = "                    'nama' => $" . "" . "nama,\n";
        fwrite($file, $isi);
        $isi = "                ]);\n";
        fwrite($file, $isi);
        $isi = "                if ($" . "" . "perbarui) {\n";
        fwrite($file, $isi);
        $isi = "                    die('Berhasil');\n";
        fwrite($file, $isi);
        $isi = "                }else{\n";
        fwrite($file, $isi);
        $isi = "                    die('Gagal');\n";
        fwrite($file, $isi);
        $isi = "                }\n";
        fwrite($file, $isi);
        $isi = "            }else{\n";
        fwrite($file, $isi);
        $isi = "                die('Token Expire');\n";
        fwrite($file, $isi);
        $isi = "            }\n";
        fwrite($file, $isi);
        $isi = "        */\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);

        $isi = "    protected function remove()\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        $" . "" . "this->authentication('post');\n";
        fwrite($file, $isi);
        $isi = "        /*\n";
        fwrite($file, $isi);
        $isi = "            $" . "" . "csrf = Input::get('__csrf');\n";
        fwrite($file, $isi);
        $isi = "            $" . "" . "id = Input::get('id');\n";
        fwrite($file, $isi);
        $isi = "            $" . "" . "nama = '';\n\n";
        fwrite($file, $isi);
        $isi = "            if (Guard::formChecker($" . "" . "csrf)) {\n";
        fwrite($file, $isi);
        $whereid = '".$' . '' . 'id."';
        $where = " id='" . $whereid . "' ";
        $query = '"SELECT nama FROM users WHERE ' . $where . ' "';
        $isi = "                $" . "" . "data = DB::terhubung()->query(" . $query . ");\n";
        fwrite($file, $isi);
        $isi = "                foreach ($" . "" . "data->hasil() as $" . "" . "d) {\n";
        fwrite($file, $isi);
        $isi = "                    $" . "" . "nama = $" . "" . "d->nama;\n";
        fwrite($file, $isi);
        $isi = "                }\n";
        fwrite($file, $isi);
        $isi = "                $" . "" . "hapus = DB::terhubung()->hapus('" . strtolower(explode("Api", $serviceName)[0]) . "', ['id', '=', $" . "" . "id]);\n";
        fwrite($file, $isi);
        $isi = "                if ($" . "" . "hapus) {\n";
        fwrite($file, $isi);
        $isi = "                    die('Berhasil|User <strong>' . $" . "" . "nama . '</strong> sudah dihapus');\n";
        fwrite($file, $isi);
        $isi = "                }\n";
        fwrite($file, $isi);
        $isi = "            }else{\n";
        fwrite($file, $isi);
        $isi = "                die('Token Expire');\n";
        fwrite($file, $isi);
        $isi = "            }\n";
        fwrite($file, $isi);
        $isi = "        */\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);

        $isi = "}\n";
        fwrite($file, $isi);
        fclose($file);
        echo "\e[0;36mLokasi Service:\e[0m service/Api/" . $serviceName . ".php\n";

        self::releaseModelFile($serviceName);
    }

    protected static function releaseModelFile(string $service): void
    {
        $modelDir = __DIR__ . "/../../../../models";
        $modelName = str_replace("Api", "", $service);

        $file = fopen($modelDir . "/" . $modelName . ".php", 'w') or die("Tidak Dapat Membuka File");
        $isi = "<?php \n\n";
        fwrite($file, $isi);
        $isi = "namespace App\Model;\n\n";
        fwrite($file, $isi);
        $isi = "use AbieSoft\AsetCode\Collection\DataManagement;\n\n";
        fwrite($file, $isi);
        $isi = "class " . $modelName . "\n";
        fwrite($file, $isi);
        $isi = "{\n";
        fwrite($file, $isi);
        $isi = "    use DataManagement;\n";
        fwrite($file, $isi);

        $isi = "}\n";
        fwrite($file, $isi);
        fclose($file);
        echo "\e[0;36mLokasi Model:\e[0m models/" . $modelName . ".php \n";
        self::releaseSchemaFile($modelName);
    }

    protected static function releaseSchemaFile(string $model): void
    {
        $schemaDir = __DIR__ . "/../../../../schema";
        $schemaName = strtolower($model);

        $file = fopen($schemaDir . "/" . $schemaName . ".php", 'w') or die("Tidak Dapat Membuka File");

        $isi = "<?php \n\n";
        fwrite($file, $isi);
        $isi = "namespace App\Schema;\n\n";
        fwrite($file, $isi);
        $isi = "use AbieSoft\AsetCode\Mysql\DB;\n";
        fwrite($file, $isi);
        $isi = "use AbieSoft\AsetCode\Mysql\Schema;\n";
        fwrite($file, $isi);
        $isi = "class " . $schemaName . " extends Schema \n";
        fwrite($file, $isi);
        $isi = "{\n\n";
        fwrite($file, $isi);

        $isi = "    public function buattabel()\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        $" . "" . "schema = new Schema;\n";
        fwrite($file, $isi);
        $isi = "        /*\n";
        fwrite($file, $isi);
        $isi = "            contoh membuat kolom nama VARCHAR\n";
        fwrite($file, $isi);
        $isi = "            dengan panjang karakter 50\n";
        fwrite($file, $isi);
        $isi = "            $" . "" . "schema->teks(nama: 'nama', panjang: 50);\n";
        fwrite($file, $isi);
        $isi = "        */\n";
        fwrite($file, $isi);
        $isi = "        $" . "" . "sql = $" . "" . "schema->create('" . $schemaName . "');\n";
        fwrite($file, $isi);
        $isi = "        DB::terhubung()->query($" . "" . "sql);\n";
        fwrite($file, $isi);
        $isi = "        $" . "" . "this->buatdata();\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);

        $isi = "    public function buatdata()\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        /*\n";
        fwrite($file, $isi);
        $isi = "            DB::terhubung()->input('" . $schemaName . "', [\n";
        fwrite($file, $isi);
        $isi = "                'nama' => '',\n";
        fwrite($file, $isi);
        $isi = "            ]);\n";
        fwrite($file, $isi);
        $isi = "        */\n";
        fwrite($file, $isi);
        $isi = "    }\n";
        fwrite($file, $isi);

        $isi = "}\n";
        fwrite($file, $isi);

        $isi = "$" . "" . "create = new " . $schemaName . "();\n";
        fwrite($file, $isi);
        $isi = "$" . "" . "create->buattabel();\n";
        fwrite($file, $isi);

        fclose($file);
        echo "\e[0;36mLokasi Schema:\e[0m schema/" . $schemaName . ".php \n";

        self::releaseTemplateFile($schemaName);
    }

    protected static function releaseTemplateFile(string $folder): void
    {
        $templateDir = __DIR__ . "/../../../../templates/page/" . $folder;
        if (!file_exists($templateDir)) {
            mkdir($templateDir, 0777);
        }

        self::releaseFileIndex($templateDir);
        self::releaseFileAdd($templateDir);
        self::releaseFileEdit($templateDir);
        self::releaseFileRead($templateDir);
    }

    protected static function releaseFileIndex(string $folder): void
    {
        $file = fopen($folder . "/index.latte", 'w') or die("Tidak Dapat Membuka File");
        $page = explode('/page/', $folder)[1];

        $isi = "{layout '../../main.latte'}\n";
        fwrite($file, $isi);
        $isi = "{block title}" . "" . "{" . "" . "$" . "" . "title}{/block}\n\n";
        fwrite($file, $isi);
        $isi = "{block content}\n";
        fwrite($file, $isi);

        $isi = "<div class='page'>\n";
        fwrite($file, $isi);
        $isi = "    <div class='page-header'>\n";
        fwrite($file, $isi);
        $isi = "        <div class='page-info'>\n";
        fwrite($file, $isi);
        $isi = "            <div class='display-6'>{" . "" . "$" . "" . "title}</div>\n";
        fwrite($file, $isi);
        $isi = "            <div class='breadcrumb'>\n";
        fwrite($file, $isi);
        $isi = "                <ul>\n";
        fwrite($file, $isi);
        $isi = "                    <li><a href='{" . "" . "$" . "" . "url}'><i class='las la-home'></i></a></li>\n";
        fwrite($file, $isi);
        $isi = "                    <li>" . ucfirst($page) . "</li>\n";
        fwrite($file, $isi);
        $isi = "                </ul>\n";
        fwrite($file, $isi);
        $isi = "            </div>\n";
        fwrite($file, $isi);
        $isi = "        </div>\n";
        fwrite($file, $isi);
        $isi = "        <div class='page-option'>\n";
        fwrite($file, $isi);
        $isi = "            <form>\n";
        fwrite($file, $isi);
        $isi = "                <div class='btn-grup'>\n";
        fwrite($file, $isi);
        $isi = "                    <button type='button' onClick='window.location.href=this.dataset.link' data-link='{" . "" . "$" . "" . "url}" . $page . "/add'><i class='las la-plus'></i><span>Buat</span></button>\n";
        fwrite($file, $isi);
        $isi = "                    <button type='button' class='refresh' onClick='abiesoftTabel({\n";
        fwrite($file, $isi);
        $namatabel = '"tabel' . $page . '"';
        $isi = "                        id: " . $namatabel . ",\n";
        fwrite($file, $isi);
        $isi = "                        aktif: 1,\n";
        fwrite($file, $isi);
        $isi = "                        perpage: 10\n";
        fwrite($file, $isi);
        $isi = "                    })' title='refresh tabel'><i class='las la-sync-alt'></i></button>\n";
        fwrite($file, $isi);
        $isi = "                    <button class='download-excel' type='button' data-tabel='" . $page . "' title='Simpan tabel sebagai file excel'><i class='las la-download'></i></button>\n";
        fwrite($file, $isi);
        $isi = "                </div>\n";
        fwrite($file, $isi);
        $isi = "            </form>\n";
        fwrite($file, $isi);
        $isi = "        </div>\n";
        fwrite($file, $isi);
        $isi = "    </div>\n";
        fwrite($file, $isi);
        $isi = "    <div class='row'>\n";
        fwrite($file, $isi);
        $isi = "        <div class='col-12'>\n";
        fwrite($file, $isi);
        $isi = "            <div class='card'>\n";
        fwrite($file, $isi);
        $isi = "                <div class='card-table' id='tabel" . $page . "'>\n";
        fwrite($file, $isi);
        $isi = "                    <table class='minW-800'>\n";
        fwrite($file, $isi);
        $isi = "                        <thead>\n";
        fwrite($file, $isi);
        $isi = "                            <tr>\n";
        fwrite($file, $isi);
        $isi = "                                <th>No</th>\n";
        fwrite($file, $isi);
        $isi = "                                <th>Nama</th>\n";
        fwrite($file, $isi);
        $isi = "                                <th>Opsi</th>\n";
        fwrite($file, $isi);
        $isi = "                            </tr>\n";
        fwrite($file, $isi);
        $isi = "                        </thead>\n";
        fwrite($file, $isi);
        $isi = "                        <tbody></tbody>\n";
        fwrite($file, $isi);
        $isi = "                        <tfoot>\n";
        fwrite($file, $isi);
        $isi = "                            <tr>\n";
        fwrite($file, $isi);
        $isi = "                                <th>No</th>\n";
        fwrite($file, $isi);
        $isi = "                                <th>Nama</th>\n";
        fwrite($file, $isi);
        $isi = "                                <th>Opsi</th>\n";
        fwrite($file, $isi);
        $isi = "                            </tr>\n";
        fwrite($file, $isi);
        $isi = "                        </tfoot>\n";
        fwrite($file, $isi);
        $isi = "                    </table>\n";
        fwrite($file, $isi);
        $isi = "                </div>\n";
        fwrite($file, $isi);
        $isi = "            </div>\n";
        fwrite($file, $isi);
        $isi = "        </div>\n";
        fwrite($file, $isi);
        $isi = "    </div>\n";
        fwrite($file, $isi);
        $isi = "</div>\n";
        fwrite($file, $isi);

        $isi = "{/block}\n\n";
        fwrite($file, $isi);
        $isi = "{block js}\n";
        fwrite($file, $isi);
        $isi = "<script>\n";
        fwrite($file, $isi);
        $isi = "abiesoftTabel({\n";
        fwrite($file, $isi);
        $isi = "    id: 'tabel" . $page . "',\n";
        fwrite($file, $isi);
        $isi = "    aktif: 1,\n";
        fwrite($file, $isi);
        $isi = "    perpage: 10\n";
        fwrite($file, $isi);
        $isi = "});\n";
        fwrite($file, $isi);
        $isi = "</script>\n";
        fwrite($file, $isi);
        $isi = "{/block}\n";
        fwrite($file, $isi);

        echo "\e[0;36mLokasi Template:\e[0m templates/page/" . explode("/../../../../templates/page/", $folder)[1] . "/index.latte \n";
    }

    protected static function releaseFileAdd(string $folder): void
    {
        $file = fopen($folder . "/add.latte", 'w') or die("Tidak Dapat Membuka File");
        $page = explode('/page/', $folder)[1];

        $isi = "{layout '../../main.latte'}\n";
        fwrite($file, $isi);
        $isi = "{block title}" . "" . "{" . "" . "$" . "" . "title}{/block}\n\n";
        fwrite($file, $isi);
        $isi = "{block content}\n";
        fwrite($file, $isi);

        $isi = "<form id='formInput' name='formInput' method='post'>\n";
        fwrite($file, $isi);
        $isi = "    <div class='page'>\n";
        fwrite($file, $isi);
        $isi = "        <div class='page-header'>\n";
        fwrite($file, $isi);
        $isi = "            <div class='page-info'>\n";
        fwrite($file, $isi);
        $isi = "                <div class='display-6'>{" . "" . "$" . "" . "title}</div>\n";
        fwrite($file, $isi);
        $isi = "                <div class='breadcrumb'>\n";
        fwrite($file, $isi);
        $isi = "                    <ul>\n";
        fwrite($file, $isi);
        $isi = "                        <li><a href='{" . "" . "$" . "" . "url}'><i class='las la-home'></i></a></li>\n";
        fwrite($file, $isi);
        $isi = "                        <li><a href='{" . "" . "$" . "" . "url}" . $page . "'>" . ucfirst($page) . "</a></li>\n";
        fwrite($file, $isi);
        $isi = "                        <li>Buat</li>\n";
        fwrite($file, $isi);
        $isi = "                    </ul>\n";
        fwrite($file, $isi);
        $isi = "                </div>\n";
        fwrite($file, $isi);
        $isi = "            </div>\n";
        fwrite($file, $isi);
        $isi = "            <div class='page-option'></div>\n";
        fwrite($file, $isi);
        $isi = "        </div>\n";
        fwrite($file, $isi);
        $isi = "        <div class='row'>\n";
        fwrite($file, $isi);
        $isi = "            <div class='col-6'>\n";
        fwrite($file, $isi);
        $isi = "                <div class='card'>\n";
        fwrite($file, $isi);
        $isi = "                    <div class='card-header'>\n";
        fwrite($file, $isi);
        $isi = "                        <div>Form Buat " . $page . "</div>\n";
        fwrite($file, $isi);
        $isi = "                    </div>\n";
        fwrite($file, $isi);
        $isi = "                    <div class='card-form'>\n";
        fwrite($file, $isi);
        $isi = "                        <div class='form-grup'>\n";
        fwrite($file, $isi);
        $isi = "                            <label for='nama'>Nama</label>\n";
        fwrite($file, $isi);
        $isi = "                            <input class='form-control' id='nama' name='nama' placeholder='Nama' autocomplete='off' autofocus>\n";
        fwrite($file, $isi);
        $isi = "                        </div>\n";
        fwrite($file, $isi);
        $isi = "                        <div class='form-button'>\n";
        fwrite($file, $isi);
        $isi = "                            <button class='btn btn-primary'><span id='btnSubmit'>Simpan</span></button>\n";
        fwrite($file, $isi);
        $isi = "                        </div>\n";
        fwrite($file, $isi);
        $isi = "                    </div>\n";
        fwrite($file, $isi);
        $isi = "                </div>\n";
        fwrite($file, $isi);
        $isi = "            </div>\n";
        fwrite($file, $isi);
        $isi = "        </div>\n";
        fwrite($file, $isi);
        $isi = "    </div>\n";
        fwrite($file, $isi);
        $isi = "</form>\n";
        fwrite($file, $isi);

        $isi = "{/block}\n\n";
        fwrite($file, $isi);
        $isi = "{block js}\n";
        fwrite($file, $isi);
        $isi = "<script>\n";
        fwrite($file, $isi);
        $isi = "let formInput = el('#formInput');\n";
        fwrite($file, $isi);
        $isi = "formInput.addEventListener('submit', (e)=>{\n";
        fwrite($file, $isi);
        $isi = "    e.preventDefault();\n\n";
        fwrite($file, $isi);
        $isi = "    let val = validasi({\n";
        fwrite($file, $isi);
        $isi = "        formID: 'formInput',\n";
        fwrite($file, $isi);
        $isi = "        validate: [\n";
        fwrite($file, $isi);
        $isi = "        'nama|setText'\n";
        fwrite($file, $isi);
        $isi = "        ],\n";
        fwrite($file, $isi);
        $isi = "    });\n\n";
        fwrite($file, $isi);
        $isi = "    if(val){\n";
        fwrite($file, $isi);
        $isi = "        submitForm({\n";
        fwrite($file, $isi);
        $isi = "            formID: 'formInput',\n";
        fwrite($file, $isi);
        $isi = "            loadingLabel: 'Menyimpan..',\n";
        fwrite($file, $isi);
        $isi = "            tabel: '" . $page . "',\n";
        fwrite($file, $isi);
        $isi = "            labelButton: 'Simpan',\n";
        fwrite($file, $isi);
        $isi = "            messageSuccess: '" . ucfirst($page) . " telah dibuat',\n";
        fwrite($file, $isi);
        $isi = "            resetForm: ['nama'],\n";
        fwrite($file, $isi);
        $isi = "            focus: 'nama'\n";
        fwrite($file, $isi);
        $isi = "        });\n\n";
        fwrite($file, $isi);
        $isi = "    }\n";
        fwrite($file, $isi);
        $isi = "});\n";
        fwrite($file, $isi);
        $isi = "</script>\n";
        fwrite($file, $isi);
        $isi = "{/block}\n";
        fwrite($file, $isi);
        echo "\e[0;36mLokasi Template:\e[0m templates/page/" . explode("/../../../../templates/page/", $folder)[1] . "/add.latte \n";
    }

    protected static function releaseFileEdit(string $folder): void
    {
        $file = fopen($folder . "/edit.latte", 'w') or die("Tidak Dapat Membuka File");
        $page = explode('/page/', $folder)[1];

        $isi = "{layout '../../main.latte'}\n";
        fwrite($file, $isi);
        $isi = "{block title}" . "" . "{" . "" . "$" . "" . "title}{/block}\n\n";
        fwrite($file, $isi);
        $isi = "{block content}\n";
        fwrite($file, $isi);

        $isi = "<form id='formInput' name='formInput' method='post'>\n";
        fwrite($file, $isi);
        $isi = "    <div class='page'>\n";
        fwrite($file, $isi);
        $isi = "        <div class='page-header'>\n";
        fwrite($file, $isi);
        $isi = "            <div class='page-info'>\n";
        fwrite($file, $isi);
        $isi = "                <div class='display-6'>{" . "" . "$" . "" . "title}</div>\n";
        fwrite($file, $isi);
        $isi = "                <div class='breadcrumb'>\n";
        fwrite($file, $isi);
        $isi = "                    <ul>\n";
        fwrite($file, $isi);
        $isi = "                        <li><a href='{" . "" . "$" . "" . "url}'><i class='las la-home'></i></a></li>\n";
        fwrite($file, $isi);
        $isi = "                        <li><a href='{" . "" . "$" . "" . "url}" . $page . "'>" . ucfirst($page) . "</a></li>\n";
        fwrite($file, $isi);
        $isi = "                        <li>Edit</li>\n";
        fwrite($file, $isi);
        $isi = "                    </ul>\n";
        fwrite($file, $isi);
        $isi = "                </div>\n";
        fwrite($file, $isi);
        $isi = "            </div>\n";
        fwrite($file, $isi);
        $isi = "            <div class='page-option'></div>\n";
        fwrite($file, $isi);
        $isi = "        </div>\n";
        fwrite($file, $isi);
        $isi = "        <div class='row'>\n";
        fwrite($file, $isi);
        $isi = "            <div class='col-6'>\n";
        fwrite($file, $isi);
        $isi = "                <div class='card'>\n";
        fwrite($file, $isi);
        $isi = "                    <div class='card-header'>\n";
        fwrite($file, $isi);
        $isi = "                        <div>Form Edit " . $page . "</div>\n";
        fwrite($file, $isi);
        $isi = "                    </div>\n";
        fwrite($file, $isi);
        $isi = "                    <div class='card-form'>\n";
        fwrite($file, $isi);
        $isi = "                        <div class='form-grup'>\n";
        fwrite($file, $isi);
        $isi = "                            <label for='nama'>Nama</label>\n";
        fwrite($file, $isi);
        $isi = "                            <input class='form-control' id='nama' name='nama' placeholder='Nama' autocomplete='off' autofocus>\n";
        fwrite($file, $isi);
        $isi = "                        </div>\n";
        fwrite($file, $isi);
        $isi = "                        <div class='form-button'>\n";
        fwrite($file, $isi);
        $isi = "                            <input type='hidden' id='__method' name='__method' value='PATCH'>\n";
        fwrite($file, $isi);
        $isi = "                            <input type='hidden' id='id' name='id' value='{" . "" . "$" . "" . "id}'>\n";
        fwrite($file, $isi);
        $isi = "                            <button class='btn btn-primary'><span id='btnSubmit'>Simpan</span></button>\n";
        fwrite($file, $isi);
        $isi = "                        </div>\n";
        fwrite($file, $isi);
        $isi = "                    </div>\n";
        fwrite($file, $isi);
        $isi = "                </div>\n";
        fwrite($file, $isi);
        $isi = "            </div>\n";
        fwrite($file, $isi);
        $isi = "        </div>\n";
        fwrite($file, $isi);
        $isi = "    </div>\n";
        fwrite($file, $isi);
        $isi = "</form>\n";
        fwrite($file, $isi);

        $isi = "{/block}\n\n";
        fwrite($file, $isi);
        $isi = "{block js}\n";
        fwrite($file, $isi);
        $isi = "<script>\n";
        fwrite($file, $isi);
        $isi = "let formInput = el('#formInput');\n";
        fwrite($file, $isi);
        $isi = "formInput.addEventListener('submit', (e)=>{\n";
        fwrite($file, $isi);
        $isi = "    e.preventDefault();\n\n";
        fwrite($file, $isi);
        $isi = "    let val = validasi({\n";
        fwrite($file, $isi);
        $isi = "        formID: 'formInput',\n";
        fwrite($file, $isi);
        $isi = "        validate: [\n";
        fwrite($file, $isi);
        $isi = "        'nama|setText'\n";
        fwrite($file, $isi);
        $isi = "        ],\n";
        fwrite($file, $isi);
        $isi = "    });\n\n";
        fwrite($file, $isi);
        $isi = "    if(val){\n";
        fwrite($file, $isi);
        $isi = "        submitForm({\n";
        fwrite($file, $isi);
        $isi = "            formID: 'formInput',\n";
        fwrite($file, $isi);
        $isi = "            loadingLabel: 'Menyimpan..',\n";
        fwrite($file, $isi);
        $isi = "            tabel: '" . $page . "',\n";
        fwrite($file, $isi);
        $isi = "            labelButton: 'Simpan',\n";
        fwrite($file, $isi);
        $isi = "            messageSuccess: '" . ucfirst($page) . " telah diupdate',\n";
        fwrite($file, $isi);
        $isi = "            focus: 'nama'\n";
        fwrite($file, $isi);
        $isi = "        });\n\n";
        fwrite($file, $isi);
        $isi = "    }\n";
        fwrite($file, $isi);
        $isi = "});\n";
        fwrite($file, $isi);
        $isi = "</script>\n";
        fwrite($file, $isi);
        $isi = "{/block}\n";
        fwrite($file, $isi);
        echo "\e[0;36mLokasi Template:\e[0m templates/page/" . explode("/../../../../templates/page/", $folder)[1] . "/edit.latte \n";
    }

    protected static function releaseFileRead(string $folder): void
    {
        $file = fopen($folder . "/read.latte", 'w') or die("Tidak Dapat Membuka File");
        $page = explode('/page/', $folder)[1];

        $isi = "{layout '../../main.latte'}\n";
        fwrite($file, $isi);
        $isi = "{block title}" . "" . "{" . "" . "$" . "" . "title}{/block}\n\n";
        fwrite($file, $isi);
        $isi = "{block content}\n";
        fwrite($file, $isi);

        $isi = "<form id='formInput' name='formInput' method='post'>\n";
        fwrite($file, $isi);
        $isi = "    <div class='page'>\n";
        fwrite($file, $isi);
        $isi = "        <div class='page-header'>\n";
        fwrite($file, $isi);
        $isi = "            <div class='page-info'>\n";
        fwrite($file, $isi);
        $isi = "                <div class='display-6'>{" . "" . "$" . "" . "title}</div>\n";
        fwrite($file, $isi);
        $isi = "                <div class='breadcrumb'>\n";
        fwrite($file, $isi);
        $isi = "                    <ul>\n";
        fwrite($file, $isi);
        $isi = "                        <li><a href='{" . "" . "$" . "" . "url}'><i class='las la-home'></i></a></li>\n";
        fwrite($file, $isi);
        $isi = "                        <li><a href='{" . "" . "$" . "" . "url}" . $page . "'>" . ucfirst($page) . "</a></li>\n";
        fwrite($file, $isi);
        $isi = "                        <li>Detail</li>\n";
        fwrite($file, $isi);
        $isi = "                    </ul>\n";
        fwrite($file, $isi);
        $isi = "                </div>\n";
        fwrite($file, $isi);
        $isi = "            </div>\n";
        fwrite($file, $isi);
        $isi = "            <div class='page-option'></div>\n";
        fwrite($file, $isi);
        $isi = "        </div>\n";
        fwrite($file, $isi);
        $isi = "        <div class='row'>\n";
        fwrite($file, $isi);
        $isi = "            <div class='col-6'>\n";
        fwrite($file, $isi);
        $isi = "                <div class='card'>\n";
        fwrite($file, $isi);
        $isi = "                    <div class='card-body'>\n";
        fwrite($file, $isi);
        $isi = "                        Detail " . $page . "\n";
        fwrite($file, $isi);
        $isi = "                    </div>\n";
        fwrite($file, $isi);
        $isi = "                </div>\n";
        fwrite($file, $isi);
        $isi = "            </div>\n";
        fwrite($file, $isi);
        $isi = "        </div>\n";
        fwrite($file, $isi);
        $isi = "    </div>\n";
        fwrite($file, $isi);
        $isi = "</form>\n";
        fwrite($file, $isi);

        $isi = "{/block}\n\n";
        fwrite($file, $isi);
        $isi = "{block js}{/block}\n";
        fwrite($file, $isi);
        echo "\e[0;36mLokasi Template:\e[0m templates/page/" . explode("/../../../../templates/page/", $folder)[1] . "/read.latte \n\n";
    }
}
