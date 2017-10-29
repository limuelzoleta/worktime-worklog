<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    //
    public function __construct(){
    	$this->middleware('guest', ['except' => ['userLogout']]);
    }
    public function showLogin(){
    	return view('login');
    }

    public function processLogin(Request $request){
    	$this->validate($request, [
    		'username' => 'required',
    		'password' => 'required|min:6'
    	]);


    	if(Auth::attempt(['username' => $request->username, 'password'=>$request->password, 'is_admin' => 1], $request->remember)){
    		return redirect()->intended(route('admin_dashboard'));
    	}
    	if(Auth::attempt(['username' => $request->username, 'password'=>$request->password, 'is_admin' => 0], $request->remember)){
    		return redirect()->intended(route('users_home'));
    	}

    	return redirect()->back()->withInput($request->only('username', 'remember'));
    }

    public function userLogout(Request $request){
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect(route('login'));
    }
    protected function guard()
    {
        return Auth::guard();
    }
}
