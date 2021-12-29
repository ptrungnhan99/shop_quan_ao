<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBannerPost;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index(){
        $ds_banner = Banner::all();
        return view('admin.banner.list',['ds_banner'=>$ds_banner]);
    }
    public function create(){
        return view('admin.banner.add');
    }
    public function store(StoreBannerPost $request){
        $validated = $request->validated();
        $nameHinh = '';
        $data = $request->all();
        $banner = new Banner();
        $banner->ten_banner = $data['ten_banner'];
        $banner->tieu_de = $data['tieu_de'];
        $banner->trang_thai = isset($data['trang_thai'])? true : false;
        if($request->hasfile('hinh')){
            if($request->file('hinh')->isValid()){
                $file = $request->file('hinh');
                $nameHinh = $file->getClientOriginalName();
                // $file->move('public/hinh_loai_san_pham',$name);
                $request->hinh->storeAs('hinh_banner', $nameHinh);
            }
        }
        $banner->hinh = $nameHinh;
        $n = $banner->save();
        if($n>0){
            return redirect()->back()->with('alert','Thêm thành công');
        }else{
            return redirect()->back()->with('alert','Thêm không thành công');
        }
    }
    public function edit($id){
        $banner = Banner::find($id);
        return view('admin.banner.edit',['banner'=>$banner]);
    }
    public function update(Request $request, $id){
        $banner = Banner::find($id);
        $data = $request->all();
        $nameHinh = $banner->hinh;
        if($request->hasfile('hinh')){
            if($request->file('hinh')->isValid()){
                $file = $request->file('hinh');
                $nameHinh = $file->getClientOriginalName();
                // $file->move('public/hinh_loai_san_pham',$name);
                $request->hinh->storeAs('hinh_banner', $nameHinh);
            }
        }
        $banner->hinh = $nameHinh;
        $banner->ten_banner = $data['ten_banner'];
        $banner->tieu_de = $data['tieu_de'];
        $banner->trang_thai = isset($data['trang_thai'])? true : false;
        $n = $banner->save();
        if($n>0){
            return redirect('banner');
        }else{
            return redirect()->back()->with('alert','Cập nhật không thành công');
        }
    }
    public function destroy($id){
        $banner = Banner::find($id);
        $n = $banner->delete();
        if($n>0){
            return redirect('banner');
        }
    }
}
