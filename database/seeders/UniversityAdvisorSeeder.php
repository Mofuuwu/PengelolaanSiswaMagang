<?php

namespace Database\Seeders;

use App\Models\UniversityAdvisor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UniversityAdvisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UniversityAdvisor::factory(5)->create();
    }
}
