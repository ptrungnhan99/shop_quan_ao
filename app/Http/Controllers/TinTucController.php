<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTinTucPost;
use App\Models\TinTuc;
use Illuminate\Http\Request;

class TinTucController extends Controller
{
    public function index(){
        $tintuc = TinTuc::all();
        return view('admin.tintuc.list',['tintuc' => $tintuc]);
    }
    public function create(){
        return view('admin.tintuc.add');
    }
    public function store(StoreTinTucPost $request){
        $validated = $request->validated();
        $nameHinh = '';
        $data = $request->all();
        $tintuc = new TinTuc();
        $tintuc->tieu_de = $data['tieu_de'];
        $tintuc->tom_tat = $data['tom_tat'];
        $tintuc->chi_tiet = $data['chi_tiet'];
        $tintuc->tac_gia = $data['tac_gia'];
        $tintuc->trang_thai = isset($data['trang_thai'])? true:false;
        if($request->hasfile('hinh')){
            if($request->file('hinh')->isValid()){
                $file = $request->file('hinh');
                $nameHinh = $file->getClientOriginalName();
                // $file->move('public/hinh_loai_san_pham',$name);
                $request->hinh->storeAs('hinh_tin_tuc', $nameHinh);
            }
        }
        $tintuc->hinh = $nameHinh;
        $n = $tintuc->save();
        if($n>0){
            return redirect()->back()->with('alert','Thêm thành công');
        }else{
            return redirect()->back()->with('alert','Thêm không thành công');
        }
    }
    public function edit($id){
        $tintuc = TinTuc::find($id);
        return view('admin.tintuc.edit',['tintuc' => $tintuc]);
    }
    public function update(Request $request, $id){
        $tintuc = TinTuc::find($id);
        $data = $request->all();
        $nameHinh = $tintuc->hinh;
        if($request->hasfile('hinh')){
            if($request->file('hinh')->isValid()){
                $file = $request->file('hinh');
                $nameHinh = $file->getClientOriginalName();
                // $file->move('public/hinh_loai_san_pham',$name);
                $request->hinh->storeAs('hinh_tin_tuc', $nameHinh);
            }
        }
        $tintuc->hinh = $nameHinh;
        $tintuc->tieu_de = $data['tieu_de'];
        $tintuc->tom_tat = $data['tom_tat'];
        $tintuc->chi_tiet = $data['chi_tiet'];
        $tintuc->tac_gia = $data['tac_gia'];
        $tintuc->trang_thai = isset($data['trang_thai'])? true:false;
        $n = $tintuc->save();
        if($n>0){
            return redirect('admin/tin-tuc');
        }else{
            return redirect()->back()->with('alert','Thêm không thành công');
        }
    }
    public function destroy($id){
        $tintuc = TinTuc::find($id);
        $n = $tintuc->delete();
        if($n>0){
            return redirect('admin/tin-tuc');
        }
    }
}
