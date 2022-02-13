<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommitteesUser extends Model
{
    use HasFactory,HasRoles, SoftDeletes;

    public function User(){ // 1 - 1 relationship (table with foreign key)
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Committee(){ // 1 - M relationship (Many)
        return $this->belongsTo(Committee::class, 'committee_id');
    }

}
