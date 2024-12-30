<?php

namespace Database\Factories;

use App\Models\Juduls; // Import model Judul
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Judul;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kategori>
 */
class KategoriFactory extends Factory
{
    public function definition()
    {
        return [
            'nama' => $this->faker->word(), // Nama kategori
            'id_judul' => Judul::factory(), // Relasi ke model Judul
        ];
    }
}
