@extends('admin.master')
@section('title')
    Cập nhật Đơn hàng
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        @if (session('alert'))
            <div class="alert alert-danger">
                {{session('alert')}}
            </div>
        @endif
        <div class="card">
            <div class="card-header bg-primary text-white">
              Cập Nhật Đơn hàng
            </div>
            <div class="card-body">
                <form method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Mã đơn hàng</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="" value="{{$dh->id}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Mã khách hàng</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="" value="{{$dh->id_ma_kh}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Thành tiền</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="" value="{{$dh->con_lai}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tinh_trang">Trạng thái</label>
                        <select class="form-control" name="tinh_trang" id="tinh_trang">
                            <option value="1" @if($dh->tinh_trang == 1)
                                selected
                                @endif>Tiếp nhận</option>
                            <option value="2" @if($dh->tinh_trang == 2)
                                selected
                                @endif>Đang giao</option>
                            <option value="3" @if($dh->tinh_trang == 3)
                                selected
                                @endif>Đã giao</option>
                            <option value="4" @if($dh->tinh_trang == 4)
                                selected
                                @endif>Hủy</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                  </form>
            </div>
        </div>

    </div>
</div>


@endsection


