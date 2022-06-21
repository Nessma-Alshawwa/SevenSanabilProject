<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Beneficiary;
use App\Models\BenefitRequest;
use App\Models\Committee;
use App\Models\DonationRequest;
use Illuminate\Http\Request;

class BenefitController extends Controller
{
    public function index(){
        $DonationRequests = DonationRequest::where('status', 1)->where('available_quantity', '>', 0)->with('DonationCategory.Categories')->paginate(9);
        return view('Website.Benefit.benefitRequest', ['DonationRequests'=> $DonationRequests]);
    }
    public function show($id){
        $DonationRequest = DonationRequest::where('status', 1)->with('DonationCategory.Categories')->findOrFail($id);
        $committees = Committee::get();
        return view('Website.Benefit.benefitNowRequest', ['DonationRequest'=> $DonationRequest, 'committees' => $committees]);
    }
    public function benefitRequest(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'national_id' => 'required|numeric',
            'family_member' => 'required|numeric',
            'income' => 'required|numeric',
            'required_quantity' => 'required|numeric',
        ]);
        $Beneficiary = Beneficiary::where('national_id', $request->national_id)->first();
        $donationRequest = DonationRequest::findOrFail($id);
        $BenefitRequest = new BenefitRequest();
        if($Beneficiary){
            $BenefitRequest->title = $donationRequest->title;
            // $BenefitRequest->status = 2;
            $BenefitRequest->description = $donationRequest->description;
            $BenefitRequest->required_quantity = $request['required_quantity'];
            $BenefitRequest->remaining_quantity = $BenefitRequest->required_quantity;
            $BenefitRequest->amount_spent = 0;
            $BenefitRequest->beneficiary_id = $Beneficiary->id;
            $BenefitRequest->donation_request_id  = $donationRequest->id;
        }else{
            $beneficiary = new Beneficiary();
            $beneficiary->name = $request['name'];
            $beneficiary->phone = $request['phone'];
            $beneficiary->national_id = $request['national_id'];
            $beneficiary->family_member = $request['family_member'];
            $beneficiary->income = $request['income'];
            $beneficiary->committee_id  = $request['committee_id'];
            $beneficiary_result = $beneficiary->save();

            $beneficiary = Beneficiary::where('national_id', $request->national_id)->first();

            $BenefitRequest->title = $donationRequest->title;
            // $BenefitRequest->status = 2;
            $BenefitRequest->description = $donationRequest->description;
            $BenefitRequest->required_quantity = $request['required_quantity'];
            $BenefitRequest->remaining_quantity = $BenefitRequest->required_quantity;
            $BenefitRequest->amount_spent = 0;
            $BenefitRequest->beneficiary_id = $beneficiary->id;
            $BenefitRequest->donation_request_id  = $donationRequest->id;
        }
        $result = $BenefitRequest->save();
        return redirect()->back()->with('add_status', $result);
    }
    // public function BenefitNow(){
    //     $committees = Committee::get();
    //     return view('Website.Benefit.BenefitNow', ['committees'=> $committees]);
    // }

    // public function BenefitNowRequest(Request $request){
    //     $request->validate([
    //         'name' => 'required',
    //         'phone' => 'required',
    //         'national_id' => 'required|numeric',
    //         'family_member' => 'required|numeric',
    //         'income' => 'required|numeric',
    //         'title' => 'required',
    //         'required_quantity' => 'required|numeric',
    //         'description' => 'required',
    //     ]);
    //     $Beneficiary = Beneficiary::where('national_id', $request->national_id)->first();
    //     $BenefitRequest = new BenefitRequest();
    //     if($Beneficiary){
    //         $BenefitRequest->title = $request['title'];
    //         // $BenefitRequest->status = 2;
    //         $BenefitRequest->description = $request['description'];
    //         $BenefitRequest->required_quantity = $request['required_quantity'];
    //         $BenefitRequest->remaining_quantity = $BenefitRequest->required_quantity;
    //         $BenefitRequest->amount_spent = 0;
    //         $BenefitRequest->beneficiary_id = $Beneficiary->id;
    //     }else{
    //         $beneficiary = new Beneficiary();
    //         $beneficiary->name = $request['name'];
    //         $beneficiary->phone = $request['phone'];
    //         $beneficiary->national_id = $request['national_id'];
    //         $beneficiary->family_member = $request['family_member'];
    //         $beneficiary->income = $request['income'];
    //         $beneficiary->committee_id  = $request['committee_id'];
    //         $beneficiary->save();

    //         $beneficiary = Beneficiary::where('national_id', $request->national_id)->first();

    //         $BenefitRequest->title = $request['title'];
    //         // $BenefitRequest->status = 2;
    //         $BenefitRequest->description = $request['description'];
    //         $BenefitRequest->required_quantity = $request['required_quantity'];
    //         $BenefitRequest->remaining_quantity = $BenefitRequest->required_quantity;
    //         $BenefitRequest->amount_spent = 0;
    //         $BenefitRequest->beneficiary_id = $beneficiary->id;
    //     }
    //     $result = $BenefitRequest->save();
    //     return redirect()->back()->with('add_status', $result);

    // }
}
