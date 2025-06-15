<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'id',          // ✅ Add this if you're using updateOrCreate with 'id'
        'city_countryName',
        'city_stateName',
        'cityUrl',
        'city_name',
        'city_about',
        'status',
    ];
}
