@extends('client.master')
@section('title')
    Thời trang việt
@endsection
@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
@endsection
@section('content')
    <!-- breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <a href="blog.html" class="stext-109 cl8 hov-cl1 trans-04">
                Khách hàng
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                Thông tin khách hàng
            </span>
        </div>
    </div>
	<div class="container mt-5 mb-5">
		<div class="row">
            <div class="col-4">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">

                    </a>
                    <a href="{{url('khach-hang/infor-customer/'.Session::get('id_kh'))}}" class="list-group-item list-group-item-action">Thông tin khách hàng</a>
                    <a href="{{url('khach-hang/infor-order/'.Session::get('id_kh'))}}" class="list-group-item list-group-item-action">Thông tin đơn hàng</a>
                </div>
            </div>
            <div class="col-8">
                <form>
                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Họ và tên</label>
                      <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="" value="{{$kh->ho_kh." ".$kh->ten_kh}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" id="" value="{{$kh->email}}">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Địa chỉ</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="" value="{{$kh->dia_chi}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Điện thoại</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="" value="{{$kh->dien_thoai}}">
                        </div>
                    </div>
                </form>
            </div>
		</div>
	</div>


@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
@show
