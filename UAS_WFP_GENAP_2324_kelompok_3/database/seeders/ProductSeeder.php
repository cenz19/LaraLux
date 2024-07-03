<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Products for The Grand Budapest Hotel
            [
                'product_name' => 'Orangutan Room',
                'product_type_id' => 1,
                'price' => 150000,  // 150,000 rupiah
                'hotel_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Sheep Room',
                'product_type_id' => 2,
                'price' => 200000,  // 200,000 rupiah
                'hotel_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Jasmine Room',
                'product_type_id' => 4,
                'price' => 300000,  // 300,000 rupiah
                'hotel_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Products for The Plaza Hotel
            [
                'product_name' => 'Lion Room',
                'product_type_id' => 5,
                'price' => 150000,  // 150,000 rupiah
                'hotel_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Zebra Room',
                'product_type_id' => 6,
                'price' => 200000,  // 200,000 rupiah
                'hotel_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Giraffe Room',
                'product_type_id' => 7,
                'price' => 250000,  // 250,000 rupiah
                'hotel_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Products for Hotel California
            [
                'product_name' => 'Snail Room',
                'product_type_id' => 3,
                'price' => 180000,  // 180,000 rupiah
                'hotel_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Rhinoceros Room',
                'product_type_id' => 1,
                'price' => 150000,  // 150,000 rupiah
                'hotel_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Bull Room',
                'product_type_id' => 4,
                'price' => 280000,  // 280,000 rupiah
                'hotel_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Products for The Ritz London
            [
                'product_name' => 'Butterfly Room',
                'product_type_id' => 2,
                'price' => 220000,  // 220,000 rupiah
                'hotel_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Deer Room',
                'product_type_id' => 7,
                'price' => 300000,  // 300,000 rupiah
                'hotel_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Hippo Room',
                'product_type_id' => 5,
                'price' => 130000,  // 130,000 rupiah
                'hotel_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Products for The Beverly Hills Motel
            [
                'product_name' => 'Scorpion Room',
                'product_type_id' => 1,
                'price' => 120000,  // 120,000 rupiah
                'hotel_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Shark Room',
                'product_type_id' => 6,
                'price' => 150000,  // 150,000 rupiah
                'hotel_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Monkey Room',
                'product_type_id' => 3,
                'price' => 180000,  // 180,000 rupiah
                'hotel_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('products')->insert($products);
    }
}
