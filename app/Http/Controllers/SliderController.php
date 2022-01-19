<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSliderPost;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $ds_slider = Slider::get();
        return view('admin.slider.list',['ds_slider'=>$ds_slider]);
    }
    public function create()
    {
        return view('admin.slider.add');
    }
    public function store(StoreSliderPost $request)
    {
        $validated = $request->validated();
        $nameHinh = "";
        $data = $request->all();
        $slider = new Slider();
        $slider->ten_slider = $data['ten_slider'];
        $slider->tieu_de = $data['tieu_de'];
        $slider->trang_thai = isset($data['trang_thai'])? true: false;
        if($request->hasfile('hinh')){
            if($request->file('hinh')->isValid()){
                $file = $request->file('hinh');
                $nameHinh = $file->getClientOriginalName();
                // $file->move('public/hinh_loai_san_pham',$name);
                $request->hinh->storeAs('hinh_slider/slider', $nameHinh);
            }
        }
        $slider->hinh = $nameHinh;
        $n = $slider->save();
        if($n>0){
            return redirect('slider');
        }else{
            return redirect()->back()->with('mss','Thêm không thành công');
        }
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit',['slider'=>$slider]);
    }
    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
        $data = $request->all();
        $nameHinh = $slider->hinh;
        if($request->hasfile('hinh')){
            if($request->file('hinh')->isValid()){
                $file = $request->file('hinh');
                $nameHinh = $file->getClientOriginalName();
                // $file->move('public/hinh_loai_san_pham',$name);
                $request->hinh->storeAs('hinh_test', $nameHinh);
            }
        }
        $slider->ten_slider = $data['ten_slider'];
        $slider->hinh = $nameHinh;
        $slider->tieu_de = $data['tieu_de'];
        $slider->trang_thai = isset($data['trang_thai']) ? $data['trang_thai'] : false;
        $n = $slider->save();
        if($n>0){
            return redirect('admin/slider');
        }else{
            return redirect()->back()->with('alert','Cập nhật không thành công');
        }
    }
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $n = $slider->delete();
        if($n>0){
            return redirect('admin/slider');
        }
    }
}
