<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plant;

class PlantSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            Plant::create([
                'name' => 'Plant ' . $i,
                'water_requirement' => rand(10, 100),      // example value in ml
                'temperature' => rand(15, 35),              // temperature in °C
                'planted_date' => now()->subDays(rand(1, 365)),
                'price' => rand(100, 5000) / 100,           // price from 1.00 to 50.00
            ]);
        }
    }
}

