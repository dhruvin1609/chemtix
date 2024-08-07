<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use App\Imports\CustomerProductImport;
use App\Models\Customer;
use App\Models\CustomerProduct;
use App\Models\Products;
use Illuminate\Support\Facades\Response;
use App\Models\Supplier;
use Exception;
use Illuminate\Http\Request;
use Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Rules\UniqueCasNumber;

class CustomerProductController extends Controller
{
    public function list(){
        $customer_product = CustomerProduct::with('getCustomerName','getproduct')->paginate(10);
        return view('admin.customer_product.list',compact('customer_product'));
    }

    public function create(){
        $product = Products::all();
        $customer = Customer::all();
        return view('admin.customer_product.create',compact('product','customer'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'product_id' => 'required',
            'cas_number' => 'required',
            'supplier_id' => 'required',
        ]);

        if($validator->passes()){
            $customer = new CustomerProduct;
            $customer->product_id = $request->product_id;
            $customer->cas_number = $request->cas_number;
            $customer->supplier_id = $request->supplier_id;
            $customer->save();

            return response()->json(['status' => true]);
        }else{
            return response()->json(['status' => false , 'errors' => $validator->errors()]);
        }
    }

    public function edit($id){
        $customer_product = CustomerProduct::find($id);
        $product = Products::all();
        $customer = Customer::all();
        if($customer_product == null){
            return redirect()->back();
        }

        return view('admin.customer_product.edit',compact('customer_product','product','customer'));
    }

    public function update(Request $request,$id){
        $customer = CustomerProduct::find($id);
        if($customer == null){
            return redirect()->back();
        }
        $validator = Validator::make($request->all(),[
            'product_id' => 'required',
            'cas_number' => 'required',
            'supplier_id' => 'required',
        ]);

        if($validator->passes()){
            $customer->product_id = $request->product_id;
            $customer->cas_number = $request->cas_number;
            $customer->supplier_id = $request->supplier_id;
            $customer->save();

            return response()->json(['status' => true]);
        }else{
            return response()->json(['status' => false , 'errors' => $validator->errors()]);
        }
    }

    public function delete($id){
        $customer = CustomerProduct::find($id);
        if($customer == null){
            return redirect()->back();
        }

        $customer->delete();
        return response()->json(['status' => true]);
    }

    public function customer_product_import(Request $request){
        $validator = Validator::make($request->all(),[
            'file' => ['required', new UniqueCasNumber],
            // 'cas_number' => [new UniqueCasNumber],
        ]);
       
        $file = $request->file('file');
        if($validator->passes()){
            // Excel::import(new SupplierImport, $request->file('file')->store('temp'));
            Excel::import(new CustomerProductImport, $file, null, \Maatwebsite\Excel\Excel::CSV);

            return response()->json(['status' => true]);
        }else{
            return response()->json(['status' => false , 'errors' => $validator->errors()]);
        }
    }

    public function search_customer(Request $request){
        $data = Customer::all();
        // dd($data);
       return view('admin.search_customer.index',compact('data'));
    }

    public function getData(Request $request,$id){
        try{
            $data = CustomerProduct::where('supplier_id',$id)->pluck('product_id')->toArray();
            $product = Products::whereIn('id',$data)->with('getCategory')->get();
            $data = view('admin.search_customer.index',compact('product'))->render();
            return response()->json(['status' => true , 'data' => $data]);
        }catch(Exception $e){
            return response()->json(['status' => false]);
        }
       
    }

    public function downloadTemplate()
    {
        $filePath = public_path('csv/customer_product_csv.csv');
        
        if (!file_exists($filePath)) {
            abort(404, 'File not found');
        }

        return Response::download($filePath, 'customer_product_csv.csv', [
            'Content-Type' => 'application/csv',
        ]);
    }
}
