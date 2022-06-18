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
        $BenefitRequests = BenefitRequest::where('status', 1)->with('BenefitCategory')->paginate(3);
        $DonationRequests = DonationRequest::where('status', 1)->with('DonationCategory')->paginate(3);
        return view('Website.Home', ['categories' => $categories, 'BenefitRequests'=> $BenefitRequests, 'DonationRequests'=> $DonationRequests]);
    }
}
