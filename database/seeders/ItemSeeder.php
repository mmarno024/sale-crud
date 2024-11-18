<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 25; $i++) {
            DB::table('master_items')->insert([
                'code' => 'ITEM' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'name' => 'Item ' . $i,
                'description' => 'Deskripsi untuk item ' . $i,
                'price' => rand(1000, 10000),
                'stock' => rand(1, 100),
                'image' => 'uploads/items/item' . $i . '.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
