<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabPartnertwo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'website_link',
        'email',
        'mobile',
        'contact_person',
        'contact_person_number',
        'cc',
        'bcc',
        'ambulance_service',
        'state_id',
        'city_id',
        'pincode',
        'address',
        'certification',
        'ultrasound_time',
        'offday',
        'lab_timing',
        'sunday_lab_timing',
        'description',
        'trust_matter',
        'logo',
        'document',
        'lab_photo',
        'location',
        'rating',
        'center_phone_number',
        'home_collection_facility',
        'home_collection_charges',
        'home_collection_number',
        'about_us',
        'home_collection_timing',
        'home_collection_sunday_timing',
        'our_branches',
        'facility',
        'services',
        'payment_mode',
        'navigation',
        'testimonial_rating',
        'testimonial_description',
        'testimonial_name',
        'testimonials_Designation',
        'info_title',
        'info_link',
        'payment_status',
    ];
}
