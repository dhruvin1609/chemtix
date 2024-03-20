<?php

namespace App\Http\Controllers\Admin\Home_description;

use App\Http\Controllers\Controller;
use App\Models\HomeDescription;
use Illuminate\Http\Request;
use Validator;

class DescriptionController extends Controller
{
    public function index(){
        return view('admin.home-description.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'description' => 'required',
            'title' => 'required',
            'image' => 'required',
        ]);

        if($validator->passes()){
            $description = new HomeDescription;
            $description->title = $request->title;
            if($request->hasFile('image')){
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = 'home_desc_'.time().'.'.$extension;
                $file->move('images/home_desc', $filename);
                $description->image=$filename;
            }
            $description->description = $request->description;
            $description->save();

            return response()->json(['status' => true]);
        }
        else{
            return response()->json(['status' => false,'errors' => $validator->errors()]);
        }
    }

    public function list(){
        $description = HomeDescription::all();

        return view('admin.home-description.list',compact('description'));
    }

    public function edit($id){
        $data = HomeDescription::find($id);

        return view('admin.home-description.edit',compact('data'));
    }

    public function update(Request $request,$id){
        $description = HomeDescription::find($id);
        $validator = Validator::make($request->all(),[
            'description' => 'required',
        ]);

        if($validator->passes()){
            $description->description = $request->description;
            $description->title = $request->title;
            if($request->hasFile('image')){
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = 'home_desc_'.time().'.'.$extension;
                $file->move('images/home_desc', $filename);
                unlink('images/home_desc/'.$description->image);
                $description->image=$filename;
            }
            $description->save();

            return response()->json(['status' => true]);
        }
        else{
            return response()->json(['status' => false,'errors' => $validator->errors()]);
        }
    }
}
