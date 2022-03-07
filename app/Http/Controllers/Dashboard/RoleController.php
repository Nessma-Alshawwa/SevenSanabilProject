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
    public function index(){
        $committees = Committee::get();
        $donors = Donor::get();
        $levels = UserLevel::get();
        $users = User::get();
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
        return view('dashboard.roles.index', ['title'=> '/الأدوار', 'roles'=>$roles,'users'=>$users, 'i'=>$i, 'committees'=>$committees, 'donors'=>$donors, 'levels'=>$levels]);
    }

    public function create(){
        $roles = Role::get();
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
        return view('dashboard.roles.create',['title'=> '/إضافة', 'levels'=>$levels, 'roles'=>$roles, 'committees'=>$committees, 'donors'=>$donors, 'permissions'=>$permissions]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
            'user_level_id' => 'required',
        ]);

    }

    public function destroy($id){
        Role::where('id', $id)->delete();
        return response()->json([
            'success'=> true,
        ]);
    }
}
