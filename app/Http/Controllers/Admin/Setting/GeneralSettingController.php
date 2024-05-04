<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\CustomerProduct;
use App\Models\GeneralSetting;
use App\Models\Products;
use App\Models\SupplierProduct;
use Illuminate\Http\Request;
use Validator;

class GeneralSettingController extends Controller
{
    public function create(){
        $setting = GeneralSetting::first();
        return view('admin.general_setting.create',compact('setting'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'company_name' => 'required',
            'company_email' => 'required',
            'address' => 'required',
            'facebook' => 'url',
            'instagram' => 'url',
            'contact_no' => 'required',
        ]);
        $data = GeneralSetting::first();
        if($validator->passes()){
            if($data == null){
                $setting = new GeneralSetting;
                $setting->company_name = $request->company_name;
                $setting->company_email = $request->company_email;
                $setting->address = $request->address;
                $setting->contact_no = $request->contact_no;
                $setting->contact_no_alt = $request->contact_no_alt;
                $setting->google_iframe = $request->google_iframe;
                $setting->facebook = $request->facebook;
                $setting->instagram = $request->instagram;
                if($request->hasFile('primary_logo')){
                    $file = $request->file('primary_logo');
                    $extension = $file->getClientOriginalExtension();
                    $filename = 'setting_primary_logo_'.time().'.'.$extension;
                    $file->move(public_path('images/setting'), $filename);
                    $setting->primary_logo=$filename;
                }
                if($request->hasFile('favicon_icon')){
                    $file = $request->file('favicon_icon');
                    $extension = $file->getClientOriginalExtension();
                    $filename = 'setting_favicon_icon_'.time().'.'.$extension;
                    $file->move(public_path('images/setting'),$filename);
                    $setting->favicon_icon=$filename;
                }
                $setting->save();
               

                return response()->json(['status' => true]);
                
            }else{
                
                $data->company_name = $request->company_name;
                $data->company_email = $request->company_email;
                $data->address = $request->address;
                $data->contact_no = $request->contact_no;
                $data->contact_no_alt = $request->contact_no_alt;
                $data->google_iframe = $request->google_iframe;
                $data->facebook = $request->facebook;
                $data->instagram = $request->instagram;
                if($request->hasFile('primary_logo')){
                    $file = $request->file('primary_logo');
                    $extension = $file->getClientOriginalExtension();
                    $filename = 'setting_primary_logo_'.time().'.'.$extension;
                    $file->move(public_path('images/setting'), $filename);
                    unlink(public_path('images/setting/'.$data->primary_logo));
                    $data->primary_logo=$filename;
                }
                if($request->hasFile('favicon_icon')){
                    $file = $request->file('favicon_icon');
                    $extension = $file->getClientOriginalExtension();
                    $filename = 'setting_favicon_icon_'.time().'.'.$extension;
                    $file->move(public_path('images/setting'), $filename);
                    unlink(public_path('images/setting/'.$data->favicon_icon));
                    $data->favicon_icon=$filename;
                }
                $data->save();
                return response()->json(['status' => true , 'message' => 'updated']);
            }
        }else{
            return response()->json(['status' => false , 'errors' => $validator->errors()]);
        }
    }

    public function searchProduct(Request $request){
        $product_id = $request->keyword;
        $product_data = Products::where('id',$product_id)->with('getCategory')->first();
        return view('admin.products.search_product',compact('product_id','product_data'));
    }

    public function searchSupplierProduct($id){
        $data = SupplierProduct::where('product_id',$id)->with('getSupplierName')->get();
        return view('admin.supplier_product.search_supplier',compact('data'));
    }
    public function searchCustomerProduct($id){
        $data = CustomerProduct::where('product_id',$id)->with('getCustomerName')->get();
        return view('admin.supplier_product.search_customer',compact('data'));
    }
}
