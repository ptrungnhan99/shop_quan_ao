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
        $nameUrl = $this->text2url($data['ten_banner']);
        $banner->ten_url = 'san-pham/'. $nameUrl;
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
        $nameUrl = $this->text2url($data['ten_banner']);
        $banner->ten_url = 'san-pham/'. $nameUrl;
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
    public function text2url($str) {
		$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
		$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
		$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
		$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
		$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
		$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
		$str = preg_replace("/(đ)/", 'd', $str);
		$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
		$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
		$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
		$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
		$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
		$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
		$str = preg_replace("/(Đ)/", 'D', $str);
		$str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
		$str = preg_replace("/( )/", '-', $str);
		return $str;
	}
}
