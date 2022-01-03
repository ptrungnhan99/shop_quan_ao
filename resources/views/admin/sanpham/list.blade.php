@extends('admin.master')
@section('title')
    Danh sách Sản phẩm
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="card">
            <div class="card-header text-white bg-primary">
              Danh sách Banner
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Mã sản phẩm</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Tên loại </th>
                        <th scope="col">Tên thương hiệu</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Trạng thái</th>
                        <th>&nbsp</th>
                        <th>&nbsp</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($sanpham as $sp )
                        <tr>
                            <th scope="row">{{$sp->id}}</th>
                            <td>{{$sp->ten_sp}}</td>
                            <td>{{$sp->ten_loai}}</td>
                            <td>{{$sp->ten_thuong_hieu}}</td>
                            <td>{{$sp->gia}}</td>
                            <td class="text-center">
                                @if ($sp->trang_thai == 1)
                                    <span class="btn btn-success btn-sm">Yes</span>
                                @else
                                    <span class="btn btn-info btn-sm">No</span>
                                @endif
                            </td>
                            <td><a class="btn btn-outline-success" href="{{url('san-pham/cap-nhat/'.$sp->id)}}"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                            <td>
                                <form action="{{url('san-pham/xoa/'.$sp->id)}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Bạn có muốn xóa không ?')">
                                        <i class="fa fa-trash-alt" aria-hidden="true"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
          </div>

        <!-- END DATA TABLE-->
    </div>
</div>
<div class="row" >
    <div class="col-12">
        <div class="d-flex justify-content-end">
            {{ $sanpham->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>

@endsection
