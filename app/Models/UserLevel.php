<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLevel extends Model
{
    use HasFactory;

    public function User(){ // 1 - 1 relationship
        return $this->hasOne(User::class);
    }
}
