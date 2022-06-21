<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BenefitRequest;
use App\Models\Beneficiary;
use App\Models\DonationRequest;
use App\Models\Donor;
use Illuminate\Support\Str;
class BenefitRequestController extends Controller
{
    public function index(){
        $BenefitRequests = BenefitRequest::with('Beneficiaries')->with('DonationRequests')->get();
        $Donors = Donor::all();
        // foreach($BenefitRequests as $BenefitRequest){
        //     return $BenefitRequest;
        // }
        return view('dashboard.benefit_request.index', ['title'=> '/طلبات الاستفادة', 'BenefitRequests'=> $BenefitRequests, 'Donors' => $Donors]);
    }
    
    public function add_quantity(Request $request, $id){
        $BenefitRequest = BenefitRequest::with('Beneficiaries')->with('DonationRequests')->withTrashed()->findOrFail($id);
        $quantity = $request['quantity'];

        if ($BenefitRequest->DonationRequests->available_quantity >= $quantity){
            $BenefitRequest->amount_spent = $quantity;
            $BenefitRequest->remaining_quantity = $BenefitRequest->required_quantity - $BenefitRequest->amount_spent;
            $donation_request_id = $BenefitRequest->donation_request_id;
            $donation_request = DonationRequest::findOrFail($donation_request_id);

            $donation_request->available_quantity = $donation_request->available_quantity - $BenefitRequest->amount_spent;
            $donation_request->save();
            $BenefitRequest->status = 3; // بانتظار التسليم
        }
        $result = $BenefitRequest->save();

        return redirect('/dashboard/benefit_request')->with('add_status', $result);
        
    }
    public function edit_status(Request $request, $id){
        $BenefitRequest = BenefitRequest::with('Beneficiaries')->with('DonationRequests')->withTrashed()->findOrFail($id);
        $status = $request['status'];
        $BenefitRequest->status = $status;
        
        if ($BenefitRequest->status == 2) {
            $BenefitRequest->amount_spent = 0;
            $BenefitRequest->remaining_quantity = $BenefitRequest->required_quantity;
        }

        $result = $BenefitRequest->save();

        return redirect('/dashboard/benefit_request')->with('add_status', $result);
        
    }
    public function approve($id) {
        BenefitRequest::withTrashed()->where('id', $id)->update(['status' => 1]);
        return response()->json([
            'success'=> true,
        ]);
    }

    public function reject($id) {
        BenefitRequest::withTrashed()->where('id', $id)->update(['status' => 0]);
        return response()->json([
            'success'=> true,
        ]);
    }
}
