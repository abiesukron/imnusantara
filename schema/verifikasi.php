<?php

namespace App\Schema;

use AbieSoft\AsetCode\Mysql\DB;
use AbieSoft\AsetCode\Mysql\Schema;

class verifikasi extends Schema
{

    public function buattabel()
    {
        $schema = new Schema;
        $schema->angka("usersid");
        $schema->teks("email");
        $schema->teks("kode");
        $sql = $schema->create('verifikasi');
        DB::terhubung()->query($sql);
        $this->buatdata();
    }

    public function buatdata()
    {
        /*
            DB::terhubung()->input('verifikasi', [
                'nama' => '',
            ]);
        */
    }
}
$create = new verifikasi();
$create->buattabel();
