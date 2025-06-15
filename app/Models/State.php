<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'id',          // ✅ Add this if you're using updateOrCreate with 'id'
        'countryName',
        'stateName',
        'stateCode',
        'stateUrl',
        'aboutState',
        'stateCode',
    ];
}
