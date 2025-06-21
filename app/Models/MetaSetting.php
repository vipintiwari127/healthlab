<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'default_meta_title',
        'meta_keyword',
        'meta_description',
        'extra_meta'
    ];

    
}
