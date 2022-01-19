@extends('admin.master')
@section('title')
    Thống kê
@endsection
@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$tong_sp}}</h3>

                    <p>Sản Phẩm</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{url('admin/san-pham')}}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$tong_dh}}</h3>

                    <p>Đơn Hàng</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="{{url('admin/don-hang')}}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$tong_user}}</h3>

                    <p>User</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{url('admin/user')}}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$tong_kh}}</h3>

                    <p>Khách Hàng</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- ./col -->

        <!-- ./col -->
    </div>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">5 Đơn Hàng Mới Nhất</h3>
                </div>
                <div class="card-body">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                          <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Khách hàng</th>
                                <th scope="col">Tên Sản phẩm</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Đơn giá</th>
                                <th scope="col">Thành tiền</th>
                                <th scope="col">Thời gian</th>
                                <th scope="col">Trang thái</th>
                            </tr>
                          </thead>
                          <tbody>
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
                            </tr>
                            <?php $i++;?>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">5 Khách Hàng Mới Nhất</h3>
                </div>
                <div class="card-body">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                          <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Họ và tên</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Email</th>
                                <th scope="col">Điện thoại</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $i=1?>
                            @foreach ($KhachHang as $kh )
                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td>{{$kh->ho_kh." ".$kh->ten_kh}}</td>
                                <td>{{$kh->dia_chi}}</td>
                                <td>{{$kh->email}}</td>
                                <td>{{$kh->dien_thoai}}</td>
                            </tr>
                            <?php $i++;?>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Thống kê</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <canvas id="chart1" width="600" height="350"></canvas>
                        </div>
                        <div class="col-md-6">
                            <canvas id="chart2" width="600" height="350"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    //doanhthu
    new Chart(document.getElementById("chart1"), {
    type: 'bar',
    data: {
      labels: [
        @foreach($ThongKeSanPhamTheoThang as $item)
        '{{ $item->ngay }}',
        @endforeach
      ],
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: [
            @foreach ($mang_mau1 as $item )
                '#{{$item}}',
            @endforeach
          ],
          data: [
            @foreach ($ThongKeSanPhamTheoThang as $item )
                '{{$item->TT}}',
            @endforeach
          ]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Doanh thu theo tháng'
      }
    }
});
    //thongkesosanpham
    new Chart(document.getElementById("chart2"), {
    type: 'bar',
    data: {
      labels: [
        @foreach($ThongKeSanPhamTheoLoai as $item)
        '{{ $item->ten_loai }}',
        @endforeach
      ],
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: [
            @foreach ($mang_mau2 as $item )
                '#{{$item}}',
            @endforeach
          ],
          data: [
            @foreach ($ThongKeSanPhamTheoLoai as $item )
                '{{$item->TSSP}}',
            @endforeach
          ]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Thống kê số sản phẩm theo loại'
      }
    }
});
</script>
@endsection
