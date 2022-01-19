<?php

namespace App\Http\Controllers;

use App\Models\HoaDon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonHangController extends Controller
{
    public function index(){
        $DonDatHang = DB::table('hoadon')
        ->join('khachhang', 'khachhang.id', '=', 'hoadon.id_ma_kh')
        ->join('ct_hoadon', 'hoadon.id', '=', 'ct_hoadon.id_sohd')
        ->join('sanpham', 'sanpham.id', '=', 'ct_hoadon.ma_san_pham')
        ->select('hoadon.id','hoadon.ngay_hoa_don','hoadon.id_ma_kh','hoadon.tong_tien','hoadon.tien_coc','hoadon.con_lai','hoadon.tinh_trang','khachhang.ho_kh','khachhang.ten_kh','khachhang.dia_chi','khachhang.dien_thoai','khachhang.email', 'ct_hoadon.so_luong', 'ct_hoadon.don_gia','sanpham.id as MaSP', 'sanpham.ten_sp','sanpham.hinh1')
        ->where('hoadon.tinh_trang','<>',0)
        ->get();
        if(count($DonDatHang)===0)
          return redirect("/");
        // dd($DonDatHang);
        return view('admin.donhang.list',['DonHang' => $DonDatHang]);
    }
    public function edit($id){
        $dh = HoaDon::find($id);
        return view('admin.donhang.edit',[
            'dh' => $dh
        ]);
        // dd($dh);
    }
    public function update(Request $request,$id){
        $dh = HoaDon::find($id);
        $data = $request->all();
        $dh->tinh_trang = $data['tinh_trang'];
        $n = $dh->save();
        if($n>0){
            return redirect('admin/don-hang');
        }else{
            return redirect()->back()->with('alert','Cập nhật không thành công');
        }
    }
}
