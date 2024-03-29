<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kandidat>
 */
class KandidatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_kandidat'=> fake()->name(),
            'periode'=> fake()->year(),
            'visi'=> fake()->text(),
            'misi'=> fake()->text(),
        ];
    }
}
