<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('admin.user.login',[
            'title' => 'Đăng nhập hệ thống'
        ]);
    }
    public function postLogin(Request $request)
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
    public function logout(Request $request){
        Auth::logout();
        return redirect('user/login');
    }
    public function create(){
        return view('admin.user.add-user');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            're-password' => 'required|same:password',
        ],[
            're-password' => 're-password is wrong',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $n = $user->save();
        if($n>0){
            return redirect('user/create')->with('alert','Thêm thành công');
        }else{
            return redirect('user/create')->with('alert','Thêm không thành công');
        }
    }
}
