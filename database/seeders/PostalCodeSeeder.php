<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostalCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('postal_codes')->insert([
            [
                'code' => '26100',
                'description' => 'Wennappuwa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '26700',
                'description' => 'Nainamadama',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '26500',
                'description' => 'Negombo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more user types as needed
        ]);
    }
}
