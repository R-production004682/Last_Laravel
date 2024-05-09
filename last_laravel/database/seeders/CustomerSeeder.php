<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $dataset = [
            ['name' => '桑折怜輔'],
            ['name' => '桑折麗華'],
            ['name' => '桑折和香'],
            ['name' => '桑折智美'],
            ['name' => '桑折幸義'],
                   
        ];

        foreach ($dataset as $data) {
            \App\Models\Customer::create($data);
        }
    }
}
