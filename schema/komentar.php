<?php

namespace App\Schema;

use AbieSoft\AsetCode\Mysql\DB;
use AbieSoft\AsetCode\Mysql\Schema;

class komentar extends Schema
{

    public function buattabel()
    {
        $schema = new Schema;
        $schema->angka("page");
        $schema->angka("contentid");
        $schema->paragrap("isi");
        $schema->teks("reaksi");
        $schema->angka("pelangganid");
        $sql = $schema->create('komentar');
        DB::terhubung()->query($sql);
        $this->buatdata();
    }

    public function buatdata()
    {
        /*
            DB::terhubung()->input('komentar', [
                'nama' => '',
            ]);
        */
    }
}
$create = new komentar();
$create->buattabel();
