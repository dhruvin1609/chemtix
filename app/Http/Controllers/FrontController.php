<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\ProductCategory;
use App\Models\Products;
use Illuminate\Http\Request;
use Validator;

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
        $ip = $request->ip();
        $data = geoip( $ip );
        $country = $data['country'];
            $product_cas_number = Products::where('id',$request->product)->first();
            $validator = Validator::make($request->all(),[
                'name' => 'required',
                'email' => 'required|email',
                'phone_number' => 'required',
                'company_name' => 'required',
                'qty_value'=>'required',
                'qty_type'=>'required',
                'product' => 'required',
            ]);
            if($validator->passes()){
                $contact = new Enquiry();
                $contact->name = $request->name;
                $contact->email = $request->email;
                $contact->phone = $request->phone_number;
                $contact->product_id = $request->product;
                $contact->cas_number = $request->cas_number;
                $contact->country = $country;
                $contact->company_name = $request->company_name;
                $contact->qty = $request->qty_value .''.$request->qty_type;
                $contact->note = $request->note;
                $contact->status = 'pending';
                $contact->save();
                if($contact->save()){
                    return redirect()->back()->with('success','Thanks for enquiry');
                }else{
                    return redirect()->back()->with('error','Something went wrong');
                }  
            }else{
                return redirect()->back()->withErrors($validator)->withInput();;
            }

            
    }

    public function searchProduct(Request $request){
        $keyword = $request->search;
        $data = Products::where('title','like','%'.$keyword.'%')->orWhere('cas_number','like','%'.$keyword.'%')->get();
        return view('frontend.pages.search_product_home',compact('data'));
    }
}
