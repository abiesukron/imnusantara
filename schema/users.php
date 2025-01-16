<?php

namespace App\Schema;

use AbieSoft\AsetCode\Mysql\DB;
use AbieSoft\AsetCode\Mysql\Schema;

class users extends Schema
{

    public function buattabel()
    {
        $schema = new Schema;
        $schema->teks("nama");
        $schema->teks("email");
        $schema->teks("photo");
        $schema->angka("grupid");
        $schema->teks("psw");
        $schema->teks("salt");
        $sql = $schema->create('users');
        DB::terhubung()->query($sql);
        $this->buatdata();
    }

    public function buatdata()
    {
        DB::terhubung()->input('users', [
            'id' => 1,
            'nama' => 'Admin',
            'email' => 'admin@email.com',
            'photo' => 'assets/images/default.png',
            'grupid' => 1,
            'psw' => 'd57626b4db0b082d439adfeedf0da647dfe09d60360924a49b75ec5186752747',
            'salt' => '8PsU',
            'dibuat' => '2024-08-03 15:18:31',
        ]);
    }
}
$create = new users();
$create->buattabel();
