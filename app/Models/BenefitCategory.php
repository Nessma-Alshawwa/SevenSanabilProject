<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BenefitCategory extends Model
{
    use HasFactory, SoftDeletes;

    public function BenefitRequests(){ // 1 - M relationship (Many)
        return $this->belongsTo(BenefitRequest::class, 'benefit_request_id');
    }
    public function Categories(){ // 1 - M relationship (Many)
        return $this->belongsTo(Category::class, 'category_id');
    }

}
