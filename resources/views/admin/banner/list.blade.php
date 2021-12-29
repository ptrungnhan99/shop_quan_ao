@extends('admin.masteradmin')
@section('title')
    Danh sách Banner
@endsection
@section('content')
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
                    <th scope="col">#</th>
                    <th scope="col">Tên Banner</th>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Trang thái</th>
                    <th>&nbsp</th>
                    <th>&nbsp</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($ds_banner as $banner )
                    <tr>
                        <th scope="row">{{$banner->id}}</th>
                        <td>{{$banner->ten_banner}}</td>
                        <td>{{$banner->tieu_de}}</td>
                        <td class="text-center">
                            @if ($banner->trang_thai == 1)
                                <span class="btn btn-success btn-sm">Yes</span>
                            @else
                                <span class="btn btn-info btn-sm">No</span>
                            @endif
                        </td>
                        <td><a class="btn btn-outline-success" href="{{url('banner/cap-nhat/'.$banner->id)}}"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                        <td>
                            <form action="{{url('banner/xoa/'.$banner->id)}}" method="post">
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
@endsection
