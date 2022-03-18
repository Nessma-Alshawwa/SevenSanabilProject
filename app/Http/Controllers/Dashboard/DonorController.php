<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Donor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DonorController extends Controller
{
    public function index(){
        $i = 1;
        $donors = Donor::withTrashed()->orderBy('id','DESC')->get();
        return view('dashboard.donors.index', ['title'=> '/المتبرعين','donors'=>$donors, 'i'=>$i]);
    }

    public function edit($id){
        $donor = Donor::withTrashed()->findOrFail($id);
        return view('dashboard.donors.edit', ['title'=> '/المتبرعين/تعديل بيانات المتبرع','donor'=> $donor ]);
        
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

    public function destroy($id){
        Donor::where('id', $id)->delete();
        return response()->json([
            'success'=> true,
        ]);
    }

    public function restore($id){
        Donor::onlyTrashed()->where('id', $id)->restore();
        return response()->json([
            'success'=> true,
        ]);
    }
}
