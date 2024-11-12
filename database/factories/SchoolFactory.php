<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\School>
 */
class SchoolFactory extends Factory
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
            'name' => $this->faker->randomElement([
                'SMK Negeri 1 Purwokerto',
                'SMK Negeri 2 Purwokerto',
                'SMK Negeri 3 Purwokerto',
                'SMK Negeri 4 Purwokerto',
                'SMK Negeri 1 Bukateja',
                'SMK Negeri 2 Bukateja',
                'SMK Wiworotomo Purwokerto',
                'SMK CBM Purwokerto',
                'SMK DIponegoro 3 Kedungbanteng',
            ]),
            'address' => $this->faker->randomElement([
                'Jl. Raya Malioboro',
                'Jl. Pegangsaan Timur',
                'Jl. Raya Kedungbanteng',
                'Jl. Raya Watumas',
                'Jl. Raya Kalibagor',
                'Jl. Raya Sokaraja',
                'Jl. Raya Cilacap'
            ]), 
            'responsiblePerson' => $this->faker->name()
        ];
    }
}
