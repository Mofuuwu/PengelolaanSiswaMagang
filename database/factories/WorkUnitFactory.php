<?php

namespace Database\Factories;

use App\Models\PlacementLocation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkUnit>
 */
class WorkUnitFactory extends Factory
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
            'name' => $this->faker->unique()->randomElement([
                'LPM3',
                'Unit 1',
                'Unit 2',
                'Unit 3'
            ]),
            'leader' => $this->faker->name(),
            'placementLocation_id' => PlacementLocation::inRandomOrder()->first()->id

        ];
    }
}
