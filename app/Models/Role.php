<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory,HasRoles, SoftDeletes;

    public function UserLevels(){ // 1 - M relationship (table with foreign key)(Many)
        return $this->belongsTo(UserLevel::class, 'user_level');
    }

    public function Committees(){ // 1 - M relationship (table with foreign key)(Many)
        return $this->belongsTo(Committee::class, 'committee_id');
    }
    
    public function Donors(){ // 1 - M relationship (table with foreign key)(Many)
        return $this->belongsTo(Donor::class ,'donor_id');
    }
}
