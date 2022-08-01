<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\DonationRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Committee;
use App\Models\DonationCategory;
use App\Models\Donor;
use App\Models\QuantitiesSpent;
use Illuminate\Support\Facades\Storage;

class DonationRequestController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:View Donation Requests', ['only' => ['index']]);
        $this->middleware('permission:Add new Donation', ['only' => ['DonateNow', 'DonateNowRequest']]);
        $this->middleware('permission:Select Category to Donation Request', ['only' => ['add_category']]);
        $this->middleware('permission:Edit Status of Donation Request', ['only' => ['edit_status']]);
        $this->middleware('permission:Approve Donation Request', ['only' => ['approve']]);
        $this->middleware('permission:Reject Donation Request', ['only' => ['reject']]);
    }

    public function index(){
        if(auth()->user()->user_level_id == 3){
            $donor_id = auth()->user()->donor_id;
            $DonationRequests = DonationRequest::with('DonationCategory')->with('DonationCategory.Categories')->where('donor_id', $donor_id)->get();

        }else{
            $DonationRequests = DonationRequest::with('DonationCategory')->with('DonationCategory.Categories')->get();
        }
        $i = 1;
        $Donors = Donor::all();
        $Categories = Category::all();
        // return $DonationRequests;
        return view('dashboard.donation_request.index', ['title'=> '/طلبات التبرع', 'DonationRequests'=> $DonationRequests,'Donors'=>$Donors, 'Categories'=> $Categories ,'i'=>$i]);
    }
    public function DonateNow(){
        $committees = Committee::get();
        return view('dashboard.donation_request.DonateNow', ['committees'=> $committees, 'title'=> 'إضافة تبرع عبني']);
    }
    public function DonateNowRequest(Request $request){
        $request->validate([
            'title' => 'required',
            'quantity' => 'required|numeric',
            'description' => 'required',
        ]);
        $result = '';
        $Donor = Donor::where('national_id', $request->national_id)->first();
        $donationRequest = new DonationRequest();
        if($Donor){
            $donationRequest->title = $request['title'];
            // $donationRequest->status = 2;
            $donationRequest->description = $request['description'];
            $donationRequest->quantity = $request['quantity'];
            $donationRequest->donor_id = $Donor->id;
        }else{
            $donor = new Donor();
            $donor->name = $request['name'];
            $donor->phone = $request['phone'];
            $donor->national_id = $request['national_id'];
            $donor->committee_id  = $request['committee_id'];
            $donor_result = $donor->save();

            $donor = Donor::where('national_id', $request->national_id)->first();

            $donationRequest->title = $request['title'];
            // $donationRequest->status = 2;
            $donationRequest->description = $request['description'];
            $donationRequest->quantity = $request['quantity'];
            $donationRequest->donor_id = $donor->id;
        }
        $result = $donationRequest->save();
        return redirect()->back()->with('add_status', $result);
    }
    public function approve_request(Request $request, $id){
        $DonationRequests = DonationRequest::with('DonationCategory')->with('DonationCategory.Categories')->findOrFail($id);

        // if ($request['category']){
        //     $DonationRequests->status = 1; // تمت الموافقة
        // }
        $category = $request['category'];
        $status = $request['status'];
        $quantity = $request['quantity'];
        $DonationCategory = new DonationCategory();
        $DonationCategory->donation_request_id = $id;
        $DonationCategory->category_id = $category;
        $result = $DonationCategory->save();
        $DonationRequests->status = $status;
        $DonationRequests->available_quantity = $quantity;
        $DonationRequests->save();
        return redirect('/dashboard/donation_request')->with('add_status', $result);
        
    }

    public function add_image(Request $request, $id){
        $DonationRequests = DonationRequest::with('DonationCategory')->with('DonationCategory.Categories')->findOrFail($id);

        $image = $request->file('image');
		$path = 'uploads/images/';
		$image_name = time()+rand(1, 10000000000) . '.' . $image->getClientOriginalExtension();
		Storage::disk('local')->put($path.$image_name , file_get_contents($image));
		Storage::disk('local')->exists($path.$image_name);
        $image = $path.$image_name;

        $DonationRequests->image = $image;
        $result = $DonationRequests->save();
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
