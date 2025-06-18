<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
     protected $fillable = [
        'name',
        'package_category',
        'partner',
        'included_tests',
        'actual_price',
        'net_price',
        'offer_price',
        'total_parameters',
        'reporting_time',
        'specimen_requirement',
        'service_type',
        'thumbnail',
        'description',
        'status',
    ];
}
