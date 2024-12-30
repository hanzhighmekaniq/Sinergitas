<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $fillable = [
        'nama',
        'id_judul',
    ];

    public function judul()
    {
        return $this->belongsTo(Judul::class, 'id_judul');
    }
    public function konten()
    {
        return $this->hasMany(Konten::class, 'id_kategori');
    }
}
