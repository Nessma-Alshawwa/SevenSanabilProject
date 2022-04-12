<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donor extends Model
{
    use HasFactory,HasRoles, SoftDeletes;
    
    public function Committee(){ // 1 - M relationship (Many)
        return $this->belongsTo(Committee::class, 'committee_id');
    }

    public function DonationRequest(){ // 1 - M relationship (One)
        return $this->hasMany(DonationRequest::class);
    }
    public function User(){ // 1 - M relationship (one)
        return $this->hasMany(User::class);
    }

    public function Role(){ // 1 - M relationship (one)
        return $this->hasMany(Role::class);
    }
}
