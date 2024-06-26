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
                'product_name' => 'Standard Room',
                'product_type' => 'standard',
                'price' => 100.00,
                'hotel_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Deluxe Room',
                'product_type' => 'deluxe',
                'price' => 150.00,
                'hotel_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Suite Room',
                'product_type' => 'suite',
                'price' => 300.00,
                'hotel_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Products for The Plaza Hotel
            [
                'product_name' => 'Single Room',
                'product_type' => 'single',
                'price' => 120.00,
                'hotel_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Double Room',
                'product_type' => 'double',
                'price' => 170.00,
                'hotel_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Family Room',
                'product_type' => 'family',
                'price' => 250.00,
                'hotel_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Products for Hotel California
            [
                'product_name' => 'Superior Room',
                'product_type' => 'superior',
                'price' => 180.00,
                'hotel_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Standard Room',
                'product_type' => 'standard',
                'price' => 100.00,
                'hotel_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Suite Room',
                'product_type' => 'suite',
                'price' => 280.00,
                'hotel_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Products for The Ritz London
            [
                'product_name' => 'Deluxe Room',
                'product_type' => 'deluxe',
                'price' => 220.00,
                'hotel_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Family Room',
                'product_type' => 'family',
                'price' => 300.00,
                'hotel_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Single Room',
                'product_type' => 'single',
                'price' => 130.00,
                'hotel_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Products for The Beverly Hills Motel
            [
                'product_name' => 'Standard Room',
                'product_type' => 'standard',
                'price' => 80.00,
                'hotel_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Double Room',
                'product_type' => 'double',
                'price' => 120.00,
                'hotel_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Superior Room',
                'product_type' => 'superior',
                'price' => 150.00,
                'hotel_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('products')->insert($products);
    }
}
