<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
          'name',
        'phone',
        'ProfilePhoto',           // File upload
        'Qualification',
        'YearsofExperience',
        'languages',              // Store as JSON or comma-separated string
        'email',
        'gender',
        'zip',
        'DateofBirth',
        'City',
        'address',
        'specialization',
        'status',
    ];
}
