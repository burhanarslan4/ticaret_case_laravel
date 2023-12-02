<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Kullanıcı Adı',
            'email' => 'kullanici@mail.com',
            'password' => Hash::make('sifre123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Diğer örnek kullanıcıları buraya ekleyebilirsiniz.
    }
}
