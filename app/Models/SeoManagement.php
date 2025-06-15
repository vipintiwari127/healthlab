<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoManagement extends Model
{
    protected $fillable = [
        'target_url',
        'meta_keyword',
        'meta_description',
        'meta_title',
        'alt_tag',
        'canonical_code',
        'extra_meta',
        'status'
    ];
}
