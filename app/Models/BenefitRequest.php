<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BenefitRequest extends Model
{
    use HasFactory, SoftDeletes;

    public function Beneficiaries(){ // 1 - M relationship (Many)
        return $this->belongsTo(Beneficiary::class, 'beneficiary_id');
    }
    public function DonationRequests(){ // 1 - M relationship (Many)
        return $this->belongsTo(DonationRequest::class, 'donation_request_id');
    }
    public function QuantitiesSpent(){ // 1 - M relationship (One)
        return $this->hasMany(QuantitiesSpent::class);
    }
    public function BenefitCategory(){ // 1 - M relationship (One)
        return $this->hasMany(BenefitCategory::class);
    }
}
