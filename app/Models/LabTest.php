<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabTest extends Model
{
    use HasFactory;
     protected $fillable = [
        'lab_partner_id',
        'test_id',
        'category',
        'lab_mrp_price',
        'lab_net_price',
        'offer_price',
        'reporting_time',
        'specimen_requirement',
        'service_type',
        'description',
        'status'
    ];

    // public function labPartner()
    // {
    //     return $this->belongsTo(LabPartner::class, 'lab_partner_id');
    // }

    // public function test()
    // {
    //     return $this->belongsTo(Test::class, 'test_id');
    // }
}
