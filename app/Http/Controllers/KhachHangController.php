<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKhachHangPost;
use App\Mail\SendMailDonHang;
use App\Models\KhachHang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class KhachHangController extends Controller
{
    public function AddToCart(Request $request, $id){
        // echo json_encode(['n'=>'Ok']);
        $sanpham = SanPham::find($id);
        if($sanpham != null){
            Cart::add($sanpham->id, $sanpham->ten_sp, $request->sl, $sanpham->gia, ['hinh' => $sanpham->hinh1]);
        }
        return view('client.cart');
    }
    public function InfoCart(){
        return view('client.cart-info');
    }
    public function UpdateCart(Request $request){
        $rowID=$request->Th_rowID;
        $soLuong=$request->Th_soluong*1;
        Cart::update($rowID,$soLuong);
        return redirect('khach-hang/info-cart');
    }
    public function DeleteCart($id){
        Cart::remove($id);
        return redirect()->back();
    }
    public function store(Request $request, $id)
    {
		// dd($id);
        // $validated = $request->validated();
		//them kh
        // $idkh = DB::table('khachhang')->insertGetId(
		//     ['ho_kh' => $request->ho_kh, 'ten_kh' => $request->ten_kh, 'dia_chi' => $request->dia_chi, 'dien_thoai' => $request->dien_thoai, 'email' => $request->email, 'dien_thoai' => $request->dien_thoai,'thanh_vien'=>0, 'created_at'=>date('Y-m-d H:m:s'),'updated_at'=>date('Y-m-d H:m:s')]
		// );
        //them ddh
		$idddh = DB::table('hoadon')->insertGetId(
		    ['ngay_hoa_don' => date('Y-m-d H:m:s'), 'id_ma_kh' => $id, 'tong_tien' => str_replace(',', '', Cart::total()), 'tien_coc' => 0, 'con_lai' => str_replace(',', '', Cart::total()), 'tinh_trang' => 1, 'created_at'=>date('Y-m-d H:m:s'),'updated_at'=>date('Y-m-d H:m:s')]
		);
        //them chi tiet ddh
		$dsMH=array();
		foreach (Cart::content() as $row) {
			$dsMH[]=array('id_sohd'=>$idddh,'ma_san_pham'=>$row->id, 'so_luong'=>$row->qty,'don_gia'=>$row->price,'created_at'=>date('Y-m-d H:m:s'),'updated_at'=>date('Y-m-d H:m:s'));
		}
		DB::table('ct_hoadon')->insert($dsMH);
        Cart::destroy();
        return redirect('khach-hang/order/'.$idddh);
    }
    public function Order($id){
        $DonDatHang = DB::table('hoadon')
            ->join('khachhang', 'khachhang.id', '=', 'hoadon.id_ma_kh')
            ->join('ct_hoadon', 'hoadon.id', '=', 'ct_hoadon.id_sohd')
            ->join('sanpham', 'sanpham.id', '=', 'ct_hoadon.ma_san_pham')
            ->select('hoadon.id','hoadon.ngay_hoa_don','hoadon.id_ma_kh','hoadon.tong_tien','hoadon.tien_coc','hoadon.con_lai','hoadon.tinh_trang','khachhang.ho_kh','khachhang.ten_kh','khachhang.dia_chi','khachhang.dien_thoai','khachhang.email', 'ct_hoadon.so_luong', 'ct_hoadon.don_gia','sanpham.id as MaSP', 'sanpham.ten_sp','sanpham.hinh1')
            ->where('hoadon.id',$id)
            ->get();
          if(count($DonDatHang)===0)
          	return redirect("/");
        // dd($DonDatHang);
        Mail::to($DonDatHang[0]->email)->send(new SendMailDonHang($DonDatHang));
        // return view('client.customers.order-list',['DonDatHang'=>$DonDatHang]);
        return redirect("/");
    }
    public function InforCustomer($id){
        $kh = KhachHang::find($id);
        return view('client.customers.infor-customer',[
            'kh' => $kh
        ]);
    }
    public function InforOrder($id){
        $DonDatHang = DB::table('hoadon')
        ->join('khachhang', 'khachhang.id', '=', 'hoadon.id_ma_kh')
        ->join('ct_hoadon', 'hoadon.id', '=', 'ct_hoadon.id_sohd')
        ->join('sanpham', 'sanpham.id', '=', 'ct_hoadon.ma_san_pham')
        ->select('hoadon.id','hoadon.ngay_hoa_don','hoadon.id_ma_kh','hoadon.tong_tien','hoadon.tien_coc','hoadon.con_lai','hoadon.tinh_trang','khachhang.ho_kh','khachhang.ten_kh','khachhang.dia_chi','khachhang.dien_thoai','khachhang.email', 'ct_hoadon.so_luong', 'ct_hoadon.don_gia','sanpham.id as MaSP', 'sanpham.ten_sp','sanpham.hinh1')
        ->where('hoadon.tinh_trang','<>',0)
        ->where('khachhang.id',$id)
        ->get();
        // dd($DonDatHang);
        return view('client.customers.infor-order',[
            'DonDatHang' => $DonDatHang
        ]);
    }

}
