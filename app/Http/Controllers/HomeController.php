<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKhachHangPost;
use App\Models\Banner;
use App\Models\KhachHang;
use App\Models\LoaiSanPham;
use App\Models\SanPham;
use App\Models\Slider;
use App\Models\TinTuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function index(){
        $slider = Slider::where('trang_thai',1)->get();
        $banner = Banner::where('trang_thai',1)->take(3)->get();
        $dsLSP = LoaiSanPham::where('trang_thai',1)->select('id','ten_loai')->get();
        $lsp_sp = [];
        foreach($dsLSP as $lsp){
            $lsp_sp[$lsp->id] = SanPham::where('ma_loai',$lsp->id)->where('trang_thai',1)
            ->where('gioi_tinh',0)->take(8)->get();
        }
        $dsLSP1 = LoaiSanPham::where('trang_thai',1)->where('id','<>',4)->select('id','ten_loai')->get();
        $lsp_sp1 = [];
        foreach($dsLSP1 as $lsp){
            $lsp_sp1[$lsp->id] = SanPham::where('ma_loai',$lsp->id)->where('trang_thai',1)
            ->where('gioi_tinh',1)->take(8)->get();
        }
        $dstt = TinTuc::where('trang_thai',1)->orderBy('created_at','DESC')->take(3)->get();
        return view('client.home.index',[
            'slider' => $slider,
            'banner' => $banner,
            'lsp_sp' => $lsp_sp,
            'lsp_sp1' => $lsp_sp1,
            'dsLSP' => $dsLSP,
            'dsLSP1' => $dsLSP1,
            'dstt' => $dstt
        ]);

    }
    public function login(){
        return view('client.home.login');
    }
    public function postLogin(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'phone' => 'required'
        ],[
            'email.required' => 'Vui lòng nhập Email',
            'phone.required' => 'Vui lòng nhập số Phone'
        ]);
        // dd($request->input('phone'));
        $email = $request->input('email');
        $phone = $request->input('phone');
        $kh = KhachHang::where(['dien_thoai'=>$phone,'email'=>$email])->first();
        if($kh){
            $request->session()->put('ho_ten_kh',$kh->ho_kh . '-' . $kh->ten_kh);
            $request->session()->put('id_kh',$kh->id);
            if($request->has('ghi_nho')){
                return redirect('/')->cookie('ho_ten_kh',$kh->ho_kh . '-' . $kh->ten_kh,10080)->cookie('id_kh',$kh->id,10080);
            }
            return redirect('/');
        }else{
            return redirect()->back()->with('alert','Đăng nhập không thành công');
        }
    }
    public function logout(Request $request){
        if($request->session()->has('id_kh')){
            $request->session()->forget('id_kh');
            $request->session()->forget('ho_ten_kh');
        }
        if(Cookie::has('id_kh')){
            $id_kh = Cookie::forget('id_kh');
            $ho_ten_kh = Cookie::forget('ho_ten_kh');
            return redirect('/')->withCookie($id_kh)->withCookie($ho_ten_kh);
        }else
            return redirect('/');
    }
    public function register(){
        return view('client.home.register');
    }
    public function postRegister(StoreKhachHangPost $request){
        // dd($request->input('email'));
        $validated = $request->validated();
        $kh = new KhachHang();
        $kh->ho_kh = $request->input('ho_kh');
        $kh->ten_kh = $request->input('ten_kh');
        $kh->dia_chi = $request->input('dia_chi');
        $kh->dien_thoai = $request->input('dien_thoai');
        $kh->email = $request->input('email');
        $kh->thanh_vien = 0;
        $n = $kh->save();
        if($n>0){
            return redirect()->back()->with('alert','Đăng ký thành công');
        }else{
            return redirect()->back()->with('alert','Đăng ký không thành công');
        }


    }
}
