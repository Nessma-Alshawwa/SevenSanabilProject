<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BenefitRequest;
use App\Models\Beneficiary;
use Illuminate\Support\Str;
class BenefitRequestController extends Controller
{
    public function index(){
        $BenefitRequests = BenefitRequest::with('Beneficiaries')->with('DonationRequests')->get();
        return view('dashboard.benefit_request.index', ['title'=> '/طلبات الاستفادة', 'BenefitRequests'=> $BenefitRequests]);
    }
}
