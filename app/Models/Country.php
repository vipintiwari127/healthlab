<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'id',          // ✅ Add this if you're using updateOrCreate with 'id'
        'country_name',
        'country_url',
        'status',
    ];
}