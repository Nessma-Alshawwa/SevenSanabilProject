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
    public function approve($id) {
        DonationRequest::withTrashed()->where('id', $id)->update(['status' => 1]);
        return response()->json([
            'success'=> true,
        ]);
    }

    public function shipping($id) {
        DonationRequest::withTrashed()->where('id', $id)->update(['status' => 3]);
        return response()->json([
            'success'=> true,
        ]);
    }

    public function delivery($id) {
        DonationRequest::withTrashed()->where('id', $id)->update(['status' => 4]);
        return response()->json([
            'success'=> true,
        ]);
    }

    public function reject($id) {
        DonationRequest::withTrashed()->where('id', $id)->update(['status' => 0]);
        return response()->json([
            'success'=> true,
        ]);
    }
}
