<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'vincent',
                'email' => 'vincent@example.com',
                'password' => 'vincent',
                'role' => 'owner',
                'points' => 0,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'fikri',
                'email' => 'fikri@example.com',
                'password' => 'fikri',
                'role' => 'staff',
                'points' => 0,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'felix',
                'email' => 'felix@example.com',
                'password' => 'felix',
                'role' => 'pembeli',
                'points' => 0,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
