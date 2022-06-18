<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\BenefitRequest;
use App\Models\Committee;
use App\Models\DonationRequest;
use App\Models\Donor;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function DonateNow(){
        $committees = Committee::get();
        return view('Website.Donation.DonateNow', ['committees'=> $committees]);
    }
    public function DonateNowRequest(Request $request){
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'national_id' => 'required|numeric',
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
}
