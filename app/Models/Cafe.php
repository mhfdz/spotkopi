<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cafe extends Model
{
    // ... isi $fillable yang lama ...

    // Fungsi untuk mendapatkan bobot nilai
    public static function getWeight($criteria, $value)
    {
        $map = [
            'wifi' => [
                'Ngebut' => 5, 
                'Kencang' => 4, 
                'Sedang' => 3, 
                'Lemot' => 2, 
                'Tidak Ada' => 1
            ],
            'outlet' => [
                'Sangat Banyak' => 5, 
                'Banyak' => 4, 
                'Lumayan' => 3, 
                'Cukup' => 2, 
                'Terbatas' => 1
            ],
            'noise' => [
                'Sunyi' => 3, 
                'Sedang' => 2, 
                'Bising' => 1
            ]
        ];

        // Mengembalikan nilai map, jika tidak ketemu, kembalikan 1 (default terendah)
        return $map[$criteria][$value] ?? 1;
    }
}