<?php

namespace App\Http\Controllers\Admin\Industry;

use App\Http\Controllers\Controller;
use App\Models\IndustryDescription;
use Illuminate\Http\Request;
use Validator;

class IndustryController extends Controller
{
    public function create(){
        $industry = IndustryDescription::first();
        return view('admin.industry-description.create',compact('industry'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'description' => 'required',
        ]);
        $data = IndustryDescription::first();
        // dd($request->all());
        if($validator->passes()){
            if($data == null){
                $industry = new IndustryDescription;
                $industry->title = $request->title;
                $industry->description = $request->description;
                $industry->save();
               

                return response()->json(['status' => true]);
            }else{
                
                $data->title = $request->title;
                $data->description = $request->description;
                $data->save();
                return response()->json(['status' => true]);
            }
        }else{
            return response()->json(['status' => false , 'errors' => $validator->errors()]);
        }
    }
}
