<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 200; $i++) {
            \App\Models\Product::create([
                'name' => '製品' . $i,
                'price' => rand(10, 200) * 10,
            ]);            
        }
    }
}
