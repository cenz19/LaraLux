<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
//        City Hotel, Residential Hotel, dan Motel
        $type = [
            [
                'hotel_type_name' => 'City Hotel',
                'created_at' => now(),
                'updated_at' => now(),],[
                'hotel_type_name' => 'Residential Hotel',
                'created_at' => now(),
                'updated_at' => now(),],[
                'hotel_type_name' => 'Motel',
                'created_at' => now(),
                'updated_at' => now(),],
        ];
        DB::table('hotel_types')->insert($type);
    }
}
