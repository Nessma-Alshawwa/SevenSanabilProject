<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    public function BenefitCategory(){ // 1 - M relationship (One)
        return $this->hasMany(BenefitCategory::class);
    }
    public function ParentCategory(){ // 1 - M relationship (One)
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function DonationCategory(){ // 1 - M relationship (One)
        return $this->hasMany(DonationCategory::class);
    }

}
