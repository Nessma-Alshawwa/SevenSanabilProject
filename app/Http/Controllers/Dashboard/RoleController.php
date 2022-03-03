<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\UserLevel;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(){
        // $roles = Role::With('UserLevels')->get();
        $roles = Role::get();
        $user_levels = UserLevel::Get();
        return view('dashboard.roles.index', ['title'=> '/الأدوار'], compact('roles', 'user_levels'));
    }

    public function create_role(){
        $roles = Role::get();
        // $permission = Permission::all();
        // dd($permission);
        $user_levels = UserLevel::Get();
        return view('dashboard.roles.create_role',['title'=> '/إضافة'], compact('roles', 'user_levels'));
    }

    public function store_role(Request $request){
        $role = Role::create(['name' => $request->input('name'),'user_level_id' => $request->input('user_level_id'), 
        'committee_id' => $request->input('committee_id', null), 'donor_id' => $request->input('donor_is', null)
        ]);
        $role->syncPermissions($request->input('permission'));
        $name = $request['name'];
        $permission = $request['permission'];
        $user_level_id = $request['user_level_id'];
        $committee_id = $request['committee_id'];
        $donor_id = $request['donor_id'];
		$role = new Role();
		$role->name = $name;
		$role->permission = $permission;
		$role->user_level_id = $user_level_id;
		$role->committee_id = $committee_id;
		$role->donor_id = $donor_id;
        $role_result = $role->save();
		return redirect('/dashboard/roles')->with(['title'=> ''])->with('add_status', [$role_result]);
    }

    public function edit_role($id){
        $role = Role::where('id', $id);
        return view('dashboard.roles.edit_role')->with('role', $role);
    }

    public function update_role(Request $request,$id){
        $name = $request['name'];
        $role = Role::where('id',$id)->first();// Model
        $role->name = $name;
		$role_result = $role->save();
        return  redirect('/dashboard/roles')->with(['title'=> ''])->with('add_status', [$role_result]);
    }
    public function destroy($id){
        Role::findOrFail($id)->delete();
        return redirect()->back();
    }
}
