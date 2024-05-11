<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->insert([
            [
                'userType_code' => 'sl',
                'description' => 'Supplier',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'userType_code' => 'bu',
                'description' => 'Centers',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'userType_code' => 'pb',
                'description' => 'Local Shop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more user types as needed
        ]);
    }
}
