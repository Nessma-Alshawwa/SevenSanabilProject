<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\DonationRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Donor;

class DonationRequestController extends Controller
{
    public function index(){
        $i = 1;
        $DonationRequests = DonationRequest::get();
        $Donors = Donor::all();
        return view('dashboard.donation_request.index', ['title'=> '/طلبات التبرع', 'DonationRequests'=> $DonationRequests,'Donors'=>$Donors,'i'=>$i]);
    }

    public function add_category(Request $request, $id){
        $DonationRequest = DonationRequest::with('DonationCategory')->with('Categories')->withTrashed()->findOrFail($id);
        $category = $request['name'];
        $DonationRequest->name = $category;
        $result = $DonationRequest->save();
        return redirect('/dashboard/donation_request.index')->with('add_status', $result);
        
    }

    public function edit_status(Request $request, $id){
        $DonationRequest = DonationRequest::withTrashed()->findOrFail($id);
        $status = $request['status'];
        $DonationRequest->status = $status;
        $result = $DonationRequest->save();

        return redirect('/dashboard/donation_request.index')->with('add_status', $result);
        
    }

    public function approve($id) {
        DonationRequest::withTrashed()->where('id', $id)->update(['status' => 1]);
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
