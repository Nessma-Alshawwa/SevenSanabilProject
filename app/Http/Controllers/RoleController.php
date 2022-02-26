<?php
namespace App\Http\Controllers;

use App\Level;
use App\Models\UserLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:Roles', ['only' => ['index']]);
        $this->middleware('permission:Role Create', ['only' => ['create','store']]);
        $this->middleware('permission:Role Edit', ['only' => ['edit','update']]);
        $this->middleware('permission:Role Delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $page = config('pages.roles');
        $superadmin_user_level_id = config('roles.admin');
        $enterprise_user_level_id = config('roles.enterprise');
        $brand_user_level_id = config('roles.brand');
        $branch_user_level_id = config('roles.branch');
        $inventory_user_level_id = config('roles.inventory');
        $seller_user_level_id = config('roles.seller');
        $user = auth()->user();

        if ($user->user_level_id == $superadmin_user_level_id) {
            $roles = Role::orderBy('id','DESC')->get();
        } else if ($user->user_level_id == $enterprise_user_level_id) {
            $enterprise_id = $user->enterprise_id;
            $roles = Role::orderBy('id','DESC')->where('enterprise_id', $enterprise_id)->get();
        } else if ($user->user_level_id == $brand_user_level_id) {
            $brand_id = $user->brand_id;
            $roles = Role::orderBy('id','DESC')->where('brand_id', $brand_id)->get();
        } else if ($user->user_level_id == $branch_user_level_id) {
            $branch_id = $user->branch_id;
            $roles = Role::orderBy('id','DESC')->where('branch_id', $branch_id)->get();
        } else if ($user->user_level_id == $inventory_user_level_id) {
            $inventory_id = $user->inventory_id;
            $roles = Role::orderBy('id','DESC')->where('inventory_id', $inventory_id)->get();
        } else if ($user->user_level_id == $seller_user_level_id) {
            $seller_id = $user->seller_id;
            $roles = Role::orderBy('id','DESC')->where('seller_id', $seller_id)->get();
        }

        return view('roles.index',compact('roles','page'));
    }

    public function create()
    {
        $page = config('pages.roles');
        $permission = Permission::all();

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

        return view('roles.create',compact('permission','page','user_levels'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
            'user_level_id' => 'required',
        ]);

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
            if ((!$enterprise_id = $request['enterprise_id']) || (!$enterprise_id = $request['enterprise_id']) || (!$branch_id = $request['branch_id'])) {
                return back()->with('error', trans('cp.messages.fill_information'));
            }
        } else if ($user_level_id == $inventory_user_level_id) {
            if ((!$enterprise_id = $request['enterprise_id']) || (!$enterprise_id = $request['enterprise_id']) || (!$inventory_id = $request['inventory_id'])) {
                return back()->with('error', trans('cp.messages.fill_information'));
            }
        } else if ($user_level_id == $seller_user_level_id) {
            if ((!$enterprise_id = $request['enterprise_id']) || (!$enterprise_id = $request['enterprise_id']) || (!$seller_id = $request['seller_id'])) {
                return back()->with('error', trans('cp.messages.fill_information'));
            }
        }

        $role = Role::create(['name' => $request->input('name'),'user_level_id' => $request->input('user_level_id'), 'enterprise_id' => $request->input('enterprise_id', null), 'brand_id' => $request->input('brand_id', null), 'branch_id' => $request->input('branch_id', null), 'inventory_id' => $request->input('inventory_id', null), 'seller_id' => $request->input('seller_id', null)]);
        $role->syncPermissions($request->input('permission'));

        return back()->with('success',trans('cp.messages.roles.role_created'));
    }

    public function edit($id)
    {
        $page = config('pages.roles');
        $role = Role::findOrFail($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('roles.edit',compact('role','permission','rolePermissions','page'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::findOrFail($id);
        $role->name = $request->input('name');
        $role->user_level_id = $request->input('user_level_id');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return back()->with('success',trans('cp.messages.roles.role_updated'));
    }

    public function destroy($id)
    {
        Role::findOrFail($id)->delete();
        return back()->with('success',trans('cp.messages.roles.role_deleted'));
    }
}
