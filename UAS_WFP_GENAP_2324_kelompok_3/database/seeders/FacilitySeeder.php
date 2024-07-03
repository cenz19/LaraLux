<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $facilities = [
            // Facilities for Standard Room
            [
                'facility_name' => 'WiFi',
                'description' => 'Free high-speed internet access.',
                'product_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Air Conditioning',
                'description' => 'Individual climate control.',
                'product_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Television',
                'description' => 'Flat screen TV with cable channels.',
                'product_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Facilities for Deluxe Room
            [
                'facility_name' => 'WiFi',
                'description' => 'Free high-speed internet access.',
                'product_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Air Conditioning',
                'description' => 'Individual climate control.',
                'product_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Mini Bar',
                'description' => 'Stocked mini bar with beverages and snacks.',
                'product_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Facilities for Suite Room
            [
                'facility_name' => 'WiFi',
                'description' => 'Free high-speed internet access.',
                'product_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Air Conditioning',
                'description' => 'Individual climate control.',
                'product_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Jacuzzi',
                'description' => 'Private jacuzzi tub.',
                'product_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'facility_name' => 'WiFi',
                'description' => 'Free high-speed internet access.',
                'product_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Air Conditioning',
                'description' => 'Individual climate control.',
                'product_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Work Desk',
                'description' => 'Spacious work desk for business travelers.',
                'product_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Room Service',
                'description' => '24-hour room service available.',
                'product_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Mini Fridge',
                'description' => 'Stocked mini fridge with beverages.',
                'product_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'In-Room Safe',
                'description' => 'Secure in-room safe for valuables.',
                'product_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Facilities for product_id 5
            [
                'facility_name' => 'WiFi',
                'description' => 'Free high-speed internet access.',
                'product_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Air Conditioning',
                'description' => 'Individual climate control.',
                'product_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Fitness Center',
                'description' => 'Fully equipped fitness center with personal trainers.',
                'product_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Spa Services',
                'description' => 'Luxurious spa services including massages and beauty treatments.',
                'product_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Business Center',
                'description' => '24-hour business center with conference rooms and printing services.',
                'product_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Concierge Service',
                'description' => 'Personalized concierge service for dining reservations and local recommendations.',
                'product_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Facilities for product_id 6
            [
                'facility_name' => 'WiFi',
                'description' => 'Free high-speed internet access.',
                'product_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Air Conditioning',
                'description' => 'Individual climate control.',
                'product_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Swimming Pool',
                'description' => 'Outdoor swimming pool with sun loungers.',
                'product_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Poolside Bar',
                'description' => 'Refreshing drinks and snacks served poolside.',
                'product_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Kids Club',
                'description' => 'Supervised activities and games for children.',
                'product_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Tennis Court',
                'description' => 'Outdoor tennis courts with equipment rental available.',
                'product_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Facilities for product_id 7
            [
                'facility_name' => 'WiFi',
                'description' => 'Free high-speed internet access.',
                'product_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Air Conditioning',
                'description' => 'Individual climate control.',
                'product_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Gourmet Dining',
                'description' => 'Fine dining restaurants offering international cuisine.',
                'product_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Cinema Room',
                'description' => 'Private cinema room for movie screenings.',
                'product_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Lounge Bar',
                'description' => 'Elegant lounge bar serving cocktails and beverages.',
                'product_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Library',
                'description' => 'Quiet library with a collection of books and magazines.',
                'product_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Facilities for product_id 8
            [
                'facility_name' => 'WiFi',
                'description' => 'Free high-speed internet access.',
                'product_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Air Conditioning',
                'description' => 'Individual climate control.',
                'product_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Pet Friendly',
                'description' => 'Pet-friendly accommodations with special amenities for pets.',
                'product_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Bicycle Rental',
                'description' => 'Bicycle rental service for exploring the area.',
                'product_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Hiking Trails',
                'description' => 'Scenic hiking trails with guided tours available.',
                'product_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Fireplace',
                'description' => 'Cozy fireplace in select rooms.',
                'product_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Facilities for product_id 9
            [
                'facility_name' => 'WiFi',
                'description' => 'Free high-speed internet access.',
                'product_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Air Conditioning',
                'description' => 'Individual climate control.',
                'product_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Private Beach',
                'description' => 'Exclusive access to a private beach area.',
                'product_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Water Sports',
                'description' => 'Water sports activities such as snorkeling and jet skiing.',
                'product_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Golf Course',
                'description' => 'Championship golf course with professional lessons.',
                'product_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Spacious Balcony',
                'description' => 'Private balcony with panoramic views.',
                'product_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Facilities for product_id 10
            [
                'facility_name' => 'WiFi',
                'description' => 'Free high-speed internet access.',
                'product_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Air Conditioning',
                'description' => 'Individual climate control.',
                'product_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Ski Resort Access',
                'description' => 'Direct access to ski slopes and ski rental services.',
                'product_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Fireplace',
                'description' => 'Cozy fireplace in chalet-style rooms.',
                'product_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Hot Tub',
                'description' => 'Private hot tub with mountain views.',
                'product_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Après Ski Bar',
                'description' => 'Après ski bar serving cocktails and après ski snacks.',
                'product_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Facilities for product_id 11
            [
                'facility_name' => 'WiFi',
                'description' => 'Free high-speed internet access.',
                'product_id' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Air Conditioning',
                'description' => 'Individual climate control.',
                'product_id' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Historic Tours',
                'description' => 'Guided tours of historic landmarks.',
                'product_id' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Art Gallery',
                'description' => 'On-site art gallery showcasing local artists.',
                'product_id' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Rooftop Terrace',
                'description' => 'Panoramic rooftop terrace with city views.',
                'product_id' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Cultural Workshops',
                'description' => 'Hands-on cultural workshops and classes.',
                'product_id' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Facilities for product_id 12
            [
                'facility_name' => 'WiFi',
                'description' => 'Free high-speed internet access.',
                'product_id' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Air Conditioning',
                'description' => 'Individual climate control.',
                'product_id' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Vineyard Tours',
                'description' => 'Guided tours of the vineyards with wine tasting sessions.',
                'product_id' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Cooking Classes',
                'description' => 'Interactive cooking classes with renowned chefs.',
                'product_id' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Outdoor Dining',
                'description' => 'Al fresco dining experience overlooking the vineyards.',
                'product_id' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Wine Cellar',
                'description' => 'Private wine cellar with rare vintages.',
                'product_id' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Facilities for product_id 13
            [
                'facility_name' => 'WiFi',
                'description' => 'Free high-speed internet access.',
                'product_id' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Air Conditioning',
                'description' => 'Individual climate control.',
                'product_id' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Beachfront Access',
                'description' => 'Direct access to the sandy beach with beach services.',
                'product_id' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Waterpark',
                'description' => 'On-site waterpark with slides and wave pool.',
                'product_id' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Beach Bar',
                'description' => 'Beachfront bar serving tropical cocktails.',
                'product_id' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Sunset Cruises',
                'description' => 'Romantic sunset cruises along the coastline.',
                'product_id' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Facilities for product_id 14
            [
                'facility_name' => 'WiFi',
                'description' => 'Free high-speed internet access.',
                'product_id' => 14,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Air Conditioning',
                'description' => 'Individual climate control.',
                'product_id' => 14,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Sky Lounge',
                'description' => 'Exclusive sky lounge with panoramic city views.',
                'product_id' => 14,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Artisanal Dining',
                'description' => 'Artisanal cuisine served in an elegant dining setting.',
                'product_id' => 14,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Private Cinema',
                'description' => 'State-of-the-art private cinema for movie screenings.',
                'product_id' => 14,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Spa Retreat',
                'description' => 'Luxurious spa retreat with holistic wellness treatments.',
                'product_id' => 14,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Facilities for product_id 15
            [
                'facility_name' => 'WiFi',
                'description' => 'Free high-speed internet access.',
                'product_id' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Air Conditioning',
                'description' => 'Individual climate control.',
                'product_id' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Mountain Biking',
                'description' => 'Guided mountain biking tours through scenic trails.',
                'product_id' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Rock Climbing',
                'description' => 'Outdoor rock climbing expeditions with certified guides.',
                'product_id' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Adventure Park',
                'description' => 'Adventure park with zip lines and obstacle courses.',
                'product_id' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_name' => 'Campfire Nights',
                'description' => 'Evening campfire sessions with storytelling and marshmallow roasting.',
                'product_id' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Add more facilities for other products as needed
        ];

        DB::table('facilities')->insert($facilities);

    }
}
