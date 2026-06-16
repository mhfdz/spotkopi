<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cafe extends Model
{
    protected $fillable = [
        'name', 'slug', 'operating_hours', 'wifi_quality', 
        'power_outlets', 'noise_level', 'air_conditioner', 
        'price_min', 'price_max', 'payment_method', 'maps_url',
    ];
}