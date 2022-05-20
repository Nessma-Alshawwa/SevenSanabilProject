<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuantitiesSpent extends Model
{
    public $table = 'quantities_spent';

    use HasFactory, SoftDeletes;
    public function DonationRequests(){ // 1 - M relationship (Many)
        return $this->belongsTo(DonationRequest::class,'donation_request_id');
    }
    public function BenefitRequests(){ // 1 - M relationship (Many)
        return $this->belongsTo(BenefitRequest::class,'benifit_request_id');
    }
}
