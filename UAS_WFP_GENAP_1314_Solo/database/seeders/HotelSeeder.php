<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hotels = [
            [
                'hotel_name' => 'The Grand Budapest Hotel',
                'address' => '123 Grand St, Zubrowka',
                'phone_number' => '123-456-7890',
                'email' => 'info@grandbudapesthotel.com',
                'type' => 'City Hotel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hotel_name' => 'The Plaza Hotel',
                'address' => '768 5th Ave, New York, NY',
                'phone_number' => '212-759-3000',
                'email' => 'info@theplazany.com',
                'type' => 'City Hotel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hotel_name' => 'Hotel California',
                'address' => '422 E Main St, Santa Monica, CA',
                'phone_number' => '310-395-1741',
                'email' => 'info@hotelcalifornia.com',
                'type' => 'Residential Hotel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hotel_name' => 'The Ritz London',
                'address' => '150 Piccadilly, St. James\'s, London',
                'phone_number' => '+44-20-7493-8181',
                'email' => 'info@theritzlondon.com',
                'type' => 'City Hotel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hotel_name' => 'The Beverly Hills Motel',
                'address' => '9641 Sunset Blvd, Beverly Hills, CA',
                'phone_number' => '310-276-2251',
                'email' => 'info@beverlyhillsmotel.com',
                'type' => 'Motel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('hotels')->insert($hotels);
    }
}
