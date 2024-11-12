<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlacementLocation>
 */
class PlacementLocationFactory extends Factory
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
            'name' => $this->faker->unique()->randomElement([
                'Gedung Utama',
                'Gedung Kedua',
                'Gedung Ketiga'
            ]),
            'address' => $this->faker->randomElement([
                'Jl. Raya Malioboro',
                'Jl. Pegangsaan Timur',
                'Jl. Raya Kedungbanteng',
                'Jl. Raya Watumas',
                'Jl. Raya Kalibagor',
                'Jl. Raya Sokaraja',
                'Jl. Raya Cilacap'
            ])
        ];
    }
}
