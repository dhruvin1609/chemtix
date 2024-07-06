<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use App\Imports\CustomerImport;
use App\Models\Customer;
use App\Models\SupplierContactDetails;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Validator;

class CustomerController extends Controller
{
    public function list(){
        $customer = Customer::paginate(10);
        return view('admin.customer.list',compact('customer'));
    }

    public function create(){
        return view('admin.customer.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'customer_name' => 'required',
            'customer_type' => 'required',
            'customer_city'=> 'required',
            'customer_address'=> 'required',
            'customer_state'=> 'required',
            'customer_country'=> 'required',
            'customer_phone'=> 'required',
            'customer_email' => 'required|email',
            'customer_gst_no' => 'required',
            'customer_pan_no' => 'required',
            'customer_msme' => 'required',
            'customer_drug_lic_no' => 'required',
        ]);

        if($validator->passes()){
            $customer = new Customer;
            $customer->customer_name = $request->customer_name;
            $customer->customer_type = $request->customer_type;
            $customer->customer_city = $request->customer_city;
            $customer->customer_address = $request->customer_address;
            $customer->customer_state = $request->customer_state;
            $customer->customer_country = $request->customer_country;
            $customer->customer_phone = $request->customer_phone;
            $customer->customer_phone_alter = $request->customer_phone_alter;
            $customer->customer_fax = $request->customer_fax;
            $customer->customer_email = $request->customer_email;
            $customer->customer_website = $request->customer_website;
            $customer->customer_gst_no = $request->customer_gst_no;
            $customer->customer_pan_no = $request->customer_pan_no;
            $customer->customer_msme = $request->customer_msme;
            $customer->customer_drug_lic_no = $request->customer_drug_lic_no;
            $customer->customer_drug_lic_no_2 = $request->customer_drug_lic_no_2;

            $customer->save();

            if(isset($request->contact_details)){
                foreach($request->contact_details as $key => $v){
                    $contact = new SupplierContactDetails();
                    $contact->customer_id = $customer->id;
                    $contact->contact_name = $v['contact_name'];
                    $contact->contact_phone = $v['contact_phone'];
                    $contact->contact_designation = $v['contact_designation'];
                    $contact->contact_email = $v['contact_email'];
                    $contact->save();
                }
            }

            return response()->json(['status' => true]);

        }else{
            return response()->json(['status' => false , 'errors' => $validator->errors()]);
        }
    }

    public function edit($id){
        $customer = Customer::find($id);
        if($customer == null){
            return redirect()->back();
        }
        return view('admin.customer.edit',compact('customer'));
    }

    public function update(Request $request,$id){
        $customer = Customer::find($id);
        if($customer == null){
            return redirect()->back();
        }
        $validator = Validator::make($request->all(),[
            'customer_name' => 'required',
            'customer_type' => 'required',
            'customer_city'=> 'required',
            'customer_address'=> 'required',
            'customer_state'=> 'required',
            'customer_country'=> 'required',
            'customer_phone'=> 'required',
            'customer_email' => 'required|email',
            'contact_name'=> 'required',
            'contact_phone'=> 'required',
            'contact_designation'=> 'required',
            'contact_email'=> 'required|email',
            'customer_gst_no' => 'required',
            'customer_pan_no' => 'required',
            'customer_msme' => 'required',
            'customer_drug_lic_no' => 'required',
        ]);

        if($validator->passes()){
            $customer->customer_name = $request->customer_name;
            $customer->customer_type = $request->customer_type;
            $customer->customer_city = $request->customer_city;
            $customer->customer_address = $request->customer_address;
            $customer->customer_state = $request->customer_state;
            $customer->customer_country = $request->customer_country;
            $customer->customer_phone = $request->customer_phone;
            $customer->customer_phone_alter = $request->customer_phone_alter;
            $customer->customer_fax = $request->customer_fax;
            $customer->customer_email = $request->customer_email;
            $customer->customer_website = $request->customer_website;
            $customer->contact_name = $request->contact_name;
            $customer->contact_phone = $request->contact_phone;
            $customer->contact_designation = $request->contact_designation;
            $customer->contact_email = $request->contact_email;
            $customer->customer_gst_no = $request->customer_gst_no;
            $customer->customer_pan_no = $request->customer_pan_no;
            $customer->customer_msme = $request->customer_msme;
            $customer->customer_drug_lic_no = $request->customer_drug_lic_no;

            $customer->save();

            return response()->json(['status' => true]);

        }else{
            return response()->json(['status' => false , 'errors' => $validator->errors()]);
        }
    }

    public function delete($id){
        $customer = Customer::find($id);
        if($customer == null){
            return redirect()->back();
        }
        $customer->delete();

        return response()->json(['status' => true]);
    }

    public function customer_import(Request $request){
        $validator = Validator::make($request->all(),[
            'file' => 'required',
        ]);
        $file = $request->file('file');
        if($validator->passes()){
            // Excel::import(new SupplierImport, $request->file('file')->store('temp'));
            Excel::import(new CustomerImport, $file, null, \Maatwebsite\Excel\Excel::CSV);

            return response()->json(['status' => true]);
        }else{
            return response()->json(['status' => false , 'errors' => $validator->errors()]);
        }
    }

    public function downloadTemplate()
    {
        $filePath = public_path('csv/customer_csv.csv');
        if (!file_exists($filePath)) {
            abort(404, 'File not found');
        }

        return Response::download($filePath, 'customer_csv.csv', [
            'Content-Type' => 'application/csv',
        ]);
    }
}
