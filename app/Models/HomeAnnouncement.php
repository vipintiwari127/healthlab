<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeAnnouncement extends Model
{
    use HasFactory;

     protected $fillable = [
        'title',
        'button_name',
        'link',
        'message',
        'display_announcement',
        'display_query_form',
        'show_name_field',
        'show_email_field',
        'show_phone_field',
        'show_message_field',
    ];
    
}
