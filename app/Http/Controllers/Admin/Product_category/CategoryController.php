<?php

namespace App\Http\Controllers\Admin\Product_category;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Validator;

class CategoryController extends Controller
{
    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
        ]);

        if($validator->passes()){
            $category = new ProductCategory;
            $category->name = $request->name;
            $category->slug = \Str::slug($request->name);
            $category->show_on_home = $request->show_on_home;
            $category->save();

            return response()->json(['status' => true]);
        }else{
            return response()->json(['status' => false , 'errors' => $validator->errors()]);
        }
    }

    public function list(){
        $category = ProductCategory::all();
        return view('admin.category.list',compact('category'));
    }

    public function edit($id){
        $category = ProductCategory::find($id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request,$id){
        $category = ProductCategory::find($id);
        $validator = Validator::make($request->all(),[
            'name' => 'required',
        ]);

        if($validator->passes()){
            
            $category->name = $request->name;
            $category->slug = \Str::slug($request->name);
            $category->show_on_home = $request->show_on_home;
            $category->save();

            return response()->json(['status' => true]);
        }else{
            return response()->json(['status' => false , 'errors' => $validator->errors()]);
        }
    }

    public function destroy($id){
        $category = ProductCategory::find($id);
        if($category == null){
            return redirect()->back();
        }
        $category->delete();

        return response()->json(['status' => true , 'message' => 'Slider Deleted successfully']);
    }
}
