<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Validator;

class AboutUsController extends Controller
{
    public function create(){
        $about = AboutUs::first();
        return view('admin.about_us.create',compact('about'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'description' => 'required',
        ]);
        $data = AboutUs::first();
        // dd($request->all());
        if($validator->passes()){
            if($data == null){
                $about = new AboutUs;
                $about->title = $request->title;
                $about->description = $request->description;
                if($request->hasFile('image')){
                    $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = 'about_us_'.time().'.'.$extension;
                    $file->move('images/about_us', $filename);
                    $about->image=$filename;
                }
                $about->company_philosofy = $request->company_philosofy;
                $about->our_values = $request->our_values;
                $about->quality = $request->quality;
                $about->how_we_work = $request->how_we_work;
                $about->save();
               

                return response()->json(['status' => true]);
            }else{
                
                $data->title = $request->title;
                $data->description = $request->description;
                
                if($request->hasFile('image')){
                    $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = 'about_us_'.time().'.'.$extension;
                    $file->move('images/about_us_', $filename);
                    unlink('images/about_us/'.$data->image);
                    
                    $data->image=$filename;
                }
                $data->company_philosofy = $request->company_philosofy;
                $data->our_values = $request->our_values;
                $data->quality = $request->quality;
                $data->how_we_work = $request->how_we_work;
                $data->save();
                return response()->json(['status' => true , 'message' => 'updated']);
            }
        }else{
            return response()->json(['status' => false , 'errors' => $validator->errors()]);
        }
    }
}
