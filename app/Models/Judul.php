<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Judul extends Model
{
    use HasFactory;

    protected $table = 'judul';

    protected $fillable = [
        'nama',
        'detail',
    ];

    /**
     * Relasi dengan model JudulDetail
     */
    public function kategori()
    {
        return $this->hasMany(Kategori::class, 'id_judul'); // id_judul adalah kolom foreign key di tabel kategori
    }
}
