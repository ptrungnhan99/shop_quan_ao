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
    public function productDetail($id){
        $sp = SanPham::find($id);
        $sp_lq = SanPham::where('ma_loai',$sp->ma_loai)->where('id','<>',$id)->take(4)->get();
        return view('client.products.product-detail',['sp'=>$sp, 'sp_lq'=>$sp_lq]);
        // // dd($sp_lq);
    }
    public function index(){
        $sanpham = DB::table('sanpham')
        ->join('loaisanpham','loaisanpham.id','=','sanpham.ma_loai')
        ->join('thuonghieu','thuonghieu.id','=','sanpham.ma_thuong_hieu')
        ->select('sanpham.hinh1','sanpham.id','sanpham.ten_sp','loaisanpham.ten_loai','thuonghieu.ten_thuong_hieu','sanpham.gia','sanpham.trang_thai')
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
            return redirect()->back()->with('alert','Thêm thành công');
        }else{
            return redirect()->back()->with('alert','Thêm không thành công');
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
            return redirect('san-pham');
        }else{
            return redirect()->back()->with('alert','Cập nhật không thành công');
        }
    }

    public function destroy($id){
        $sanpham = SanPham::find($id);
        $n = $sanpham->delete();
        if($n>0){
            return redirect('san-pham');
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
