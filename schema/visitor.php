<?php 

namespace App\Schema;

use AbieSoft\AsetCode\Mysql\DB;
use AbieSoft\AsetCode\Mysql\Schema;
class visitor extends Schema 
{

    public function buattabel()
    {
        $schema = new Schema;
        $schema->teks("model");
        $schema->teks("kontenid");
        $schema->teks("device");
        $schema->teks("ip");
        $schema->tanggal("tglvisit");
        $sql = $schema->create('visitor');
        DB::terhubung()->query($sql);
        $this->buatdata();
    }

    public function buatdata()
    {
        /*
            DB::terhubung()->input('visitor', [
                'nama' => '',
            ]);
        */
    }
}
$create = new visitor();
$create->buattabel();
