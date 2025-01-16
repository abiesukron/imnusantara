<?php 

namespace App\Schema;

use AbieSoft\AsetCode\Mysql\DB;
use AbieSoft\AsetCode\Mysql\Schema;
class highlight extends Schema 
{

    public function buattabel()
    {
        $schema = new Schema;
        $schema->teks("judul");
        $schema->teks("link");
        $schema->angka("diklik");
        $schema->tanggal("expire");
        $schema->enum(nama:"status", data:["Aktif","Tidak"]);
        $sql = $schema->create('highlight');
        DB::terhubung()->query($sql);
        $this->buatdata();
    }

    public function buatdata()
    {
        /*
            DB::terhubung()->input('highlight', [
                'nama' => '',
            ]);
        */
    }
}
$create = new highlight();
$create->buattabel();
