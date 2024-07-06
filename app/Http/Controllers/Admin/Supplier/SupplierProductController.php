<?php

namespace App\Http\Controllers\Admin\Supplier;

use App\Http\Controllers\Controller;
use App\Imports\SupplierProductImport;
use App\Models\Products;
use App\Models\Supplier;
use App\Models\SupplierProduct;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Validator;

class SupplierProductController extends Controller
{
    public function list(){
        $supplier_product = SupplierProduct::with('getSupplierName','getproduct')->get();
        return view('admin.supplier_product.list',compact('supplier_product'));
    }

    public function create(){
        $supplier = Supplier::all();
        $product = Products::all();
        return view('admin.supplier_product.create',compact('supplier','product'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'product_id' => 'required',
            'cas_number' => 'required',
            'supplier_id' => 'required',
        ]);

        if($validator->passes()){
            $supplier = new SupplierProduct;
            $supplier->product_id = $request->product_id;
            $supplier->cas_number = $request->cas_number;
            $supplier->supplier_id = $request->supplier_id;
            $supplier->save();

            return response()->json(['status' => true]);
        }else{
            return response()->json(['status' => false , 'errors' => $validator->errors()]);
        }
    }

    public function getCasNumber(Request $request)
    {
        $productId = $request->input('product_id');
        $product = Products::find($productId);

        if($product) {
            return response()->json(['casNumber' => $product->cas_number]);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }

    public function edit($id){
        $supplier = Supplier::all();
        $product = Products::all();
        $supplier_product = SupplierProduct::find($id);
        if($supplier_product == null){
            return redirect()->back();
        }
        // dd($supplier);
        return view('admin.supplier_product.edit',compact('supplier_product','supplier','product'));
    }

    public function update(Request $request,$id){
        $supplier_product = SupplierProduct::find($id);
        if($supplier_product == null){
            return redirect()->back();
        }
        $validator = Validator::make($request->all(),[
            'product_id' => 'required',
            'cas_number' => 'required',
            'supplier_id' => 'required',
        ]);

        if($validator->passes()){
            $supplier_product->product_id = $request->product_id;
            $supplier_product->cas_number = $request->cas_number;
            $supplier_product->supplier_id = $request->supplier_id;
            $supplier_product->save();

            return response()->json(['status' => true]);
        }else{
            return response()->json(['status' => false , 'errors' => $validator->errors()]);
        }
    }

    public function delete($id){
        $supplier_product = SupplierProduct::find($id);
        if($supplier_product == null){
            return redirect()->back();
        }
        $supplier_product->delete();

        return response()->json(['status' => true]);
    }

    public function csv_import(Request $request){
        $validator = Validator::make($request->all(),[
            'file' => 'required',
        ]);
        $file = $request->file('file');
        if($validator->passes()){
            // Excel::import(new SupplierImport, $request->file('file')->store('temp'));
            Excel::import(new SupplierProductImport, $file, null, \Maatwebsite\Excel\Excel::CSV);

            return response()->json(['status' => true]);
        }else{
            return response()->json(['status' => false , 'errors' => $validator->errors()]);
        }
    }

    public function search_supplier(Request $request){
        $data = Supplier::all();
       return view('admin.search_supplier.index',compact('data'));
    }

    public function getProductData(Request $request,$id){
        
        try{
            $data = SupplierProduct::where('supplier_id',$id)->pluck('product_id')->toArray();
            $product = Products::whereIn('id',$data)->with('getCategory')->get();
            $data = view('admin.search_supplier.index',compact('product'))->render();
            return response()->json(['status' => true ,'data'=>$data]);

        }
        catch(Exception $e){
            return response()->json(['status' => false]);
        }
    }
}
