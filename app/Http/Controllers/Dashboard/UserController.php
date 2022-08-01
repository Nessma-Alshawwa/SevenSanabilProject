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
use Illuminate\Support\Facades\DB ;

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
        $donor_id = $user->donor_id;
        $users = [];

        if($user_level_id == 1){ //superadmin_user_level_id
            $users = User::withTrashed()->with("UserLevels")->with("Committees")->with("Donors")->get();
        }else if($user_level_id == 2){ //committee_user_level_id
            $committee_id = $user->committee_id;
            $users = User::withTrashed()->where('committee_id', $committee_id)->with("UserLevels")->with("Committees")->with("Donors")->get();
        }else if($user_level_id == 3 && $donor_id != null){ //donor_user_level_id
            $donor_id = $user->donor_id;
            $users = User::withTrashed()->where('donor_id', $donor_id)->with("UserLevels")->with("Committees")->with("Donors")->get();
        }
        // dd($users);
        return view('dashboard.users.index', ['title'=> '/المستخدمين', 'users'=>$users, 'levels'=> $levels, 'committees'=> $committees, 'donors'=> $donors, 'i'=>$i ]);
    }

    public function create(){
        $levels = UserLevel::get();
        $committees = Committee::get();
        $donors = Donor::where('status', 1)->get();
        $roles = Role::all();
        
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

        return view('dashboard.users.create', ['title'=> '/المستخدمين/إضافة مستخدم جديد','user_level_id'=>$user_level_id, 'users'=>$users, 'levels'=> $levels, 'committees'=> $committees, 'donors'=> $donors, 'roles'=> $roles ]);
    
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role_id' => 'required|numeric'
        ]);
        $name = $request['name'];
        $email = $request['email'];
        $password = Hash::make($request['password']);

        if(auth()->user()->user_level_id == 2 ){
            $committee_id = auth()->user()->committee_id;
            $donor_id = $request['donor_id'];

        }elseif(auth()->user()->user_level_id == 3){
            $committee_id = auth()->user()->committee_id;
            $donor_id = auth()->user()->donor_id; 
        }else{
            $committee_id = $request['committee_id'];
            $donor_id = $request['donor_id'];
        }
        
        $role_id = $request['role_id'];

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

        DB::table('model_has_roles')->insert(['role_id' => $role_id , 'model_type' => "App\Models\User" , 'model_id' => $user->id]);

        return redirect()->back()->with('add_status', $result);
    }

    public function edit($id){
        $user = User::withTrashed()->findOrFail($id);
        $levels = UserLevel::get();
        $committees = Committee::get();
        $donors = Donor::where('status', 1)->get();

        $roles = Role::all();
        $user_roles = $user->getRoleNames();

        // dd($roles);
        if($user->profile_photo_path !== null){
            $img_link = Storage::url($user->profile_photo_path);
    	    $user->profile_photo_path = $img_link;
        }
        // return ($user_role);
        return view('dashboard.users.edit', ['title'=> '/المستخدمين/تعديل المستخدم', 'user'=>$user, 'levels'=> $levels, 'committees'=> $committees, 'donors'=> $donors, 'user_roles'=>$user_roles, 'roles'=>$roles ]);
        
    }

    public function update(Request $request, $id){
        $user = User::withTrashed()->findOrFail($id);
        $request->validate([
            'user_level_id' => 'required',
            'role_id' => 'required|numeric'
        ]);

        $user_level_id = $request['user_level_id'];
        
        if(auth()->user()->user_level_id == 2 ){
            $committee_id = auth()->user()->committee_id;
            $donor_id = $request['donor_id'];
        }elseif(auth()->user()->user_level_id == 3){
            $committee_id = auth()->user()->committee_id;
            $donor_id = auth()->user()->donor_id; 
        }else{
            $committee_id = $request['committee_id'];
            $donor_id = $request['donor_id'];
        }

        $role_id = $request['role_id'];


        if($request['user_level_id']){
            $user_level_id = $request['user_level_id'];
        }else{
            $user_level_id = 3;
        }

        $user->user_level_id = $user_level_id;
        $user->committee_id = $committee_id;
        $user->donor_id =$donor_id;
        $result = $user->save();

        if ($role_id) {
            if (!empty($role_id) && $role_id > 0) {
                DB::table('model_has_roles')->where('model_id', $user->id)->delete();
                DB::table('model_has_roles')->insert(['role_id' => $role_id , 'model_type' => "App\Models\User" , 'model_id' => $user->id]);
            }
        }
        return redirect()->back()->with('add_status', $result);
        // response()->json([
        //     'status'=> [$result],
        //     'success'=> true,
        //     $result
        // ]);
    }

    public function profileEdit($id){
        $user = User::withTrashed()->findOrFail($id);
        $levels = UserLevel::get();
        $committees = Committee::get();
        $donors = Donor::get();

        $roles = Role::all();
        $user_roles = $user->getRoleNames();

        // dd($roles);
        if($user->profile_photo_path !== null){
            $img_link = Storage::url($user->profile_photo_path);
    	    $user->profile_photo_path = $img_link;
        }
        // return ($user_role);
        return view('dashboard.users.profileEdit', ['title'=> '/المستخدمين/تعديل الملف الشخصي', 'user'=>$user, 'levels'=> $levels, 'committees'=> $committees, 'donors'=> $donors, 'user_roles'=>$user_roles, 'roles'=>$roles ]);
        
    }

    public function profileUpdate(Request $request, $id){
        $user = User::withTrashed()->findOrFail($id);
        $request->validate([
            'name' => 'required',
        ]);

        $name = $request['name'];
        $committee_id = $request['committee_id'];

        if($request->file('image')){
            $image = $request->file('image');
            $path = 'uploads/images/';
            $image_name = time()+rand(1, 10000000000) . '.' . $image->getClientOriginalExtension();
            Storage::disk('local')->put($path.$image_name , file_get_contents($image));
            Storage::disk('local')->exists($path.$image_name);
            $image = $path.$image_name;
        }else{
            $image = $user->profile_photo_path;
        }
        
        $user->name = $name;
        $user->committee_id = $committee_id;
        $user->profile_photo_path = $image;
        $result = $user->save();
        return redirect()->back()->with('add_status', $result);

        // return response()->json([
        //     'status'=> [$result],
        //     'success'=> true,
        //     $result
        // ]);
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
