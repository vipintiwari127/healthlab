<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

     protected $fillable = [
        'title',
        'image',
        'announcement_message',
        'display_announcement',
        'status',
    ];

}
