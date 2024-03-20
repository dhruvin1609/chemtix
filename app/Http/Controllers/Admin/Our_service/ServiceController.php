<?php

namespace App\Http\Controllers\Admin\Our_service;

use App\Http\Controllers\Controller;
use App\Models\OurService;
use Illuminate\Http\Request;
use Validator;

class ServiceController extends Controller
{
    public function create(){
        return view('admin.our_service.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,webp',
        ]);

        if($validator->passes()){
            $service = new OurService;
            $service->title = $request->title;
            if($request->hasFile('image')){
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = 'our_service_'.time().'.'.$extension;
                $file->move('images/our_service/', $filename);
                $service->image=$filename;
            }
            $service->save();

            return response()->json(['status' => true , 'message' => 'Created successfully']);
        }else{
            return response()->json(['status' => false , 'errors' => $validator->errors()]);
        }
    }

    public function list(){
        $service = OurService::all();
        return view('admin.our_service.list',compact('service'));
    }

    public function edit($id){
        $service = OurService::find($id);

        return view('admin.our_service.edit',compact('service'));
    }

    public function update(Request $request,$id){
        $service = OurService::find($id);
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            // 'image' => 'required|mimes:jpg,jpeg,png,webp',
        ]);

        if($validator->passes()){
            
            $service->title = $request->title;
            if($request->hasFile('image')){
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = 'our_service_'.time().'.'.$extension;
                $file->move('images/our_service/', $filename);
                unlink('images/our_service/'.$service->image);
                $service->image=$filename;
            }
            $service->save();

            return response()->json(['status' => true , 'message' => 'Created successfully']);
        }else{
            return response()->json(['status' => false , 'errors' => $validator->errors()]);
        }
    }

    public function destroy(Request $request,$id){
        $service = OurService::find($id);
        if($service == null){
            return redirect()->back();
        }
        unlink('images/our_service/'.$service->image);
        $service->delete();

        return response()->json(['status' => true , 'message' => 'Slider Deleted successfully']);

    }
}
