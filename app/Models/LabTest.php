<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PartnerLab;
use Illuminate\Support\Str;

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
        'feature',
        'status'
    ];

    public function labPartner()
    {
        return $this->belongsTo(PartnerLab::class, 'lab_partner_id');
    }

    public function test()
    {
        return $this->belongsTo(Test::class, 'test_id');
    }

    public function partner()
    {
        return $this->belongsTo(PartnerLab::class, 'lab_partner_id');
    }
    protected static function booted()
    {
        static::creating(function ($labTest) {
            $labTest->slug = Str::slug($labTest->test_name);
        });

        static::updating(function ($labTest) {
            $labTest->slug = Str::slug($labTest->test_name);
        });
    }
//     public function partner()
// {
//     return $this->belongsTo(PartnerLab::class, 'partner_id', 'id');
// }
public function tests()
{
    return $this->belongsTo(Test::class, 'test_id');
}

}
