@extends('admin.master')
@section('title')
    Danh sách đơn hàng
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="card">
            <div class="card-header text-white bg-primary">
              Danh sách đơn hàng
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-light text-center">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Khách hàng</th>
                        <th scope="col">Tên Sản phẩm</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Thành tiền</th>
                        <th scope="col">Thời gian</th>
                        <th scope="col">Trang thái</th>
                        <th>&nbsp</th>
                        <th>&nbsp</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php $i=1?>
                        @foreach ($DonHang as $dh )
                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td>{{$dh->ho_kh." ".$dh->ten_kh}}</td>
                            <td>{{$dh->ten_sp}}</td>
                            <td>{{$dh->so_luong}}</td>
                            <td>{{ number_format($dh->don_gia) }}</td>
                            <td>{{ number_format($dh->so_luong *$dh->don_gia) }}</td>
                            <td>{{$dh->ngay_hoa_don}}</td>
                            <td>
                                @if($dh->tinh_trang === 1)
                                    <span class="btn btn-secondary btn-sm">Tiếp nhận</span>
                                @endif
                                @if ($dh->tinh_trang === 2)
                                    <span class="btn btn-primary btn-sm">Đang giao</span>
                                @endif
                                @if ($dh->tinh_trang === 3)
                                    <span class="btn btn-success btn-sm">Đã giao</span>
                                @endif
                                @if($dh->tinh_trang === 4)
                                    <span class="btn btn-danger btn-sm">Hủy</span>
                                @endif
                            </td>
                            <td><a class="btn btn-outline-success" href="{{url('admin/don-hang/cap-nhat/'.$dh->id)}}"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                        </tr>
                        <?php $i++;?>
                        @endforeach


                    </tbody>
                  </table>
            </div>
          </div>

        <!-- END DATA TABLE-->
    </div>
</div>

@endsection
