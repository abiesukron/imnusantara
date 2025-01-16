<?php

namespace App\Schema;

use AbieSoft\AsetCode\Mysql\DB;
use AbieSoft\AsetCode\Mysql\Schema;

class langganan extends Schema
{

    public function buattabel()
    {
        $schema = new Schema;
        $schema->teks("email");
        $sql = $schema->create('langganan');
        DB::terhubung()->query($sql);
        $this->buatdata();
    }

    public function buatdata()
    {
        /*
            DB::terhubung()->input('langganan', [
                'nama' => '',
            ]);
        */
    }
}
$create = new langganan();
$create->buattabel();
