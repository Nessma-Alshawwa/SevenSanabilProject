<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DonationCategory extends Model
{
    use HasFactory, SoftDeletes;

    public function Categories(){ // 1 - M relationship (Many)
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function DonationRequests(){ // 1 - M relationship (Many)
        return $this->belongsTo(DonationRequest::class, 'donation_request_id');
    }
}
