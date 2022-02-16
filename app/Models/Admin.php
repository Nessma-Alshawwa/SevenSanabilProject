<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory, HasRoles, SoftDeletes;

    public function User(){ // 1 - 1 relationship (table with foreign key)
        return $this->belongsTo(User::class, 'user_id');
    }
}
