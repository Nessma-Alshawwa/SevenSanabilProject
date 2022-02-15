<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;

class UserController extends Controller
{
    public function index(UsersDataTable $user){
        return $user->render('dashboard.users', ['title'=> '/المستخدمين']);
    }

    public function show($id){
        $user = User::where('id', $id)->get();
        return response()->json([$user]);
    }

    public function AddOrUpdate(Request $request){
        $data = $request->except('_token');
        $result = User::updateOrCreate(['id' => $id], $data);
        return response()->json([
            'status'=> [$result],
            'success'=> true,
            $result
        ]);
    }

    public function edit($id){
        $user = User::where('id', $id)->get();
        return ($user);
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
