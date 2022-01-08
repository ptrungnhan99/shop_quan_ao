<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
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
}
