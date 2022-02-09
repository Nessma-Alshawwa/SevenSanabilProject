<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DonationRequest extends Model
{
    use HasFactory, SoftDeletes;

    public function Donors(){ // 1 - M relationship (Many)
        return $this->belongsTo(Donor::class, 'donor_id');
    }
    public function QuntitiesSpent(){ // 1 - M relationship (One)
        return $this->hasMany(QuntitiesSpent::class);
    }
    public function DonationCategory(){ // 1 - M relationship (One)
        return $this->hasMany(DonationCategory::class);
    }
}
