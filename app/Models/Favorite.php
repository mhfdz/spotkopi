<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    // Mengizinkan kolom ini diisi oleh sistem
    protected $fillable = ['user_id', 'cafe_id'];

    // Relasi balik: 1 data favorit mencatat 1 Cafe
    public function cafe()
    {
        return $this->belongsTo(Cafe::class);
    }
}