<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('admin.user.login',[
            'title' => 'Đăng nhập hệ thống'
        ]);
    }
    public function store(Request $request)
   {
       $this->validate($request,[
           'email' =>'required|email',
           'password' => 'required'
       ]);
        $email = $request->input('email');
        $password = $request->input('password');
        if(Auth::attempt([
            'email' => $email,
            'password' =>  $password
        ])){
            return redirect()->route('admin');
        }else{
            return redirect()->back();
        }
   }
}
