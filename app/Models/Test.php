<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $fillable = [
        'test_name',
        'test_category',
        'specimen_requirement',
        'test_description',
        'status',
        'profile_name',
        'parameter_type',
        'multi_test_name',
    ];
    // app/Models/Test.php

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
