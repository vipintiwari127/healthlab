<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testcategories extends Model
{
    use HasFactory;

    protected $table = 'testcategories'; // explicitly mention correct table name

    protected $fillable = [
        'test_category_name',
    ];
    public function tests()
{
    return $this->hasMany(Test::class, 'test_category');
}

}

