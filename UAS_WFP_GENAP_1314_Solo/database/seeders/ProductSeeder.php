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
                'price' => 100.00,
                'hotel_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Sheep Room',
                'product_type_id' => 2,
                'price' => 150.00,
                'hotel_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Jasmine Room',
                'product_type_id' => 4,
                'price' => 300.00,
                'hotel_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Products for The Plaza Hotel
            [
                'product_name' => 'Lion Room',
                'product_type_id' => 5,
                'price' => 120.00,
                'hotel_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Zebra Room',
                'product_type_id' => 6,
                'price' => 170.00,
                'hotel_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Giraffe Room',
                'product_type_id' => 7,
                'price' => 250.00,
                'hotel_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Products for Hotel California
            [
                'product_name' => 'Snail Room',
                'product_type_id' => 3,
                'price' => 180.00,
                'hotel_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Rhinoceros Room',
                'product_type_id' => 1,
                'price' => 100.00,
                'hotel_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Bull Room',
                'product_type_id' => 4,
                'price' => 280.00,
                'hotel_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Products for The Ritz London
            [
                'product_name' => 'Butterfly Room',
                'product_type_id' => 2,
                'price' => 220.00,
                'hotel_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Deer Room',
                'product_type_id' => 7,
                'price' => 300.00,
                'hotel_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Hippo Room',
                'product_type_id' => 5,
                'price' => 130.00,
                'hotel_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Products for The Beverly Hills Motel
            [
                'product_name' => 'Scorpion Room',
                'product_type_id' => 1,
                'price' => 80.00,
                'hotel_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Shark Room',
                'product_type_id' => 6,
                'price' => 120.00,
                'hotel_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Monkey Room',
                'product_type_id' => 3,
                'price' => 150.00,
                'hotel_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('products')->insert($products);
    }
}
