<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed customers using factory
        \App\Models\Customer::factory(20)->create();

        // Call the PlantSeeder to seed plants
        $this->call([
            PlantSeeder::class,
        ]);
    }
}
