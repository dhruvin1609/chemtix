<?php

namespace App\Http\Controllers\Admin\slider;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class SliderController extends Controller
{
    public function create(){
        return view('admin.slider.create');
    }

    public function store(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,webp',
        ]);

        if($validator->passes()){
            $slider = new Slider;
            $slider->title = $request->title;
            $slider->description = $request->description;
            $image = $request->image;
            if($request->hasFile('image')){
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = 'slider_'.time().'.'.$extension;
                $file->move('images/slider', $filename);
                $slider->image=$filename;
            }
       
            $slider->save();

            return response()->json(['status' => true]);
        }
        else{
            return response()->json(['status' => false , 'errors' => $validator->errors()]);
        }
    }

    public function list(){
        $slider = Slider::all();
        return view('admin.slider.list',compact('slider'));
    }

    public function edit($id){
        $slider = Slider::find($id);
      
        if(empty($slider)){
            return redirect()->back();
        }

        return view('admin.slider.edit',compact('slider'));
    }

    public function update(Request $request,$id){
        $slider = Slider::find($id);
        if(empty($slider)){
            return response()->json(['status' => false,'message' => 'Slider Not Found']);
        }

        $validator = Validator::make($request->all(),[
            'title'=> 'required',
            'description' => 'required',
            // 'image' => 'required',
        ]);

        if($validator->passes()){
            $slider->title = $request->title;
            $slider->description = $request->description;

            if(!empty($request->image)){
                if($request->hasFile('image')){
                    $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = 'slider_'.time().'.'.$extension;
                    $file->move('images/slider', $filename);
                    unlink('images/slider/'.$slider->image);
                    
                    $slider->image=$filename;
                }
            }
            $slider->save();

            return response()->json(['status' => true]);
        }
    }

    public function destroy(Request $request,$id){
        $slider = Slider::find($id);
        if($slider == null){
            return redirect()->back();
        }
        unlink('images/slider/'.$slider->image);
        $slider->delete();

        return response()->json(['status' => true , 'message' => 'Slider Deleted successfully']);

    }
}
