<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommitteesUser extends Model
{
    use HasFactory, SoftDeletes;

    public function User(){ // 1 - 1 relationship (table with foreign key)
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Committee(){ // 1 - M relationship (Many)
        return $this->belongsTo(Committee::class, 'committee_id');
    }

}
