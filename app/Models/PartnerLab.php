<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerLab extends Model
{
    use HasFactory;

     protected $fillable = [
        'name', 'url', 'website_link', 'email', 'mobile', 'contact_person', 'contact_person_number',
        'cc', 'bcc', 'ambulance_service', 'state_id', 'city_id', 'pincode', 'address', 'services',
        'certification', 'ultrasound_time', 'offday', 'lab_timing', 'sunday_lab_timing', 'payment_mode',
        'description', 'trust_matter', 'logo', 'document', 'lab_photos'
    ];
    
    public function city()
{
    return $this->belongsTo(City::class, 'city_id', 'id');
}
}
