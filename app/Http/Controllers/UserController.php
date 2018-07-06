<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;


class UserController extends Controller
{
    //
    public function getlogin(){
    	return view('login');
    }

    public function postlogin(Request $rq){
    	$this->validate($rq,[
    		'name' => 'required',
    		'password' => 'required'
    		],[
    		'name.required' => 'Bạn chưa nhập Username',
    		'password.required' => 'Bạn chưa nhập Password'
    		]);
    	if(Auth::attempt(['name'=>$rq->name,'password'=>$rq->password])) {
    		return redirect('trangchu');
    	}
    	else {
    		return redirect('login')->with('thongbao','Đăng nhập thất bại');
    	}
    }

    public function logout(){
    	Auth::logout();
    	return redirect('login');
    }
}
