<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VisitorLog extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan (secara default Laravel akan menggunakan plural dari nama model)
    protected $table = 'visitor_logs';

    // Tentukan kolom mana yang dapat diisi secara massal (mass assignable)
    protected $fillable = [
        'ip_address',
        'user_agent',
        'visited_at',
    ];
}
