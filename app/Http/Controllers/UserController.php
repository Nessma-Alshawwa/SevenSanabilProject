<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\CheckTrait;
use App\Http\Traits\GetBy;
use App\Http\Traits\MainTrait;
use App\User;
use App\Models\UserLevel;
use App\Models\Enterprise;
use App\Models\Brand;
use App\Models\Branch;
use App\Models\Inventory;
use App\Models\Seller;
use App\Models\ApiPermission;
use App\Models\BranchPaymentMethod;
use App\Models\Corporate;
use App\Http\Requests\UserRequest;
use Spatie\Permission\Models\Role;
use DB;

class UserController extends Controller
{
    
    use GetBy;
    use CheckTrait;
    use MainTrait;

    function __construct()
    {
        $this->middleware('permission:Users', ['only' => ['index']]);
        $this->middleware('permission:Users Create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Users Edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Users Deactivate', ['only' => ['destroy']]);
        $this->middleware('permission:Users Activate', ['only' => ['restore']]);
    }

    public function index () {
        $page = config('pages.users');
        $superadmin_user_level_id = config('roles.admin');
        $enterprise_user_level_id = config('roles.enterprise');
        $brand_user_level_id = config('roles.brand');
        $branch_user_level_id = config('roles.branch');
        $inventory_user_level_id = config('roles.inventory');
        $seller_user_level_id = config('roles.seller');
        $user = auth()->user();

        $list = [];

        if ($user->user_level_id == $superadmin_user_level_id) {
            $list = User::withTrashed()->get();
        } else if ($user->user_level_id == $enterprise_user_level_id) {
            $enterprise_id = $user->enterprise_id;
            $list = User::withTrashed()->where('enterprise_id', $enterprise_id)->get();
        } else if ($user->user_level_id == $brand_user_level_id) {
            $brand_id = $user->brand_id;
            $list = User::withTrashed()->where('brand_id', $brand_id)->get();
        } else if ($user->user_level_id == $branch_user_level_id) {
            $branch_id = $user->branch_id;
            $list = User::withTrashed()->where('branch_id', $branch_id)->get();
        } else if ($user->user_level_id == $inventory_user_level_id) {
            $inventory_id = $user->inventory_id;
            $list = User::withTrashed()->where('inventory_id', $inventory_id)->get();
        } else if ($user->user_level_id == $seller_user_level_id) {
            $seller_id = $user->seller_id;
            $list = User::withTrashed()->where('seller_id', $seller_id)->get();
        }

        return view('users.index')->with(compact('page', 'list'));
    }


    public function create () {
        $page = config('pages.users');
        $superadmin_user_level_id = config('roles.admin');
        $enterprise_user_level_id = config('roles.enterprise');
        $brand_user_level_id = config('roles.brand');
        $branch_user_level_id = config('roles.branch');
        $inventory_user_level_id = config('roles.inventory');
        $seller_user_level_id = config('roles.seller');
        $user = auth()->user();
        $user_level_id = $user->user_level_id;

        if ($user->user_level_id == $superadmin_user_level_id) {
            $user_levels = UserLevel::all();
        } else if ($user->user_level_id == $enterprise_user_level_id) {
            $user_levels = UserLevel::where('id', '>=', $enterprise_user_level_id)->get();
        } else if ($user->user_level_id == $brand_user_level_id) {
            $user_levels = UserLevel::where('id', '>=', $brand_user_level_id)->get();
        } else if ($user->user_level_id == $branch_user_level_id) {
            $user_levels = UserLevel::where('id', $branch_user_level_id)->get();
        } else if ($user->user_level_id == $inventory_user_level_id) {
            $user_levels = UserLevel::where('id', $inventory_user_level_id)->get();
        } else if ($user->user_level_id == $seller_user_level_id) {
            $user_levels = UserLevel::where('id', $seller_user_level_id)->get();
        }

        return view('users.create')->with(compact('page','user_levels','user_level_id'));
    }


    public function store (UserRequest $request) {
        $enterprise_user_level_id = config('roles.enterprise');
        $brand_user_level_id = config('roles.brand');
        $branch_user_level_id = config('roles.branch');
        $inventory_user_level_id = config('roles.inventory');
        $seller_user_level_id = config('roles.seller');

        $user_level_id = $request['user_level_id'];

        if ($user_level_id == $enterprise_user_level_id) {
            if (!$enterprise_id = $request['enterprise_id']) {
                return back()->with('error', trans('cp.messages.fill_information'));
            }
        } else if ($user_level_id == $brand_user_level_id) {
            if ((!$enterprise_id = $request['enterprise_id']) || (!$brand_id = $request['brand_id'])) {
                return back()->with('error', trans('cp.messages.fill_information'));
            }
        } else if ($user_level_id == $branch_user_level_id) {
            if ((!$enterprise_id = $request['enterprise_id']) || (!$brand_id = $request['brand_id']) || (!$branch_id = $request['branch_id'])) {
                return back()->with('error', trans('cp.messages.fill_information'));
            }
        } else if ($user_level_id == $inventory_user_level_id) {
            if ((!$enterprise_id = $request['enterprise_id']) || (!$brand_id = $request['brand_id']) || (!$inventory_id = $request['inventory_id'])) {
                return back()->with('error', trans('cp.messages.fill_information'));
            }
        } else if ($user_level_id == $seller_user_level_id) {
            if ((!$enterprise_id = $request['enterprise_id']) || (!$brand_id = $request['brand_id']) || (!$seller_id = $request['seller_id'])) {
                return back()->with('error', trans('cp.messages.fill_information'));
            }
        }

        $request['created_by'] = auth()->user()->id;

        $user = User::createInstance($request->all());

        if ($user) {
            $user->employee_id = $user->id;
            $user->save();

            DB::table('model_has_roles')->insert(['role_id' => request('role_id') , 'model_type' => "App\User" , 'model_id' => $user->id]);
            return back()->with('success', trans('cp.messages.add_success'));
        }

        return back()->with('error', trans('cp.messages.something_wrong'));
    }


