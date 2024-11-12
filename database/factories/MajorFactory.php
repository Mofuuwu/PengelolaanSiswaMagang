<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Major>
 */
class MajorFactory extends Factory
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
                'Rekayasa Perangkat Lunak',
                'Teknik Komputer Dan Jaringan',
                'Akuntansi Dan Keuangan Lembaga',
                'Manajemen Perkantoran Dan Bisnis',
                'Pemasaran',
                'Teknik Farmasi',
                'Desain Komunikasi Visual'
            ])
        ];
    }
}
