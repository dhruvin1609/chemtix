<?php

namespace App\Http\Controllers\Admin\Enquiry;

use App\Exports\EnquiryExport;
use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\Products;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Validator;

class EnquiryController extends Controller
{
    

    public function create(){
        $product = Products::all();
        return view('admin.enquiry.create',compact('product'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'phone'=>'required',
            'email' => 'required',
        ]);

        if($validator->passes()){
            $product_id = $request->product_id;
            // dd($product_id);
            $cas_number = Products::where('id',$product_id)->select('cas_number')->first();
            // dd($cas_number->cas_number);

            $enquiry = new Enquiry;
            $enquiry->name = $request->name;
            $enquiry->phone = $request->phone;
            $enquiry->email = $request->email;
            $enquiry->product_id = $request->product_id;
            $enquiry->cas_number = $cas_number->cas_number;
            $enquiry->country = $request->country;
            $enquiry->company_name = $request->company_name;
            $enquiry->note = $request->note;
            $enquiry->status = $request->status;
            $enquiry->save();

            return response()->json(['status' => true]);
        }else{
            return response()->json(['status' => false , 'errors' => $validator->errors()]);
        }
    }

    public function change_status(Request $request,$id){
        $enquiry = Enquiry::find($id);
        if($enquiry == null){
            return redirect()->back();
        }
        $enquiry->status = $request->change_status;
        $enquiry->save();

        return response()->json(['status' => true]);
    }

    public function addRemark(Request $request,$id){
        $enquiry = Enquiry::find($id);
        if($enquiry == null){
            return response()->json(['status' => false]);
        }
        $enquiry->remarks = $request->remarks;
        $enquiry->save();

        return redirect()->back();
    }
    public function index($status = null)
    {
        $enquiriesQuery = Enquiry::with('getproduct');
    
        if ($status !== null) {
            $enquiriesQuery->where('status', $status);
        }
    
        $enquiry = $enquiriesQuery->paginate(10);
    
        return view('admin.enquiry.list', compact('enquiry'));
    }

    public function fileExport() 
    {
        return Excel::download(new EnquiryExport, 'enquiry-collection.xlsx');
    }    
    
}
