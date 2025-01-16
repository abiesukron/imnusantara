<?php

namespace App\Schema;

use AbieSoft\AsetCode\Mysql\DB;
use AbieSoft\AsetCode\Mysql\Schema;

class log extends Schema
{

    public function buattabel()
    {
        $schema = new Schema;
        $schema->teks("email");
        $schema->paragrap("kode");
        $schema->teks("login");
        $schema->teks("logout");
        $schema->teks("device");
        $sql = $schema->create('log');
        DB::terhubung()->query($sql);
        $this->buatdata();
    }

    public function buatdata()
    {
        /*
            DB::terhubung()->input('log', [
                'nama' => '',
            ]);
        */
    }
}
$create = new log();
$create->buattabel();
