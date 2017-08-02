<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;

class LoginController extends Controller
{
    public function index() {
    	return view('admin.login');
    }

    public function submit( Request $request){
    	Validator::make($request->all(),[
    		'email' => 'required',
    		'password' => 'required'
    	],[
    		'email.required' => 'Please enter username',
    		'password.required' => 'Please enter password'
    	])->validate();

    	if(Auth::guard('admin')->attempt([
   			'email' => $request->email,
   			'password' => $request->password
		])) {
   			return redirect('/dashboard');
		}
		else {
			$request->session()->flash("login-status", "Username Or Password Didn't Matched");
    		return view('admin.login');
		}
    }

    public function dashboard(){
    	return view('dashboard.dashboard');
    }

    public function logout(){
    	Auth::guard('admin')->logout();
    	return redirect('/admin');
    }
}
