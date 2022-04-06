<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:View Categories', ['only' => ['index']]);
        $this->middleware('permission:Create Category', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Category', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Disable Category', ['only' => ['destroy']]);
        $this->middleware('permission:Activate Category', ['only' => ['restore']]);
    }

    public function index(){
        $i = 1;
        $categories = Category::withTrashed()->orderBy('id','DESC')->get();
        return view('dashboard.categories.index', ['title'=> '/التصنيفات', 'categories'=>$categories, 'i'=>$i]);
    }

    public function create(){
        $categories = Category::Get();
        return view('dashboard.categories.create', ['title'=> '/إضافة', 'categories'=>$categories]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required'
        ]);
        $name = $request['name'];
        $categories = new Category();
        $categories->name = $name;
        $result = $categories->save();

        return redirect()->back()->with('add_status', $result);
    }

    public function edit($id){
        $category = Category::withTrashed()->findOrFail($id);
        return view('dashboard.categories.edit', ['title'=> '/التصنيفات/تعديل التصنيف','category'=> $category ]);
        
    }

    public function update(Request $request, $id){
        $Category = Category::withTrashed()->findOrFail($id);
        $name = $request['name'];
        $Category->name = $name;
        $result = $Category->save();
        
        return redirect('dashboard/categories')->with('add_status', $result);
    }
    
    public function destroy($id){
        Category::where('id', $id)->delete();
        return response()->json([
            'success'=> true,
        ]);
    }

    public function restore($id){
        $comm = Category::onlyTrashed()->where('id', $id)->restore();
        return response()->json([
            'success'=> true,
        ]);
    }
}
