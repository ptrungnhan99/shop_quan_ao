<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\LoaiSanPham;
use App\Models\SanPham;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // dd($lsp_sp);
        return view('client.home.index',[
            'slider' => $slider,
            'banner' => $banner,
            'lsp_sp' => $lsp_sp,
            'lsp_sp1' => $lsp_sp1,
            'dsLSP' => $dsLSP,
            'dsLSP1' => $dsLSP1
        ]);
    }
}
