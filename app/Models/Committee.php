<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Committee extends Model
{
    use HasFactory, SoftDeletes;

    public function CommitteeUsers(){ // 1 - M relationship (One)
        return $this->hasMany(CommitteeUser::class);
    }

    public function Donors(){ // 1 - M relationship (One)
        return $this->hasMany(Donor::class);
    }

    public function Beneficiaries(){ // 1 - M relationship (One)
        return $this->hasMany(Beneficiary::class);
    }


}
