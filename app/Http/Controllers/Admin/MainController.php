<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HoaDon;
use App\Models\KhachHang;
use App\Models\SanPham;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(){
        $tong_sp = SanPham::count();
        $tong_user = User::count();
        $tong_dh = HoaDon::count();
        $tong_kh = KhachHang::count();
        //5 don hang moi nhat
        $DonDatHang = DB::table('hoadon')
        ->join('khachhang', 'khachhang.id', '=', 'hoadon.id_ma_kh')
        ->join('ct_hoadon', 'hoadon.id', '=', 'ct_hoadon.id_sohd')
        ->join('sanpham', 'sanpham.id', '=', 'ct_hoadon.ma_san_pham')
        ->select('hoadon.id','hoadon.ngay_hoa_don','hoadon.id_ma_kh','hoadon.tong_tien','hoadon.tien_coc','hoadon.con_lai','hoadon.tinh_trang','khachhang.ho_kh','khachhang.ten_kh', 'ct_hoadon.so_luong', 'ct_hoadon.don_gia','sanpham.id as MaSP', 'sanpham.ten_sp')
        ->where('hoadon.tinh_trang','<>',0)
        ->orderBy('hoadon.created_at','DESC')
        ->take(5)
        ->get();
        //5 khach hang moi nhat
        $kh = DB::table('khachhang')->orderBy('created_at','DESC')->take(5)->get();
        //doanhthu
        $mang_mau1=array('f56954','00a65a','f39c12','00c0ef','3c8dbc','d2d6de','371719','994684','f906d6','3b00fd','d1f60a','00f92a');
        $ThongKeSanPhamTheoThang = DB::table('hoadon')
    		->select(DB::raw('CONCAT(month(`ngay_hoa_don`),"-" , year(`ngay_hoa_don`) ) as ngay, sum(`tong_tien`) as TT'))
            ->groupBy('ngay')
            ->get();
        //thongkesosanpham
        $mang_mau2=array('f56954','00a65a','f39c12','00c0ef','3c8dbc','d2d6de','371719','994684','f906d6','3b00fd','d1f60a','00f92a');
        $ThongKeSanPhamTheoLoai = DB::table('loaisanpham')
            ->join('sanpham', 'sanpham.ma_loai', '=', 'loaisanpham.id')
            ->select(DB::raw('sanpham.ma_loai,ten_loai,count(sanpham.id) as TSSP'))
            ->groupBy('sanpham.ma_loai','ten_loai')
            ->get();
        return view('admin.home',[
            'title' => 'Trang Quan Tri',
            'tong_sp' => $tong_sp,
            'tong_user' => $tong_user,
            'tong_dh' => $tong_dh,
            'tong_kh' => $tong_kh,
            'DonHang' => $DonDatHang,
            'KhachHang' => $kh,
            'ThongKeSanPhamTheoThang'=>$ThongKeSanPhamTheoThang,
            'mang_mau1'=>$mang_mau1,
            'ThongKeSanPhamTheoLoai'=>$ThongKeSanPhamTheoLoai,
            'mang_mau2'=>$mang_mau2
        ]);
    }
}
