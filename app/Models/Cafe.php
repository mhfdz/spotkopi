<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cafe extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'jam_operasional',
        'wifi',
        'colokan',
        'kebisingan',
        'ac',
        'price_min',
        'price_max',
        'payment_method',
        'maps_url',
        'foto_url',
    ];

    public static function getWeight($criteria, $value)
    {
        $map = [
            'wifi' => [
                'No Wifi' => 1,
                'Lemot'   => 2,
                'Sedeng'  => 3,
                'Kenceng' => 4,
            ],
            'colokan' => [
                'Terbatas' => 1,
                'Banyak'   => 3,
            ],
            'kebisingan' => [
                'Ramai'  => 1,   // Di seeder tertulis 'Ramai', bukan 'Bising'
                'Sedang' => 2,
                'Sunyi'  => 3,
            ],
        ];

        return $map[$criteria][$value] ?? 1;
    }
}