@extends('admin.master')
@section('title')
    Danh sách Tin tức
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="card">
            <div class="card-header text-white bg-primary">
              Danh sách Tin tức
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-light text-center">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Hình</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Mô tả tóm tắt</th>
                        <th scope="col">Tác giả</th>
                        <th scope="col">Trang thái</th>
                        <th>&nbsp</th>
                        <th>&nbsp</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($tintuc as $tt )
                        <tr>
                            <th scope="row">{{$tt->id}}</th>
                            <td>
                                <img width="200px" class="img-thumbnail" src="{{URL::asset('storage/app/hinh_tin_tuc/'.$tt->hinh)}}" alt="">
                            </td>
                            <td>{{$tt->tieu_de}}</td>
                            <td>{{$tt->tom_tat}}</td>
                            <td>{{$tt->tac_gia}}</td>
                            <td class="text-center">
                                @if ($tt->trang_thai == 1)
                                    <span class="btn btn-success btn-sm">Yes</span>
                                @else
                                    <span class="btn btn-info btn-sm">No</span>
                                @endif
                            </td>
                            <td><a class="btn btn-outline-success" href="{{url('admin/tin-tuc/cap-nhat/'.$tt->id)}}"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                            <td>
                                <form action="{{url('admin/tin-tuc/xoa/'.$tt->id)}}" method="post">
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

@endsection
