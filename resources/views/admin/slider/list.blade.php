@extends('admin.master')
@section('title')
    Danh sách Slider
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="card">
            <div class="card-header text-white bg-primary">
              Danh sách Slider
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-light text-center">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Hình</th>
                        <th scope="col">Tên Slider</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Trang thái</th>
                        <th>&nbsp</th>
                        <th>&nbsp</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($ds_slider as $slider )
                        <tr>
                            <th scope="row">{{$slider->id}}</th>
                            <td>
                                <img width="100px" class="img-thumbnail" src="{{URL::asset('storage/app/hinh_slider/'.$slider->hinh)}}" alt="">
                            </td>
                            <td>{{$slider->ten_slider}}</td>
                            <td>{{$slider->tieu_de}}</td>
                            <td class="text-center">
                                @if ($slider->trang_thai == 1)
                                    <span class="btn btn-success btn-sm">Yes</span>
                                @else
                                    <span class="btn btn-info btn-sm">No</span>
                                @endif
                            </td>
                            <td><a class="btn btn-outline-success" href="{{url('slider/cap-nhat/'.$slider->id)}}"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                            <td>
                                <form action="{{url('slider/xoa/'.$slider->id)}}" method="post">
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
