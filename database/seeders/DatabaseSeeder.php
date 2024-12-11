<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\Sector;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\vacancy;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        Location::factory(5)->create();
//        User::factory(5)->create();
//        Sector::factory(10)->create();
        Vacancy::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
    }
}
