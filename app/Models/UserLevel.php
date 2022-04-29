<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class UserLevel extends Model
{
    use HasFactory;

    public function User(){ // 1 - M relationship (one)
        return $this->hasMany(User::class);
    }

    public function Role(){ // 1 - M relationship (one)
        return $this->hasMany(Role::class);
    }
    public function Permission(){ // 1 - M relationship (one)
        return $this->hasMany(Permission::class);
    }
}
