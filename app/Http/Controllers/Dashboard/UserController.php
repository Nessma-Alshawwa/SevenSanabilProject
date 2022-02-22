<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\UserLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\DataTables\UsersDataTable;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index(UsersDataTable $users){
        $levels = UserLevel::get();
        // auth()->user()->assignRole("superadmin");
        return $users->render('dashboard.users', ['title'=> '/المستخدمين', 'levels'=> $levels]);
    }

    public function show($id){
    }

    public function createUser(Request $request){
        $name = $request['name'];
        $email = $request['email'];
        $password = Hash::make($request['password']);
        $user_level_id = $request['user_level_id'];
        
        $user = new User();
		$user->name = $name;
        $user->email = $email;
		$user->password = $password;
		$user->user_level_id = $user_level_id;
        $result = $user->save();
        return response()->json([
            'status'=> [$result],
            'success'=> true,
            $result
        ]);
    }

    public function edit($id){
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
