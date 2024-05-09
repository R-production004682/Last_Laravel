<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i <= 100; $i++) {
            $product = \App\Models\Product::find(rand(1, 200));
            $count = rand(1, 10);
            $data = [
                'customer_id' => rand(1, 5),
                'product_id' => $product->id,
                'count' => $count, 
                'amount' => $product->price * $count,
            ];
            \App\Models\Order::create($data);
        }
    }
}
