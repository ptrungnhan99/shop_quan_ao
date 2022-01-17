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

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>


	<!-- Shoping Cart -->
	<div id="changeListCart" class="bg0 p-t-75 p-b-85">
        @if(Cart::count() !==0 )
		<div class="container">
			<div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead class="text-center">
                          <tr>
                            <th scope="col">Hình</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Đơn giá </th>
                            <th scope="col">Thành tiền</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">&nbsp;</th>
                          </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach (Cart::content() as $row )
                            <tr>
                                <td>
                                    <img width="100px" class="thumb-nail" src="{{URL::asset('storage/app/hinh_san_pham/'.$row->options->hinh)}}" alt="">
                                </td>
                                <td>{{$row->name}}</td>
                                <td>{{number_format($row->price)}}đ</td>
                                <td>{{number_format($row->price * $row->qty)}}đ</td>
                                <td>
                                    <form class="form-inline" method="post" action="{{ url('khach-hang/update-cart') }}">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="hidden" value="{{ $row->rowId }}" name="Th_rowID">
                                        <select name="Th_soluong" class="form-control" style="width: 100px; text-align: center;">
                                        @for ($i = 1; $i < 10; $i++)
                                            @if ($i == ($row->qty*1))
                                            <option value="{{ $i }}" selected="selected">{{ $i }}</option>
                                            @else
                                            <option value="{{ $i }}">{{ $i }}</option>
                                            @endif
                                        @endfor
                                        </select>
                                        <input type="submit" name="Th_submit" value="Cập nhật" style="background-color: #717fe0; color:white;" class="btn btn-sm">
                                    </form>

                                </td>
                                <td>
                                    <a href="{{ url('khach-hang/delete-cart/'.$row->rowId)}}" id="btnDelete" class="btn sm btn-danger">Xóa</a>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <th scope="col">Tổng tiền</th>
                                <td colspan="4">&nbsp;</td>
                                <td>{{Cart::total()}}</td>
                            </tr>
                        </tbody>
                      </table>
                    @if(Session::has('ho_ten_kh'))
                        <a href="{{ url('khach-hang/order-item/'.Session::get('id_kh'))}}" class="btn" style="background-color: #f74877; color:white;"> Tiến hành đặt hàng</a>
                    @elseif (Cookie::has('ho_ten_kh'))
                        <a href="{{ url('khach-hang/order-item/'.Cookie::get('id_kh'))}}" class="btn" style="background-color: #f74877; color:white;"> Tiến hành đặt hàng</a>
                    @else
                        <a href="{{ url('login') }}" class="btn" style="background-color: #f74877; color:white;"> Tiến hành đặt hàng</a>
                    @endif

                </div>
			</div>
		</div>
        @else
        <h1 class="text-center">Giỏng hàng rõng</h1>
        @endif
	</div>


@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
@show
