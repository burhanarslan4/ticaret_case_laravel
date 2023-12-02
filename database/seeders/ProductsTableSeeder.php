<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Ürün 1',
            'price' => 29.99,
            'stock' => 100,
            'description' => 'Bu ürünün açıklaması.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

       
    }
}