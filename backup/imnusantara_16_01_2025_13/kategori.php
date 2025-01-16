<?php 

namespace App\Schema;

use AbieSoft\AsetCode\Mysql\DB;
use AbieSoft\AsetCode\Mysql\Schema;
class kategori extends Schema 
{

    public function buattabel()
    {
        $schema = new Schema;
        $schema->teks(nama:'nama');
        $sql = $schema->create('kategori');
        DB::terhubung()->query($sql);
        $this->buatdata();
    }

    public function buatdata()
    {
        
        DB::terhubung()->input('kategori', [
            'id' => 1,
            'nama' => 'Nasional',
            'dibuat' => '2025-01-16 13:42:22',
        ]);
        
        DB::terhubung()->input('kategori', [
            'id' => 2,
            'nama' => 'Institusi',
            'dibuat' => '2025-01-16 13:42:22',
        ]);
        
        DB::terhubung()->input('kategori', [
            'id' => 3,
            'nama' => 'Kriminal',
            'dibuat' => '2025-01-16 13:42:22',
        ]);
        
        DB::terhubung()->input('kategori', [
            'id' => 4,
            'nama' => 'Politik',
            'dibuat' => '2025-01-16 13:42:22',
        ]);
        
        DB::terhubung()->input('kategori', [
            'id' => 5,
            'nama' => 'Kata Warga',
            'dibuat' => '2025-01-16 13:42:22',
        ]);
        
        DB::terhubung()->input('kategori', [
            'id' => 6,
            'nama' => 'Olah Raga',
            'dibuat' => '2025-01-16 13:42:22',
        ]);
        
        DB::terhubung()->input('kategori', [
            'id' => 7,
            'nama' => 'Edukasi',
            'dibuat' => '2025-01-16 13:42:22',
        ]);
        
        DB::terhubung()->input('kategori', [
            'id' => 8,
            'nama' => 'Bisnis',
            'dibuat' => '2025-01-16 13:42:22',
        ]);
        
        DB::terhubung()->input('kategori', [
            'id' => 9,
            'nama' => 'Lintas Berita',
            'dibuat' => '2025-01-16 13:42:22',
        ]);
        
        DB::terhubung()->input('kategori', [
            'id' => 10,
            'nama' => 'Internasional',
            'dibuat' => '2025-01-16 13:42:22',
        ]);
    }
}
$create = new kategori();
$create->buattabel();
