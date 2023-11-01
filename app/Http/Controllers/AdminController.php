<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{

    public function login(Request $request){

        if($request->isMethod('post'))
        {
            $data = $request->all();
            if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']]))
            {
                return redirect('admin/dashboard');
            }
            else{
                return redirect()->back()->with('message','Invalid Credential');
            }
        }
        return view('admin.login');
    }


    public function logout(){

        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }

    public function index(){
        return view('admin.dashboard');
    }
}
