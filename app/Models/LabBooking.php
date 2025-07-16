<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LabBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'lab_partner_id',
        'test_id',
        'category_id',
        'lab_mrp_price',
        'lab_net_price',
        'offer_price',
        'reporting_time',
        'service_type',
        'specimen_requirement',
        'patient_name',
        'age',
        'gender',
        'pin_code',
        'address',
        'lab_time',
        'order_id',

    ];

    public function labPartner()
    {
        return $this->belongsTo(\App\Models\PartnerLab::class, 'lab_partner_id');
    }
    
}
