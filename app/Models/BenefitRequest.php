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
    public function QuntitiesSpent(){ // 1 - M relationship (One)
        return $this->hasMany(QuntitiesSpent::class);
    }
    public function BenefitCategory(){ // 1 - M relationship (One)
        return $this->hasMany(BenefitCategory::class);
    }
}
