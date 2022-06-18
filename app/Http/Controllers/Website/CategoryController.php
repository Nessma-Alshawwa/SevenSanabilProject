<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\BenefitRequest;
use App\Models\Category;
use App\Models\DonationRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::paginate(9);
        return view('Website.Category.categories', ['categories'=> $categories]);

    }

    public function show($id){
        $category = Category::findOrFail($id);
        $BenefitRequests = BenefitRequest::where('status', 1)->with('BenefitCategory')->paginate(9);
        $DonationRequests = DonationRequest::where('status', 1)->with('DonationCategory')->paginate(9);
        return view('Website.Category.categoryRequests', ['category' => $category,'BenefitRequests' => $BenefitRequests, 'DonationRequests' => $DonationRequests]);
    }
}
