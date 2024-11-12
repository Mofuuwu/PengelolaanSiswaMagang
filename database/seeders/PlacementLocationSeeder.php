<?php

namespace Database\Seeders;

use App\Models\PlacementLocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlacementLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PlacementLocation::factory(3)->create();
    }
}
