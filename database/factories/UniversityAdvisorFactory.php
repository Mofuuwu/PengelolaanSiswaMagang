<?php

namespace Database\Factories;

use App\Models\PlacementLocation;
use App\Models\WorkUnit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UniversityAdvisor>
 */
class UniversityAdvisorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->numberBetween('100000', '999999'),
            'name' => $this->faker->name(),
            'phoneNumber' => $this->faker->phoneNumber(),
            'unit_id' => WorkUnit::inRandomOrder()->first()->id,
            'placementLocation_id' => PlacementLocation::inRandomOrder()->first()->id
        ];
    }
}
