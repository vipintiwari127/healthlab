<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;

     protected $fillable = [
        'website_image',
        'site_name',
        'search_distance',
        'primary_phone',
        'alternative_phone',
        'website_email',
        'booking_email',
        'contact_email',
        'bussiness_address_1',
        'copyright_context',
        'footer_about_company',
        'slider_image',
        'slider_title',
        'button_name',
        'slider_link',
    ];

    protected $casts = [
        'slider_image' => 'array',
        'slider_title' => 'array',
        'button_name' => 'array',
        'slider_link' => 'array',
    ];
    
}
