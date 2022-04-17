<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Beneficiary;
use App\Models\Committee;

class BeneficiariesController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:View Beneficiaries', ['only' => ['index']]);
        $this->middleware('permission:Edit Beneficiary', ['only' => ['edit', 'update']]);
    }

    public function index(){
        $i = 1;
        $user = auth()->user();
        $user_level_id = $user->user_level_id;

        if ($user_level_id == 1){ //superadmin_user_level_id
            $Beneficiaries = Beneficiary::with("Committee")->withTrashed()->get();
        }elseif($user_level_id == 2){ //committee_user_level_id
            $Beneficiaries = Beneficiary::where('committee_id', $user->committee_id)->with("Committee")->withTrashed()->get();
        }
        // dd($Beneficiaries);
        return view('dashboard.beneficiaries.index', ['title'=> '/المستفيدين', 'Beneficiaries'=> $Beneficiaries, 'i'=>$i]);
    }

    public function edit($id){
        $beneficiary = Beneficiary::with("Committee")->withTrashed()->findOrFail($id);
        $committees = Committee::get();
        return view('dashboard.beneficiaries.edit', ['title'=> '/المستفيدين/تعديل المستفيد', 'beneficiary'=> $beneficiary, 'committees'=> $committees]);
    }

    public function show($id){
        $beneficiary = Beneficiary::with("Committee")->withTrashed()->findOrFail($id);
        $committees = Committee::get();
        return view('dashboard.beneficiaries.show', ['title'=> '/المستفيدين/المستفيد', 'beneficiary'=> $beneficiary, 'committees'=> $committees]);
    }

    public function update(Request $request, $id){

        $beneficiary = Beneficiary::withTrashed()->findOrFail($id);

        $name = $request['name'];
        $phone = $request['phone'];
        $family_member = $request['family_member'];
        $income = $request['income'];
        $committee_id = $request['committee_id'];

        $beneficiary->name = $name;
        $beneficiary->phone = $phone;
        $beneficiary->family_member = $family_member;
        $beneficiary->income = $income;
        $beneficiary->committee_id = $committee_id;
        $result = $beneficiary->save();

        return redirect('/dashboard/beneficiaries')->with('add_status', $result);
    }
}
