<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Committee extends Model
{
    use HasFactory,HasRoles, SoftDeletes;

    public function Donors(){ // 1 - M relationship (One)
        return $this->hasMany(Donor::class);
    }

    public function Beneficiaries(){ // 1 - M relationship (One)
        return $this->hasMany(Beneficiary::class);
    }

    public function User(){ // 1 - M relationship (one)
        return $this->hasMany(User::class);
    }

    public function Role(){ // 1 - M relationship (one)
        return $this->hasMany(Role::class);
    }


}
