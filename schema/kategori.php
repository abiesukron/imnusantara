<?php

namespace App\Schema;

use AbieSoft\AsetCode\Mysql\DB;
use AbieSoft\AsetCode\Mysql\Schema;

class kategori extends Schema
{

    public function buattabel()
    {
        $schema = new Schema;
        $schema->teks("nama");
        $sql = $schema->create('kategori');
        DB::terhubung()->query($sql);
        $this->buatdata();
    }

    public function buatdata()
    {
        DB::terhubung()->input('kategori', [
            'id' => 1,
            'nama' => 'Nasional',
        ]);
        DB::terhubung()->input('kategori', [
            'id' => 2,
            'nama' => 'Institusi',
        ]);
        DB::terhubung()->input('kategori', [
            'id' => 3,
            'nama' => 'Kriminal',
        ]);
        DB::terhubung()->input('kategori', [
            'id' => 4,
            'nama' => 'Politik',
        ]);
        DB::terhubung()->input('kategori', [
            'id' => 5,
            'nama' => 'Kata Warga',
        ]);
        DB::terhubung()->input('kategori', [
            'id' => 6,
            'nama' => 'Olah Raga',
        ]);
        DB::terhubung()->input('kategori', [
            'id' => 7,
            'nama' => 'Edukasi',
        ]);
        DB::terhubung()->input('kategori', [
            'id' => 8,
            'nama' => 'Bisnis',
        ]);
        DB::terhubung()->input('kategori', [
            'id' => 9,
            'nama' => 'Lintas Berita',
        ]);

        DB::terhubung()->input('kategori', [
            'id' => 10,
            'nama' => 'Internasional',
        ]);
    }
}
$create = new kategori();
$create->buattabel();
