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

    function __construct()
    {
        $this->middleware('permission:View Users', ['only' => ['index']]);
        $this->middleware('permission:Create User', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit User', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Disable User', ['only' => ['destroy']]);
        $this->middleware('permission:Activate User', ['only' => ['restore']]);
    }


    public function index(){
        $levels = UserLevel::get();
        $committees = Committee::get();
        $donors = Donor::get();
        $i = 1;
        
        $user = auth()->user();
        $user_level_id = $user->user_level_id;
        $users = [];

        if($user_level_id == 1){ //superadmin_user_level_id
            $users = User::withTrashed()->with("UserLevels")->with("Committees")->with("Donors")->get();
        }else if($user_level_id == 2){ //committee_user_level_id
            $committee_id = $user->committee_id;
            $users = User::withTrashed()->where('committee_id', $committee_id)->with("UserLevels")->with("Committees")->with("Donors")->get();
        }else if($user_level_id == 3){ //donor_user_level_id
            $donor_id = $user->donor_id;
            $users = User::withTrashed()->where('donor_id', $donor_id)->with("UserLevels")->with("Committees")->with("Donors")->get();
        }
        // dd($users);
        return view('dashboard.users.index', ['title'=> '/المستخدمين', 'i'=>$i, 'users'=>$users, 'levels'=> $levels, 'committees'=> $committees, 'donors'=> $donors ]);
    }

    public function create(){
        $levels = UserLevel::get();
        $committees = Committee::get();
        $donors = Donor::get();
        
        $user = auth()->user();
        $user_level_id = $user->user_level_id;
        $users = [];

        if($user_level_id == 1){ //superadmin_user_level_id
            $users = User::withTrashed()->with("UserLevels")->with("Committees")->with("Donors")->get();
        }else if($user_level_id == 2){ //committee_user_level_id
            $committee_id = $user->committee_id;
            $users = User::withTrashed()->where('committee_id', $committee_id)->with("UserLevels")->with("Committees")->with("Donors")->get();
        }else if($user_level_id == 3){ //donor_user_level_id
            $donor_id = $user->donor_id;
            $users = User::withTrashed()->where('donor_id', $donor_id)->with("UserLevels")->with("Committees")->with("Donors")->get();
        }

        return view('dashboard.users.create', ['title'=> '/المستخدمين/إضافة مستخدم جديد', 'users'=>$users, 'levels'=> $levels, 'committees'=> $committees, 'donors'=> $donors ]);
    
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
        $image = $path.$image_name;

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->profile_photo_path = $image;
        $user->user_level_id = $user_level_id;
        $user->committee_id = $committee_id;
        $user->donor_id =$donor_id;
        $result = $user->save();

        return redirect()->back()->with('add_status', $result);
    }

    public function edit($id){
        $user = User::withTrashed()->findOrFail($id);
        $levels = UserLevel::get();
        $committees = Committee::get();
        $donors = Donor::get();

        if($user->profile_photo_path !== null){
            $img_link = Storage::url($user->profile_photo_path);
    	    $user->profile_photo_path = $img_link;
        }

        return view('dashboard.users.edit', ['title'=> '/المستخدمين/تعديل المستخدم', 'user'=>$user, 'levels'=> $levels, 'committees'=> $committees, 'donors'=> $donors ]);
        
    }

    public function update(Request $request, $id){
        $user = User::withTrashed()->findOrFail($id);

        $user_level_id = $request['user_level_id'];
        $committee_id = $request['committee_id'];
        $donor_id = $request['donor_id'];

        if($request['user_level_id']){
            $user_level_id = $request['user_level_id'];
        }else{
            $user_level_id = 3;
        }

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
