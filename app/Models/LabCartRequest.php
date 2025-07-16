<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabCartRequest extends Model
{
    protected $fillable = [
        'order_id',
        'type',
        'date',
        'time',
        'pincode',
        'address',
        'patient_name',
        'age',
        'gender',
        'lab_name',
        'lab_address',
        'lab_net_price',
        'lab_offer_price',
        'lab_report_time',
        'status'
    ];
}
