<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Imports\ProductImport;
use App\Models\ProductCategory;
use App\Models\Products;
use App\Rules\UniqueProduct;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Validator;

class ProductController extends Controller
{
    public function create(){
        
        $category = ProductCategory::all();
        return view('admin.products.create',compact('category'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'title' => [
                'required',
                new UniqueProduct($request->title, $request->category_id, $request->cas_number),
            ],
            'cas_number' => 'required',
            'category_id' => 'required',
        ]);

        if($validator->passes()){
            $product = new Products;
            $product->title = $request->title;
            if($request->hasFile('image')){
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = 'product_'.time().'.'.$extension;
                $file->move(public_path('images/product'), $filename);
                $product->image=$filename;
            }
            $product->description = $request->description;
            $product->product_code = $request->product_code;
            $product->chemical_name = $request->chemical_name;
            $product->synonyme = $request->synonyme;
            $product->cas_number = $request->cas_number;
            $product->hsn_code = $request->hsn_code;
            $product->molecular_formula = $request->molecular_formula;
            $product->molecular_weight = $request->molecular_weight;
            $product->specification = $request->specification;
            $product->packing = $request->packing;
            $product->availability = $request->availability;
            $product->category_id = $request->category_id;
            $product->slug = \Str::slug($request->title);
            $product->save();

            return response()->json(['status' => true]);
        }
        else{
            return response()->json(['status' => false , 'errors' => $validator->errors()]);
        }
    }

    public function list(Request $request){
        $productQuery = Products::with('getCategory')->orderBy('id','DESC');
    
        if($request->has('keyword')) {
            $keyword = $request->input('keyword');
            $productQuery->where('cas_number', 'like', '%' . $keyword . '%');
        }
    
        $product = $productQuery->paginate(10);
        return view('admin.products.list', compact('product'));
    }
    

    public function edit($id){
        $product = Products::find($id);
        $category = ProductCategory::all();
        if($product == null){
            return redirect()->back();
        }
        return view('admin.products.edit',compact('product','category'));
    }

    public function update(Request $request,$id){
        $product = Products::find($id);
        $validator = Validator::make($request->all(),[
            'title' => [
                'required',
                new UniqueProduct($request->title, $request->category_id, $request->cas_number,$id),
            ],
            'cas_number' => 'required',
            'category_id' => 'required',
        ]);

        if($validator->passes()){
            $product->title = $request->title;
            if($request->hasFile('image')){
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = 'product_'.time().'.'.$extension;
                $file->move(public_path('images/product'), $filename);
                if($product->image != '' || $product->image != null){
                    unlink(public_path('images/product/'.$product->image));
                }
                $product->image=$filename;
            }
            $product->description = $request->description;
            $product->product_code = $request->product_code;
            $product->chemical_name = $request->chemical_name;
            $product->synonyme = $request->synonyme;
            $product->cas_number = $request->cas_number;
            $product->hsn_code = $request->hsn_code;
            $product->molecular_formula = $request->molecular_formula;
            $product->molecular_weight = $request->molecular_weight;
            $product->specification = $request->specification;
            $product->packing = $request->packing;
            $product->availability = $request->availability;
            $product->category_id = $request->category_id;
            $product->slug = \Str::slug($request->title);
            $product->save();

            return response()->json(['status' => true]);
        }
        else{
            return response()->json(['status' => false , 'errors' => $validator->errors()]);
        }
    }

    public function destroy($id){
        $product = Products::find($id);
        if($product == null){
            return response()->json(['status' => false]);
        }
        if(file_exists(public_path('images/product/'.$product->image))){
            unlink(public_path('images/product/'.$product->image));
        }
        $product->delete();

        return response()->json(['status' => true]);
    }

    public function product_csv_import(Request $request){
        $validator = Validator::make($request->all(),[
            'file' => 'required',
        ]);
        $file = $request->file('file');
        if($validator->passes()){
            // Excel::import(new SupplierImport, $request->file('file')->store('temp'));
            Excel::import(new ProductImport, $file, null, \Maatwebsite\Excel\Excel::CSV);

            return response()->json(['status' => true]);
        }else{
            return response()->json(['status' => false , 'errors' => $validator->errors()]);
        }
    }

    public function downloadTemplate()
    {
        $filePath = public_path('csv/product_csv.csv');
        
        if (!file_exists($filePath)) {
            abort(404, 'File not found');
        }

        return Response::download($filePath, 'product_csv.csv', [
            'Content-Type' => 'application/csv',
        ]);
    }
}
