<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTinTucPost;
use App\Models\TinTuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TinTucController extends Controller
{
    public function blog(){
        $dstt = DB::table('tintuc')->select(DB::raw('CONCAT(month(`created_at`),"-" , year(`created_at`) ) as thang,
        day(`created_at`) as ngay, tieu_de, tom_tat, tac_gia,hinh,ten_url,id'))
        ->where('trang_thai',1)->orderBy('created_at','DESC')->get();
        return view('client.blog.blog',[
            'dstt' => $dstt
        ]);
        // dd($dstt);
    }
    public function blogDetail($string){
        $array = explode('-',$string);
        $id = $array[count($array) - 1];
        // $tt = TinTuc::find($id);
        $tt = DB::table('tintuc')->select(DB::raw('CONCAT(month(`created_at`),"-" , year(`created_at`) ) as thang,
        day(`created_at`) as ngay, tieu_de, tom_tat, tac_gia,hinh,ten_url,id,chi_tiet'))
        ->where('trang_thai',1)->where('id',$id)->first();
        return view('client.blog.blog-detail',[
            'tintuc' => $tt
        ]);
        // dd($tt);
    }
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
        $tintuc->ten_url = $this->text2url($data['tieu_de']);
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
            return redirect()->back()->with('alert','Th??m th??nh c??ng');
        }else{
            return redirect()->back()->with('alert','Th??m kh??ng th??nh c??ng');
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
        $tintuc->ten_url = $this->text2url($data['tieu_de']);
        $tintuc->tom_tat = $data['tom_tat'];
        $tintuc->chi_tiet = $data['chi_tiet'];
        $tintuc->tac_gia = $data['tac_gia'];
        $tintuc->trang_thai = isset($data['trang_thai'])? true:false;
        $n = $tintuc->save();
        if($n>0){
            return redirect('admin/tin-tuc');
        }else{
            return redirect()->back()->with('alert','Th??m kh??ng th??nh c??ng');
        }
    }
    public function destroy($id){
        $tintuc = TinTuc::find($id);
        $n = $tintuc->delete();
        if($n>0){
            return redirect('admin/tin-tuc');
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
