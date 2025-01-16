<?php

namespace App\Schema;

use AbieSoft\AsetCode\Mysql\DB;
use AbieSoft\AsetCode\Mysql\Schema;

class grup extends Schema
{

    public function buattabel()
    {
        $schema = new Schema;
        $schema->teks("nama");
        $sql = $schema->create('grup');
        DB::terhubung()->query($sql);
        $this->buatdata();
    }

    public function buatdata()
    {
        DB::terhubung()->input('grup', [
            'id' => 1,
            'nama' => 'Administrator',
            'dibuat' => '2024-06-07 23:05:45',
        ]);

        DB::terhubung()->input('grup', [
            'id' => 2,
            'nama' => 'Penulis',
            'dibuat' => '2024-06-07 23:06:07',
        ]);

        DB::terhubung()->input('grup', [
            'id' => 3,
            'nama' => 'Editor',
            'dibuat' => '2024-06-07 23:06:07',
        ]);

        DB::terhubung()->input('grup', [
            'id' => 4,
            'nama' => 'Bagian Keuangan',
            'dibuat' => '2024-06-07 23:06:07',
        ]);

        DB::terhubung()->input('grup', [
            'id' => 5,
            'nama' => 'Pimpinan Redaksi',
            'dibuat' => '2024-06-07 23:06:07',
        ]);
    }
}
$create = new grup();
$create->buattabel();