    public function edit ($id) {
        $page = config('pages.users');
        $superadmin_user_level_id = config('roles.admin');
        $enterprise_user_level_id = config('roles.enterprise');
        $brand_user_level_id = config('roles.brand');
        $branch_user_level_id = config('roles.branch');
        $inventory_user_level_id = config('roles.inventory');
        $seller_user_level_id = config('roles.seller');

        $user = User::withTrashed()->findOrFail($id);
        $user_level_id = $user->user_level_id;

        $roles = [];
        $api_permissions = [];
        $branch_payment_methods = [];

        if ($user_level_id == $superadmin_user_level_id) {
            $roles = Role::orderBy('id','DESC')->where('user_level_id', $superadmin_user_level_id)->get();
        } else if ($user_level_id == $enterprise_user_level_id) {
            $enterprise_id = $user->enterprise_id;
            $roles = Role::orderBy('id','DESC')->where('user_level_id', $enterprise_user_level_id)->where('enterprise_id', $enterprise_id)->get();
        } else if ($user_level_id == $brand_user_level_id) {
            $brand_id = $user->brand_id;
            $roles = Role::orderBy('id','DESC')->where('user_level_id', $brand_user_level_id)->where('brand_id', $brand_id)->get();
        } else if ($user_level_id == $branch_user_level_id) {
            $branch_id = $user->branch_id;
            $roles = Role::orderBy('id','DESC')->where('user_level_id', $branch_user_level_id)->where('branch_id', $branch_id)->get();
            $api_permissions = ApiPermission::all();
            $branch_payment_methods = BranchPaymentMethod::all();
        } else if ($user_level_id == $inventory_user_level_id) {
            $inventory_id = $user->inventory_id;
            $roles = Role::orderBy('id','DESC')->where('user_level_id', $inventory_user_level_id)->where('inventory_id', $inventory_id)->get();
        } else if ($user_level_id == $seller_user_level_id) {
            $seller_id = $user->seller_id;
            $roles = Role::orderBy('id','DESC')->where('user_level_id', $seller_user_level_id)->where('seller_id', $seller_id)->get();
        }


        return view('users.edit_some')->with(compact('page','user','roles','api_permissions','branch_payment_methods'));
    }


    public function update (Request $request, $id) {
        $user = User::findOrFail($id);

        if ($employee_id = request('employee_id')) {
            $user->employee_id = request('employee_id');
            $user->save();
        }


        if ($password = request('password')) {
            $this->validate(request(), [
                'password' => 'required|min:6|confirmed'
            ]);
            $user->password = request('password');
            $user->save();
        }


        if ($role_id = request('role_id')) {
            if (!empty($role_id) && $role_id > 0) {
                DB::table('model_has_roles')->where('model_id', $user->id)->delete();
                DB::table('model_has_roles')->insert(['role_id' => $role_id , 'model_type' => "App\User" , 'model_id' => $user->id]);
            }
        }



        if (!empty($request['api_permissions'])) {
            $api_permissions = $request['api_permissions'];
            
            DB::table('api_permission_user')->where('user_id', $user->id)->delete();

            $rows = [];
            foreach ($api_permissions as $api_permission_id) {
                $rows[] = ['user_id' => $user->id , 'api_permission_id' => $api_permission_id];
            }
            DB::table('api_permission_user')->insert($rows);

            $user->api_permissions()->sync($api_permissions);
        }

        if (!empty($request['branch_payment_methods'])) {
            $branch_payment_methods = $request['branch_payment_methods'];
            
            DB::table('branch_payment_method_user')->where('user_id', $user->id)->delete();

            $rows = [];
            foreach ($branch_payment_methods as $branch_payment_method_id) {
                $rows[] = ['user_id' => $user->id , 'branch_payment_method_id' => $branch_payment_method_id];
            }
            DB::table('branch_payment_method_user')->insert($rows);
        }


        return back()->with('success', trans('cp.messages.modify_success'));
    }


}
