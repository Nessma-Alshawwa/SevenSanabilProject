<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\UserLevel;
use App\Models\Committee;
use App\Models\Donor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\DataTables\UsersDataTable;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    // public function index(UsersDataTable $users){
    //     $levels = UserLevel::get();
    //     $committees = Committee::get();
    //     $donors = Donor::get();
    //     return $users->render('dashboard.users', ['title'=> '/المستخدمين', 'levels'=> $levels, 'committees'=> $committees, 'donors'=> $donors ]);
    //     // return view('dashboard.users', ['title'=> '/المستخدمين'], ['levels'=> $levels]);
    // }

    public function index(){
        $levels = UserLevel::get();
        $committees = Committee::get();
        $donors = Donor::get();
        $i = 1;
        
        $user = auth()->user();
        $user_level_id = $user->user_level_id;
        $users = [];

        if($user_level_id == 1){ //superadmin_user_level_id
            $users = User::with("UserLevels")->with("Committees")->with("Donors")->get();
        }else if($user_level_id == 2){ //committee_user_level_id
            $committee_id = $user->committee_id;
            $users = User::where('committee_id', $committee_id)->with("UserLevels")->with("Committees")->with("Donors")->get();
        }else if($user_level_id == 3){ //donor_user_level_id
            $donor_id = $user->donor_id;
            $users = User::where('donor_id', $donor_id)->with("UserLevels")->with("Committees")->with("Donors")->get();
        }

        return view('dashboard.users', ['title'=> '/المستخدمين', 'i'=>$i, 'users'=>$users, 'levels'=> $levels, 'committees'=> $committees, 'donors'=> $donors ]);
    }

    public function store(Request $request){
        $name = $request['name'];
        $email = $request['email'];
        $password = Hash::make($request['password']);
        $committee_id = $request['committee_id'];
        $donor_id = $request['donor_id'];

        if($request['user_level_id']){
            $user_level_id = $request['user_level_id'];
        }else{
            $user_level_id = 3;
        }

        $image = $request->file('image');
		$path = 'uploads/images/';
		$image_name = time()+rand(1, 10000000000) . '.' . $image->getClientOriginalExtension();
		Storage::disk('local')->put($path.$image_name , file_get_contents($image));
		Storage::disk('local')->exists($path.$image_name);

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->profile_photo_path = $image;
        $user->user_level_id = $user_level_id;
        $user->committee_id = $committee_id;
        $user->donor_id =$donor_id;
        $result = $user->save();

        return response()->json([
            'status'=> [$result],
            'success'=> true,
            $result
        ]);
    }

    public function edit($id){
        $user = User::where('id', $id)->first();
        if($user->profile_photo_path !== null){
            $img_link = Storage::url($user->profile_photo_path);
    	    $user->profile_photo_path = $img_link;
        }

        return($user);
    }

    public function update(Request $request, $id){
        $user = User::where('id', $id)->with("UserLevels")->with("Committees")->with("Donors")->first();

        $name = $request['name'];
        $email = $request['email'];
        $password = Hash::make($request['password']);
        $image = $request['image'];
        $user_level_id = $request['user_level_id'];
        $committee_id = $request['committee_id'];
        $donor_id = $request['donor_id'];

        if($request['user_level_id']){
            $user_level_id = $request['user_level_id'];
        }else{
            $user_level_id = 3;
        }

        if (!empty($request['image'])){
            $image = $request->file('image');
            $path = 'uploads/images/';
            $image_name = time()+rand(1, 10000000000) . '.' . $image->getClientOriginalExtension();
            Storage::disk('local')->put($path.$image_name , file_get_contents($image));
            Storage::disk('local')->exists($path.$image_name);
            // $user->profile_photo_path = $path.$image_name;
        }

        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->user_level_id = $user_level_id;
        $user->committee_id = $committee_id;
        $user->donor_id =$donor_id;
        $result = $user->save();
        
        return response()->json([
            'status'=> [$result],
            'success'=> true,
            $result
        ]);
    }

    public function destroy($id){
        User::where('id', $id)->delete();
        return response()->json([
            'success'=> true,
        ]);
    }

    public function restore($id){
        User::onlyTrashed()->where('id', $id)->restore();
        return response()->json([
            'success'=> true,
        ]);
    }
}
