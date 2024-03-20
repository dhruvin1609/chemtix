<?php

namespace App\Http\Controllers\Admin\Supplier;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SupplierImport;

class SupplierController extends Controller
{
    public function create(){
        return view('admin.supplier.create');
    }

    public function list(){
        $supplier = Supplier::all();
        return view('admin.supplier.list',compact('supplier'));
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'supplier_name' => 'required',
            'supplier_type' => 'required',
            'supplier_id' => 'required|unique:supplier',
            'supplier_city'=> 'required',
            'supplier_address'=> 'required',
            'supplier_state'=> 'required',
            'supplier_country'=> 'required',
            'supplier_phone'=> 'required',
            'supplier_email' => 'required|email',
            'supplier_website' => 'url',
            'contact_name'=> 'required',
            'contact_phone'=> 'required',
            'contact_designation'=> 'required',
            'contact_email'=> 'required|email',
            'supplier_gst_no' => 'required',
            'supplier_pan_no' => 'required',
            'supplier_msme' => 'required',
            'supplier_drug_lic_no' => 'required',
        ]);

        if($validator->passes()){
            $supplier = new Supplier;
            $supplier->supplier_name = $request->supplier_name;
            $supplier->supplier_type = $request->supplier_type;
            $supplier->supplier_id = $request->supplier_id;
            $supplier->supplier_city = $request->supplier_city;
            $supplier->supplier_address = $request->supplier_address;
            $supplier->supplier_state = $request->supplier_state;
            $supplier->supplier_country = $request->supplier_country;
            $supplier->supplier_phone = $request->supplier_phone;
            $supplier->supplier_phone_alter = $request->supplier_phone_alter;
            $supplier->supplier_fax = $request->supplier_fax;
            $supplier->supplier_email = $request->supplier_email;
            $supplier->supplier_website = $request->supplier_website;
            $supplier->contact_name = $request->contact_name;
            $supplier->contact_phone = $request->contact_phone;
            $supplier->contact_designation = $request->contact_designation;
            $supplier->contact_email = $request->contact_email;
            $supplier->supplier_gst_no = $request->supplier_gst_no;
            $supplier->supplier_pan_no = $request->supplier_pan_no;
            $supplier->supplier_msme = $request->supplier_msme;
            $supplier->supplier_drug_lic_no = $request->supplier_drug_lic_no;

            $supplier->save();

            return response()->json(['status' => true]);

        }else{
            return response()->json(['status' => false , 'errors' => $validator->errors()]);
        }
    }

    public function edit($id){
        $supplier = Supplier::find($id);
        if($supplier == null){
            return redirect()->back();
        }
        return view('admin.supplier.edit',compact('supplier'));
        
    }

    public function update(Request $request,$id){
        $supplier = Supplier::find($id);
        if($supplier == null){
            return redirect()->back();
        }
        $validator = Validator::make($request->all(),[
            'supplier_name' => 'required',
            'supplier_type' => 'required',
            'supplier_id' => 'required|unique:supplier,supplier_id,'.$supplier->id.',id',
            'supplier_city'=> 'required',
            'supplier_address'=> 'required',
            'supplier_state'=> 'required',
            'supplier_country'=> 'required',
            'supplier_phone'=> 'required',
            'supplier_email' => 'required|email',
            'supplier_website' => 'url',
            'contact_name'=> 'required',
            'contact_phone'=> 'required',
            'contact_designation'=> 'required',
            'contact_email'=> 'required|email',
            'supplier_gst_no' => 'required',
            'supplier_pan_no' => 'required',
            'supplier_msme' => 'required',
            'supplier_drug_lic_no' => 'required',
        ]);

        if($validator->passes()){
            $supplier->supplier_name = $request->supplier_name;
            $supplier->supplier_type = $request->supplier_type;
            $supplier->supplier_id = $request->supplier_id;
            $supplier->supplier_city = $request->supplier_city;
            $supplier->supplier_address = $request->supplier_address;
            $supplier->supplier_state = $request->supplier_state;
            $supplier->supplier_country = $request->supplier_country;
            $supplier->supplier_phone = $request->supplier_phone;
            $supplier->supplier_phone_alter = $request->supplier_phone_alter;
            $supplier->supplier_fax = $request->supplier_fax;
            $supplier->supplier_email = $request->supplier_email;
            $supplier->supplier_website = $request->supplier_website;
            $supplier->contact_name = $request->contact_name;
            $supplier->contact_phone = $request->contact_phone;
            $supplier->contact_designation = $request->contact_designation;
            $supplier->contact_email = $request->contact_email;
            $supplier->supplier_gst_no = $request->supplier_gst_no;
            $supplier->supplier_pan_no = $request->supplier_pan_no;
            $supplier->supplier_msme = $request->supplier_msme;
            $supplier->supplier_drug_lic_no = $request->supplier_drug_lic_no;

            $supplier->save();

            return response()->json(['status' => true]);

        }else{
            return response()->json(['status' => false , 'errors' => $validator->errors()]);
        }
    }

    public function delete($id){
        $supplier = Supplier::find($id);
        if($supplier == null){
            return redirect()->back();
        }
        $supplier->delete();

        return response()->json(['status' => true]);
    }

    public function csv_import(Request $request){
        $validator = Validator::make($request->all(),[
            'file' => 'required',
        ]);
        $file = $request->file('file');
        if($validator->passes()){
            // Excel::import(new SupplierImport, $request->file('file')->store('temp'));
            Excel::import(new SupplierImport, $file, null, \Maatwebsite\Excel\Excel::CSV);

            return response()->json(['status' => true]);
        }else{
            return response()->json(['status' => false , 'errors' => $validator->errors()]);
        }
    }
}
