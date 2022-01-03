@extends('admin.master')
@section('title')
Cập nhật sản phẩm
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
                Cập nhật sản phẩm
            </div>
            <div class="card-body">
                <form method="post"  enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="ten_sp">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="ten_sp" id="ten_sp" value="{{$sp->ten_sp}}">
                    </div>
                    <div class="form-group">
                        <label for="ma_loai">Loại sản phẩm</label>
                        <select class="form-control" name="ma_loai" id="ma_loai">
                            <option value="1" @if($sp->ma_loai == 1)
                                selected
                                @endif
                                >Áo thun</option>
                            <option value="2" @if($sp->ma_loai == 2)
                                selected
                                @endif
                                >Áo khoác</option>
                            <option value="3" @if($sp->ma_loai == 3)
                                selected
                                @endif
                                >Áo sơ mi</option>
                            <option value="4" @if($sp->ma_loai == 4)
                                selected
                                @endif
                                >Áo len</option>
                            <option value="5" @if($sp->ma_loai == 5)
                                selected
                                @endif
                                >Quần Jeans</option>
                            <option value="6" @if($sp->ma_loai == 6)
                                selected
                                @endif>Quần Shorts</option>
                            <option value="7" @if($sp->ma_loai == 7)
                                selected
                                @endif>Phụ Kiện</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ma_thuong_hieu">Thương hiệu</label>
                        <select class="form-control" name="ma_thuong_hieu" id="ma_thuong_hieu">
                            <option value="1" @if($sp->ma_loai == 1)
                                selected
                                @endif>Viettien</option>
                            <option value="2" @if($sp->ma_loai == 2)
                                selected
                                @endif>Blue Exchange</option>
                            <option value="3" @if($sp->ma_loai == 3)
                                selected
                                @endif>Yame</option>
                            <option value="4" @if($sp->ma_loai == 4)
                                selected
                                @endif>PT2000</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="mo_ta_tom_tat">Mô tả tóm tắt</label>
                        <input type="text" class="form-control" name="mo_ta_tom_tat" id="mo_ta_tom_tat"
                            value="{{$sp->mo_ta_tom_tat}}">
                    </div>
                    <div class="form-group">
                        <label for="chi_tiet">Nội dung chi tiết</label>
                        <textarea class="form-control" name="chi_tiet" id="chi_tiet"
                            rows="5">{{$sp->chi_tiet}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="gia">Giá sản phẩm</label>
                        <input type="text" class="form-control" name="gia" id="gia" value="{{$sp->gia}}">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="hinh1">Hình 1</label>
                                <input type="file" class="form-control" onchange="Xem_truoc_media1()" name="hinh1"
                                    id="hinh1">
                            </div>
                        </div>
                        <div class="col-6 p-2">
                            <img id="xemhinh1" width="100px">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="hinh2">Hình 2</label>
                                <input type="file" class="form-control" onchange="Xem_truoc_media2()" name="hinh2"
                                    id="hinh2">
                            </div>
                        </div>
                        <div class="col-6 p-2">
                            <img id="xemhinh2" width="100px">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="hinh3">Hình 3</label>
                                <input type="file" class="form-control" onchange="Xem_truoc_media3()" name="hinh3"
                                    id="hinh3">
                            </div>
                        </div>
                        <div class="col-6 p-2">
                            <img id="xemhinh3" width="100px">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="mr-2" for="">Giới tính</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gioi_tinh" id="inlineRadio1" value="1"
                                @if($sp->gioi_tinh ==1)
                            checked
                            @endif>
                            <label class="form-check-label" for="inlineRadio1">Nam</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gioi_tinh" id="inlineRadio2" value="0"
                                @if($sp->gioi_tinh ==0)
                            checked
                            @endif>
                            <label class="form-check-label" for="inlineRadio2">Nữ</label>
                        </div>
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="trang_thai" name="trang_thai" value="1"
                            @if($sp->trang_thai ==1)
                        checked
                        @endif >
                        <label class="form-check-label" for="trang_thai">Trạng thái</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>

    </div>

</div>

@endsection

<script>
    function Xem_truoc_media1() {
        var reader = new FileReader();
        reader.onload = function (e) {
            xemhinh1.src = e.target.result;
        }
        reader.readAsDataURL(hinh1.files[0]);
    }
    function Xem_truoc_media2() {
        var reader = new FileReader();
        reader.onload = function (e) {
            xemhinh2.src = e.target.result;
        }
        reader.readAsDataURL(hinh2.files[0]);
    }
    function Xem_truoc_media3() {
        var reader = new FileReader();
        reader.onload = function (e) {
            xemhinh3.src = e.target.result;
        }
        reader.readAsDataURL(hinh3.files[0]);
    }
</script>
@section('script')
<link rel="stylesheet" href="{{URL::asset('resources/summernote/summernote.min.css')}}">
<script src="{{URL::asset('resources/summernote/summernote.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#chi_tiet').summernote();
    });
</script>
@endsection
