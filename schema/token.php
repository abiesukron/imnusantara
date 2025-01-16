<?php

namespace App\Schema;

use AbieSoft\AsetCode\Mysql\DB;
use AbieSoft\AsetCode\Mysql\Schema;

class token extends Schema
{

    public function buattabel()
    {
        $schema = new Schema;
        $schema->teks("uid");
        $schema->teks("token");
        $sql = $schema->create('token');
        DB::terhubung()->query($sql);
        $this->buatdata();
    }

    public function buatdata()
    {
        /*
            DB::terhubung()->input('token', [
                'nama' => '',
            ]);
        */
    }
}
$create = new token();
$create->buattabel();
