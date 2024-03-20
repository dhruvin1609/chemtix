<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\ProductCategory;
use App\Models\Products;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $products = Products::latest()->take(4)->get();
        return view('frontend.pages.index',compact('products'));
    }

    public function about(){
        return view('frontend.pages.about');
    }

    public function industry(){
        return view('frontend.pages.industry');
    }
    public function product(){
        $products = Products::all();
        return view('frontend.pages.product',compact('products'));
    }
    public function contact(){
        $products = Products::select('id','cas_number','title')->get();
        return view('frontend.pages.contact',compact('products'));
    }

    public function all_category(){
        $categories = ProductCategory::select('id','name','slug')->get();
        return view('frontend.pages.all-category',compact('categories'));
    }

    public function category_product($slug){
        $category = ProductCategory::where('slug',$slug)->first();
        $products = Products::where('category_id',$category->id)->get();
        return view('frontend.pages.category-product',compact('products','category'));
    }

    public function contactSubmit(Request $request){
       
            $contact = new Enquiry();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->product_id = $request->product;
            $contact->country = 'India';
            $contact->company_name = $request->company_name;
            $contact->note = $request->note;
            $contact->status = 'pending';
            $contact->save();
            if($contact->save()){
                return response()->json(['status'=> true]);
            }else{
                return response()->json(['status' => false]);
            }
       
        
    }
}
