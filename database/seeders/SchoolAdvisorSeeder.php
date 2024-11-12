<?php

namespace Database\Seeders;

use App\Models\SchoolAdvisor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolAdvisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SchoolAdvisor::factory(10)->create();
    }
}
