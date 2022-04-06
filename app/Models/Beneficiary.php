<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Beneficiary extends Model
{
    use HasFactory, SoftDeletes;
    
    public function Committee(){ // 1 - M relationship (Many)
        return $this->belongsTo(Committee::class, 'committee_id');
    }

    public function BenefitRequest(){ // 1 - M relationship (One)
        return $this->hasMany(BenefitRequest::class);
    }

    public $incrementing = false;
    public $timestamps = false;
    
}
