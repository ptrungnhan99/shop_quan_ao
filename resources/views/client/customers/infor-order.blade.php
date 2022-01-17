@extends('client.master')
@section('title')
    Thời trang việt
@endsection
@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
@endsection
@section('content')
	<div class="container mt-5 mb-5">
		<div class="row">
            <div class="col-12">
                <h1 class="text-center text-success">Thông tin khách hàng</h1>
            </div>
            <div class="col-4">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">

                    </a>
                    <a href="{{url('khach-hang/info-customer/'.Session::get('id_kh'))}}" class="list-group-item list-group-item-action">Thông tin khách hàng</a>
                    <a href="" class="list-group-item list-group-item-action">Thông tin đơn hàng</a>
                </div>
            </div>
            <div class="col-8">
                <table class="table">
                    <thead>
                    <tr style="background-color: #02acea">
                        <td>#</td>
                        <td>Hình</td>
                        <td>Tên SP</td>
                        <td>Số lượng</td>
                        <td>Đơn giá</td>
                        <td>Thành tiền</td>
                        <td>Trạng thái</td>
                    </tr>
                    </thead>

                    <tbody>
                        <?php $i=1?>
                        @foreach ($DonDatHang as $dh)
                        <tr>
                          <th scope="row"><?php echo $i; ?></th>
                          <td>
                            <img width="100px" class="img-thumbnail" src="{{URL::asset('storage/app/hinh_san_pham/'.$dh->hinh1)}}" alt="">
                            </td>
                          <td>{{ $dh->ten_sp }}</td>
                          <td>{{ $dh->so_luong }}</td>
                          <td>{{ number_format($dh->don_gia) }}</td>
                          <td>{{ number_format($dh->so_luong *$dh->don_gia) }}</td>
                          <td>
                            @if($dh->tinh_trang == 1)
                            <span class="btn btn-block btn-secondary">Tiếp nhận</span>
                            @endif
                          </td>
                        </tr>
                        <?php $i++;?>
                        @endforeach
                    </tbody>
                    {{-- <tfoot>
                        <tr style="background-color: #02acea"><td colspan="5">Tổng tiền</td><td>{{ number_format($DonDatHang[0]->tong_tien) }}</td></tr>
                        <tr style="background-color: #cacaca"><td colspan="5">Đặt cọc</td><td>{{ number_format($DonDatHang[0]->tien_coc) }}</td></tr>
                        <tr style="background-color: #02acea"><td colspan="5">Còn lại</td><td>{{ number_format($DonDatHang[0]->con_lai) }}</td></tr>
                    </tfoot> --}}
                </table>
            </div>
		</div>
	</div>


@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
@show
