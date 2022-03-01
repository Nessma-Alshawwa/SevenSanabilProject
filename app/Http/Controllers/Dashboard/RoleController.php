<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\DataTables\RolesDataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Role;
use App\Models\UserLevel;

class RoleController extends Controller
{
    public function index(RolesDataTable $roles){
        // $levels = UserLevel::select('id','name')->get();
        $role = Role::get();
        $user = auth()->user();
        // if ($user->user_level_id == 1) {
        //     $role = Role::orderBy('id','DESC')->get();
        // }else if ($user->user_level_id == $committee_id) {
        //     $committee_id = $user->committee_id;
        //     $role = Role::orderBy('id','DESC')->where('committee_id', $committee_id)->get();
        // }else if ($user->user_level_id == $donor_id) {
        //     $donor_id = $user->donor_id;
        //     $role = Role::orderBy('id','DESC')->where('donor_id', $donor_id)->get();
        // }
        return $roles->render('dashboard.roles',['title' => '/الأدوار'],compact('role','user'));
    }

    public function create_role(){
        
    }

    public function AddOrUpdateRole(Request $request){
        $data = $request->except('_token');
        $name = $request['name'];
        // $user_level = $request['user_level'];
        $id = $request['id'];
        // $result = Role::updateOrCreate(['name' => $name,'user_level' => $user_level,
        //  'admin_id' => $request->input($id, null), 'committee_id' => $request->input($id, null),
        //   'donor_id' => $request->input($id, null)], $data);
        // $result->syncPermissions($request->input('permission'));
        $role = new Role();
		$role->name = $name;
        $result = $role->save();
        return response()->json([
            'status'=> [$result],
            'success'=> true,
            $result
        ]);
    }

    public function destroy($id){
        Role::where('id', $id)->delete();
        return response()->json([
            'success'=> true,
        ]);
    }

    public function restore($id){
        Role::onlyTrashed()->where('id', $id)->restore();
        return response()->json([
            'success'=> true,
        ]);
    }
}
