<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\DonationRequest;
use App\Http\Controllers\Controller;

class DonationRequestController extends Controller
{
    public function index(){
        $i = 1;
        $DonationRequests = DonationRequest::get();
        return view('dashboard.donation_request.index', ['title'=> '/طلبات التبرع', 'DonationRequests'=> $DonationRequests, 'i'=>$i]);
    }
}
