<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pemilih>
 */
class PemilihFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_pemilih' => fake()->name(),
            'no_kta' => fake()->regexify('[A-Z]{5}[0-4]{3}'),
            'jk'=> fake()->randomElement(['L', 'P']),
            'section'=> fake()->randomElement(['Brassline', 'Battery', 'Color Guard', 'Pit Instrument']),
            'jabatan_id'=> fake()->numberBetween(1,2)
        ];
    }
}
