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
				Danh sách đơn đặt hàng
			</span>
		</div>
	</div>


	<!-- Shoping Cart -->
	<div id="changeListCart" class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
                <h3>Đơn đặt hàng</h3>
                <table class="table">
                        <tr>
                            <td><b>Số hóa đơn</b></td>
                            <td>{{ $DonDatHang[0]->id }}</td>
                            <td><b>Ngày hóa đơn</b></td>
                            <td>{{ $DonDatHang[0]->ngay_hoa_don }}</td>
                        </tr>
                        <tr>
                            <td><b>Khách hàng</b></td>
                            <td>{{ $DonDatHang[0]->ho_kh }}&nbsp;{{ $DonDatHang[0]->ten_kh }}</td>
                            <td><b>Điện thoại</b></td>
                            <td>{{ $DonDatHang[0]->dien_thoai }}</td>
                            <td><b>Email</b></td>
                            <td>{{ $DonDatHang[0]->email }}</td>
                        </tr>
                        <tr>
                            <td><b>Địa chỉ</b></td>
                            <td colspan="5">{{ $DonDatHang[0]->dia_chi }}</td>
                        </tr>
                </table>
                <table class="table">
                    <thead>
                    <tr style="background-color: #02acea"><td>#</td><td>Mã SP</td><td>Tên SP</td><td>Số lượng</td><td>Đơn giá</td><td>Thành tiền</td></tr>
                    </thead>

                    <tbody>
                        <?php $i=1?>
                        @foreach ($DonDatHang as $dh)
                        <tr>
                          <th scope="row"><?php echo $i; ?></th>
                          <td>{{ $dh->MaSP }}</td>
                          <td>{{ $dh->ten_sp }}</td>
                          <td>{{ $dh->so_luong }}</td>
                          <td>{{ number_format($dh->don_gia) }}</td>
                          <td>{{ number_format($dh->so_luong *$dh->don_gia) }}</td>
                        </tr>
                        <?php $i++;?>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr style="background-color: #02acea"><td colspan="5">Tổng tiền</td><td>{{ number_format($DonDatHang[0]->tong_tien) }}</td></tr>
                        <tr style="background-color: #cacaca"><td colspan="5">Đặt cọc</td><td>{{ number_format($DonDatHang[0]->tien_coc) }}</td></tr>
                        <tr style="background-color: #02acea"><td colspan="5">Còn lại</td><td>{{ number_format($DonDatHang[0]->con_lai) }}</td></tr>
                    </tfoot>
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
