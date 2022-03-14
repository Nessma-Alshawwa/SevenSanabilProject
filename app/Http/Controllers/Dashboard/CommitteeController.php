<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Committee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommitteeController extends Controller
{
    public function index(){
        $i = 1;
        $committees = Committee::orderBy('id','DESC')->get();
        return view('dashboard.committees.index', ['title'=> '/اللجان', 'committees'=>$committees, 'i'=>$i]);
    }

    public function create(){
        $committees = Committee::Get();
        return view('dashboard.committees.create', ['title'=> '/إضافة', 'committees'=>$committees]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'location' => 'required',
            'manager' => 'required',
            'description' => 'required',
        ]);
        $name = $request['name'];
        $location = $request['location'];
        $manager = $request['manager'];
        $description = $request['description'];

        $committee = new Committee();
        $committee->name = $name;
        $committee->location = $location;
        $committee->manager = $manager;
        $committee->description = $description;
        $result = $committee->save();

        return redirect()->back()->with('add_status', $result);
    }

    public function edit($id){
        $committees = Committee::withTrashed()->findOrFail($id);
        return view('dashboard.committees.edit', ['title'=> '/اللجان/تعديل اللجنة','committees'=> $committees ]);
        
    }

    public function update(Request $request, $id){
        $committee = Committee::withTrashed()->findOrFail($id);
        $name = $request['name'];
        $location = $request['location'];
        $manager = $request['manager'];
        $description = $request['description'];

        $committee->name = $name;
        $committee->location = $location;
        $committee->manager = $manager;
        $committee->description = $description;
        $result = $committee->save();
        
        return response()->json([
            'status'=> [$result],
            'success'=> true,
            $result
        ]);
    }
    
    public function destroy($id){
        Committee::where('id', $id)->delete();
        return response()->json([
            'success'=> true,
        ]);
    }

    public function restore($id){
        Committee::onlyTrashed()->where('id', $id)->restore();
        return response()->json([
            'success'=> true,
        ]);
    }
}
