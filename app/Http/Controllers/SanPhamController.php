<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSanPhamPost;
use App\Models\LoaiSanPham;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SanPhamController extends Controller
{
    public function productWomen(){
        $dslsp = LoaiSanPham::where('trang_thai',1)->get();
        $dssp = SanPham::where('trang_thai',1)->where('gioi_tinh',0)->get();
        return view('client.products.product-women',[
            'dslsp' => $dslsp,
            'dssp' => $dssp
        ]);
    }
    public function productMen(){
        $dslsp = LoaiSanPham::where('trang_thai',1)->where('id','<>',4)->get();
        $dssp = SanPham::where('trang_thai',1)->where('gioi_tinh',1)->get();
        return view('client.products.product-men',[
            'dslsp' => $dslsp,
            'dssp' => $dssp
        ]);
    }
    public function productViettien(){
        $dssp = SanPham::where('trang_thai',1)->where('ma_thuong_hieu',1)->get();
       return view('client.products.product-viettien',[
        'dssp' => $dssp
       ]);
    }
    public function productPT(){
        $dssp = SanPham::where('trang_thai',1)->where('ma_thuong_hieu',2)->get();
       return view('client.products.product-pt2000',[
        'dssp' => $dssp
       ]);
    }
    public function productYaMe(){
        $dssp = SanPham::where('trang_thai',1)->where('ma_thuong_hieu',3)->get();
       return view('client.products.product-yame',[
        'dssp' => $dssp
       ]);
    }
    public function productBlue(){
        $dssp = SanPham::where('trang_thai',1)->where('ma_thuong_hieu',4)->get();
       return view('client.products.product-blue',[
        'dssp' => $dssp
       ]);
    }
    public function productDetail($chuoi){
        $array = explode('-',$chuoi);
        $id = $array[count($array) - 1];
        $sp = SanPham::where('trang_thai',1)->where('id',$id)->first();
        $ma_loai = $sp['ma_loai'];
        $sp_lq = SanPham::where('ma_loai',$ma_loai)->where('id','<>',$id)->take(4)->get();
        return view('client.products.product-detail',[
            'sp'=>$sp,
            'sp_lq'=>$sp_lq
        ]);
            // dd($sp_lq);
    }
    public function index(){
        $sanpham = DB::table('sanpham')
        ->join('loaisanpham','loaisanpham.id','=','sanpham.ma_loai')
        ->join('thuonghieu','thuonghieu.id','=','sanpham.ma_thuong_hieu')
        ->select('sanpham.hinh1','sanpham.id','sanpham.ten_sp','loaisanpham.ten_loai','thuonghieu.ten_thuong_hieu','sanpham.gia','sanpham.trang_thai')
        ->orderBy('sanpham.created_at','DESC')
        ->paginate(12);
        // dd($sanpham);
        return view('admin.sanpham.list',[
            'sanpham' => $sanpham
        ]);
    }
    public function create(){
        return view('admin.sanpham.add');
    }
    public function store(StoreSanPhamPost $request){
        $namHinh1 = '';
        $namHinh2 = '';
        $namHinh3 = '';
        $validated = $request->validated();
        $data = $request->all();
        $sanpham = new SanPham();
        $sanpham->ten_sp = $data['ten_sp'];
        $sanpham->ten_url = $this->text2url($data['ten_sp']);
        $sanpham->ma_loai = $data['ma_loai'];
        $sanpham->ma_thuong_hieu = $data['ma_thuong_hieu'];
        $sanpham->mo_ta_tom_tat = $data['mo_ta_tom_tat'];
        $sanpham->chi_tiet = $data['chi_tiet'];
        $sanpham->gia = $data['gia'];
        $sanpham->trang_thai = isset($data['trang_thai'])? true: false;
        $sanpham->gioi_tinh = isset($data['gioi_tinh'])? true: false;
        if($request->hasfile('hinh1')){
            if($request->file('hinh1')->isValid()){
                $file = $request->file('hinh1');
                $nameHinh1 = $file->getClientOriginalName();
                $request->hinh1->storeAs('hinh_san_pham',$nameHinh1);
            }
        }
        $sanpham->hinh1 = $nameHinh1;
        if($request->hasfile('hinh2')){
            if($request->file('hinh2')->isValid()){
                $file = $request->file('hinh2');
                $nameHinh2 = $file->getClientOriginalName();
                $request->hinh2->storeAs('hinh_san_pham',$nameHinh2);
            }
        }
        $sanpham->hinh2 = $nameHinh2;
        if($request->hasfile('hinh3')){
            if($request->file('hinh3')->isValid()){
                $file = $request->file('hinh3');
                $nameHinh3 = $file->getClientOriginalName();
                $request->hinh3->storeAs('hinh_san_pham',$nameHinh3);
            }
        }
        $sanpham->hinh3 = $nameHinh3;
        $n = $sanpham->save();
        if($n>0){
            return redirect()->back()->with('alert','Th??m th??nh c??ng');
        }else{
            return redirect()->back()->with('alert','Th??m kh??ng th??nh c??ng');
        }
    }
    public function edit($id){
        $sanpham = SanPham::find($id);
        return view('admin.sanpham.edit',['sp' => $sanpham]);
    }
    public function update(Request $request,$id){
        $sanpham = SanPham::find($id);
        $data = $request->all();
        $nameHinh1 = $sanpham->hinh1;
        if($request->hasfile('hinh1')){
            if($request->file('hinh1')->isValid()){
                $file = $request->file('hinh1');
                $nameHinh1 = $file->getClientOriginalName();
                $request->hinh1->storeAs('hinh_san_pham',$nameHinh1);
            }
        }
        $nameHinh2 = $sanpham->hinh2;
        if($request->hasfile('hinh2')){
            if($request->file('hinh2')->isValid()){
                $file = $request->file('hinh2');
                $nameHinh2 = $file->getClientOriginalName();
                $request->hinh2->storeAs('hinh_san_pham',$nameHinh2);
            }
        }
        $nameHinh3 = $sanpham->hinh3;
        if($request->hasfile('hinh3')){
            if($request->file('hinh3')->isValid()){
                $file = $request->file('hinh3');
                $nameHinh3 = $file->getClientOriginalName();
                $request->hinh3->storeAs('hinh_san_pham',$nameHinh3);
            }
        }
        $sanpham->hinh1 = $nameHinh1;
        $sanpham->hinh2 = $nameHinh2;
        $sanpham->hinh3 = $nameHinh3;
        $sanpham->ten_sp = $data['ten_sp'];
        $sanpham->ten_url = $this->text2url($data['ten_sp']);
        $sanpham->ma_loai = $data['ma_loai'];
        $sanpham->ma_thuong_hieu = $data['ma_thuong_hieu'];
        $sanpham->mo_ta_tom_tat = $data['mo_ta_tom_tat'];
        $sanpham->chi_tiet = $data['chi_tiet'];
        $sanpham->gia = $data['gia'];
        $sanpham->trang_thai = isset($data['trang_thai'])? true: false;
        $sanpham->gioi_tinh = ($data['gioi_tinh'] == 1) ? true: false;
        $n = $sanpham->save();
        if($n>0){
            return redirect('admin/san-pham');
        }else{
            return redirect()->back()->with('alert','C???p nh???t kh??ng th??nh c??ng');
        }
    }

    public function destroy($id){
        $sanpham = SanPham::find($id);
        $n = $sanpham->delete();
        if($n>0){
            return redirect('admin/san-pham');
        }
    }
    public function text2url($str) {
		$str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/", 'a', $str);
		$str = preg_replace("/(??|??|???|???|???|??|???|???|???|???|???)/", 'e', $str);
		$str = preg_replace("/(??|??|???|???|??)/", 'i', $str);
		$str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/", 'o', $str);
		$str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???)/", 'u', $str);
		$str = preg_replace("/(???|??|???|???|???)/", 'y', $str);
		$str = preg_replace("/(??)/", 'd', $str);
		$str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/", 'A', $str);
		$str = preg_replace("/(??|??|???|???|???|??|???|???|???|???|???)/", 'E', $str);
		$str = preg_replace("/(??|??|???|???|??)/", 'I', $str);
		$str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/", 'O', $str);
		$str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???)/", 'U', $str);
		$str = preg_replace("/(???|??|???|???|???)/", 'Y', $str);
		$str = preg_replace("/(??)/", 'D', $str);
		$str = preg_replace("/(\???|\???|\???|\???|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
		$str = preg_replace("/( )/", '-', $str);
		return $str;
	}
}
