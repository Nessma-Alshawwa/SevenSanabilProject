<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\DonationRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\DonationCategory;
use App\Models\Donor;
use App\Models\QuantitiesSpent;

class DonationRequestController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:View Donation Requests', ['only' => ['index']]);
        $this->middleware('permission:Select Category to Donation Request', ['only' => ['add_category']]);
        $this->middleware('permission:Edit Status of Donation Request', ['only' => ['edit_status']]);
        $this->middleware('permission:Approve Donation Request', ['only' => ['approve']]);
        $this->middleware('permission:Reject Donation Request', ['only' => ['reject']]);
    }

    public function index(){
        $i = 1;
        $DonationRequests = DonationRequest::with('DonationCategory')->with('DonationCategory.Categories')->get();
        $Donors = Donor::all();
        $Categories = Category::all();
        return view('dashboard.donation_request.index', ['title'=> '/طلبات التبرع', 'DonationRequests'=> $DonationRequests,'Donors'=>$Donors, 'Categories'=> $Categories ,'i'=>$i]);
    }

    public function add_category(Request $request, $id){
        $DonationRequests = DonationRequest::with('DonationCategory')->with('DonationCategory.Categories')->findOrFail($id);

        if ($request['category']){
            $DonationRequests->status = 1; // تمت الموافقة
        }
        $category = $request['category'];
        $DonationCategory = new DonationCategory();
        $DonationCategory->donation_request_id = $id;
        $DonationCategory->category_id = $category;
        $result = $DonationCategory->save();
        $DonationRequests->save();
        return redirect('/dashboard/donation_request')->with('add_status', $result);
        
    }

    public function edit_status(Request $request, $id){
        $DonationRequest = DonationRequest::withTrashed()->findOrFail($id);
        $status = $request['status'];
        $DonationRequest->status = $status;
        $result = $DonationRequest->save();

        return redirect('/dashboard/donation_request')->with('add_status', $result);
        
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
