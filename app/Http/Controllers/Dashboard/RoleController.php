<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\UserLevel;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\Committee;
use App\Models\Donor;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    
    function __construct()
    {
        $this->middleware('permission:View Roles', ['only' => ['index']]);
        $this->middleware('permission:Create Role', ['only' => ['create','store']]);
        $this->middleware('permission:Delete Role', ['only' => ['destroy']]);
    }

    public function index(){
        $i = 1;
        $user = auth()->user();
        $user_level_id = $user->user_level_id;
        if($user_level_id == 1){ //SuperAdmin_user_level_id
            $roles = Role::orderBy('id','DESC')->with("Committees")->with("Donors")->with('UserLevels')->get();
        }else if($user_level_id == 2){ //committee_user_level_id
            $committee_id = $user->committee_id;
            $roles = Role::orderBy('id','DESC')->where('$committee_id', $committee_id)->with("Committees")->with("Donors")->with('UserLevels')->get();
        }else if($user_level_id == 3){ //donor_user_level_id
            $donor_id = $user->donor_id;
            $roles = Role::orderBy('id','DESC')->where('$donor_id', $donor_id)->with("Committees")->with("Donors")->with('UserLevels')->get();
        }
        return view('dashboard.roles.index', ['title'=> '/الأدوار', 'roles'=>$roles, 'i'=>$i]);
    }

    public function create(){
        $committees = Committee::get();
        $donors = Donor::get();
        $permissions = Permission::all();
        $user = auth()->user();
        $user_level_id = $user->user_level_id;
        if($user_level_id == 1){ //SuperAdmin_user_level_id
            $levels = UserLevel::all();
        }else if($user_level_id == 2){ //committee_user_level_id
            $committee_id = $user->committee_id;
            $levels = UserLevel::where('committee_id', '>=', $committee_id)->with("Committees")->with("Donors")->get();
        }else if($user_level_id == 3){ //donor_user_level_id
            $donor_id = $user->donor_id;
            $levels = UserLevel::where('donor_id', '>=', $donor_id)->with("Committees")->with("Donors")->get();
        }
        return view('dashboard.roles.create',['title'=> '/إضافة', 'levels'=>$levels, 'committees'=>$committees, 'donors'=>$donors, 'permissions'=>$permissions]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
            'user_level_id' => 'required',
        ]);

        $name = $request['name'];
        $user_level_id = $request['user_level_id'];
        $committee_id = $request->input('committee_id', null);
        $donor_id = $request->input('committee_id', null);


        $role = Role::create(['name' => $name,'user_level_id' => $user_level_id, 'committee_id'=> $committee_id, 'donor_id'=> $donor_id]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->back()->with('add_status', $role);

    }

    public function destroy($id){
        Role::findOrFail($id)->delete();
        return response()->json([
            'success'=> true,
        ]);
    }
}
