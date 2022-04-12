<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Donor;
use App\Models\Committee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DonorController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:View Donors', ['only' => ['index']]);
        $this->middleware('permission:Create Donor', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Donor', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Approve Donor', ['only' => ['approve']]);
        $this->middleware('permission:Reject Donor', ['only' => ['reject']]);
    }

    public function index(){
        $i = 1;
        // $committees = Committee::withTrashed()->get();
        // $user = auth()->user();
        // $Committee_id = $user->Committee_id;
        // $donors = Donor::withTrashed()->with('Committee')->where('Committee_id',$Committee_id)->orderBy('id','DESC')->get();
        $donors = Donor::withTrashed()->orderBy('id','DESC')->get();
        $status = config('constance.status');
        return view('dashboard.donors.index', ['title'=> '/المتبرعين','donors'=>$donors,'status'=>$status,'i'=>$i]);
    }

    public function edit($id){
        $donor = Donor::withTrashed()->findOrFail($id);
        $status = config('constance.status');
        return view('dashboard.donors.edit', ['title'=> '/المتبرعين/تعديل بيانات المتبرع','donor'=> $donor, 'status'=>$status]);
        
    }

    public function update(Request $request, $id){
        $donor = Donor::withTrashed()->findOrFail($id);
        $name = $request['name'];
        $national_id = $request['national_id'];
        $phone = $request['phone'];
        $status = $request['status'];

        $donor->name = $name;
        $donor->national_id = $national_id;
        $donor->phone = $phone;
        $donor->status = $status;
        $result = $donor->save();
        
        return redirect('dashboard/donors')->with('add_status', $result);
    }

    public function approve($id) {
        Donor::withTrashed()->where('id', $id)->update(['status' => 1]);
        return response()->json([
            'success'=> true,
        ]);
    }

    public function reject($id) {
        Donor::withTrashed()->where('id', $id)->update(['status' => 0]);
        return response()->json([
            'success'=> true,
        ]);
    }
}
