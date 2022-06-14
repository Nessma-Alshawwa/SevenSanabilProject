<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\BenefitRequest;
use App\Models\Category;
use App\Models\DonationRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::paginate(3);
        $BenefitRequests = BenefitRequest::with('BenefitCategory')->paginate(3);
        $DonationRequests = DonationRequest::with('DonationCategory')->paginate(3);
        return view('Website.Home', ['categories' => $categories, 'BenefitRequests'=> $BenefitRequests, 'DonationRequests'=> $DonationRequests]);
    }
}
