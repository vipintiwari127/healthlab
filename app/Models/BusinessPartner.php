<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessPartner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'primary_email',
        'secondary_email',
        'redirect_to',
        'logo',
    ];

}
