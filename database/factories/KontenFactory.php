<?php

namespace Database\Factories;

use App\Models\Judul;
use App\Models\Konten;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\judulDetail>
 */
class KontenFactory extends Factory
{
    protected $model = Konten::class;

    public function definition()
    {
        return [
            // 'id_judul' => Judul::factory(), // Relasi ke Judul
            'id_kategori' => Kategori::factory(), // Relasi ke Kategori
            'nama' => $this->faker->word,
            'img' => $this->faker->imageUrl(),
            'href' => $this->faker->url,
        ];
    }
}
