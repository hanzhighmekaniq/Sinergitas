<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Judul>
 */
class JudulFactory extends Factory
{
    public function definition()
    {
        return [
            // 'nama' => $this->faker->words(3, true), // Nama terdiri dari 3 kata
            'nama' => $this->faker->word(), // Nama terdiri dari 3 kata
        ];
    }
}
