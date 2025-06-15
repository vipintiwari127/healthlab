<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallCenterEnquiry extends Model
{
   // app/Models/CallCenterEnquiry.php
protected $fillable = [
    'prefix', 'name', 'age', 'gender', 'email', 'phone', 'address',
    'remark', 'lab_partner', 'test_package', 'medicine'
];

}
