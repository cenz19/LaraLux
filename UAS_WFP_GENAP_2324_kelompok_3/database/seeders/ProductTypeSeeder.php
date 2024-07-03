<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        standar, deluxe, superior, suite, single
//room, double room, family room
        $type = [
            [
                'product_type_name' => 'standard',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_type_name' => 'deluxe',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_type_name' => 'superior',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_type_name' => 'suite',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_type_name' => 'single room',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_type_name' => 'double room',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_type_name' => 'family room',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('product_types')->insert($type);
    }
}
