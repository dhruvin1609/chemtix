<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use Auth;
use Validator;

class AuthController extends Controller
{
    public function index(){
        return view('admin.login');
    }

    public function authenticate(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->passes()){
            $credentials = $request->only('email', 'password');
            if(Auth::attempt($credentials)){
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->back()->withErrors('Invalid Credentials');
            }
        }else{
            return redirect()->route('admin.login')
            ->withErrors($validator)->withInput($request->only('email'));
        }
    }

    public function dashboard(){
        $all = Enquiry::count();
        $processing = Enquiry::where('status','processing')->count();
        $quotation = Enquiry::where('status','quotation')->count();
        $closed = Enquiry::where('status','closed')->count();
        $data = compact('all','processing','quotation','closed');
        return view('admin.dashboard.dashboard',$data);
    }

    public function logout(){
       Auth::logout();

       return redirect()->route('admin.login');
    }
}
