<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\School;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SchoolAdvisor>
 */
class SchoolAdvisorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->unique()->numberBetween('100000', '999999'),
            'name' => $this->faker->name(),
            'phoneNumber' => $this->faker->phoneNumber(),
            'school_id' => School::inRandomOrder()->first()->id
        ];
    }
}
