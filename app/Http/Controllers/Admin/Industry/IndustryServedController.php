<?php

namespace App\Http\Controllers\Admin\Industry;

use App\Http\Controllers\Controller;
use App\Models\IndustryServed;
use Illuminate\Http\Request;
use Validator;

class IndustryServedController extends Controller
{
    public function create(){
        return view('admin.industry-served.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'description' => 'required',
        ]);

        if($validator->passes()){
            $industry = new IndustryServed;
            $industry->title = $request->title;
            $industry->description = $request->description;
            $industry->save();

            return response()->json(['status' => true]);
        }else{
            return response()->json(['status' => false , 'errors' => $validator->errors()]);
        }
    }

    public function list(){
        $industry = IndustryServed::all();
        return view('admin.industry-served.list',compact('industry'));
    }

    public function edit($id){
        $industry = IndustryServed::find($id);
        if($industry == null){
            return redirect()->back();
        }
        return view('admin.industry-served.edit',compact('industry'));
    }

    public function update(Request $request,$id){
        $industry = IndustryServed::find($id);
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'description' => 'required',
        ]);

        if($validator->passes()){
            $industry->title = $request->title;
            $industry->description = $request->description;
            $industry->save();

            return response()->json(['status' => true]);
        }else{
            return response()->json(['status' => false , 'errors' => $validator->errors()]);
        }
    }

    public function destroy($id){
        $industry = IndustryServed::find($id);
        if($industry == null){
            return redirect()->back();
        }
        $industry->delete();

        return response()->json(['status' => true]);
    }
}
