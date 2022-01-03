@extends('admin.master')
@section('title')
    Thêm sản phẩm
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
              Thêm Sản phẩm
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="ten_sp">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="ten_sp" id="ten_sp" value="{{old('ten_sp')}}">
                        @if (count($errors)>0)
                            <small class="text-danger">
                                @foreach ($errors->get('ten_sp') as $message )
                                    {{$message}} <br>
                                @endforeach
                            </small>
                        @endif
                    </div>
                    {{-- <div class="form-group">
                        <label for="ma_loai">Loại sản phẩm</label>
                        <input type="text" class="form-control" name="ma_loai" id="ma_loai" value="{{old('ma_loai')}}">
                        @if (count($errors)>0)
                            <small class="text-danger">
                                @foreach ($errors->get('ma_loai') as $message )
                                    {{$message}} <br>
                                @endforeach
                            </small>
                        @endif
                    </div> --}}
                    <div class="form-group">
                        <label for="ma_loai">Loại sản phẩm</label>
                        <select class="form-control" name="ma_loai" id="ma_loai">
                            <option value="" disabled selected>Chọn loại sản phẩm</option>
                            <option value="1">Áo thun</option>
                            <option value="2">Áo khoác</option>
                            <option value="3">Áo sơ mi</option>
                            <option value="4">Áo len</option>
                            <option value="5">Quần Jeans</option>
                            <option value="6">Quần Shorts</option>
                            <option value="7">Phụ Kiện</option>
                        </select>
                        @if (count($errors)>0)
                            <small class="text-danger">
                                @foreach ($errors->get('ma_loai') as $message )
                                    {{$message}} <br>
                                @endforeach
                            </small>
                        @endif
                    </div>
                    {{-- <div class="form-group">
                        <label for="ma_thuong_hieu">Thương hiệu</label>
                        <input type="text" class="form-control" name="ma_thuong_hieu" id="ma_thuong_hieu" value="{{old('ma_thuong_hieu')}}">
                        @if (count($errors)>0)
                            <small class="text-danger">
                                @foreach ($errors->get('ma_thuong_hieu') as $message )
                                    {{$message}} <br>
                                @endforeach
                            </small>
                        @endif
                    </div> --}}
                    <div class="form-group">
                        <label for="ma_thuong_hieu">Thương hiệu</label>
                        <select class="form-control" name="ma_thuong_hieu" id="ma_thuong_hieu">
                            <option value="" disabled selected>Chọn thương hiệu</option>
                            <option value="1">Viettien</option>
                            <option value="2">Blue Exchange</option>
                            <option value="3">Yame</option>
                            <option value="4">PT2000</option>
                        </select>
                        @if (count($errors)>0)
                            <small class="text-danger">
                                @foreach ($errors->get('ma_thuong_hieu') as $message )
                                    {{$message}} <br>
                                @endforeach
                            </small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="mo_ta_tom_tat">Mô tả tóm tắt</label>
                        <input type="text" class="form-control" name="mo_ta_tom_tat" id="mo_ta_tom_tat" value="{{old('mo_ta_tom_tat')}}">
                        @if (count($errors)>0)
                            <small class="text-danger">
                                @foreach ($errors->get('mo_ta_tom_tat') as $message )
                                    {{$message}} <br>
                                @endforeach
                            </small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="chi_tiet">Nội dung chi tiết</label>
                        <textarea  class="form-control" name="chi_tiet" id="chi_tiet" rows="5">{{old('chi_tiet')}}</textarea>
                        @if (count($errors)>0)
                            <small class="text-danger">
                                @foreach ($errors->get('chi_tiet') as $message )
                                    {{$message}} <br>
                                @endforeach
                            </small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="gia">Giá sản phẩm</label>
                        <input type="text" class="form-control" name="gia" id="gia" value="{{old('gia')}}">
                        @if (count($errors)>0)
                            <small class="text-danger">
                                @foreach ($errors->get('gia') as $message )
                                    {{$message}} <br>
                                @endforeach
                            </small>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="hinh1">Hình 1</label>
                                <input type="file" class="form-control" onchange="Xem_truoc_media1()" name="hinh1" id="hinh1">
                                @if (count($errors)>0)
                                    <small class="text-danger">
                                    @foreach ($errors->get('hinh1') as $message )
                                        {{$message}} <br>
                                    @endforeach
                                </small>
                                 @endif
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
                                <input type="file" class="form-control"onchange="Xem_truoc_media2()" name="hinh2" id="hinh2">
                                @if (count($errors)>0)
                                    <small class="text-danger">
                                    @foreach ($errors->get('hinh2') as $message )
                                        {{$message}} <br>
                                    @endforeach
                                </small>
                                 @endif
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
                                <input type="file" class="form-control"onchange="Xem_truoc_media3()" name="hinh3" id="hinh3">
                                @if (count($errors)>0)
                                    <small class="text-danger">
                                    @foreach ($errors->get('hinh3') as $message )
                                        {{$message}} <br>
                                    @endforeach
                                </small>
                                 @endif
                            </div>
                        </div>
                        <div class="col-6 p-2">
                            <img id="xemhinh3" width="100px">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="mr-2" for="">Giới tính</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gioi_tinh" id="inlineRadio1" checked value="1">
                            <label class="form-check-label" for="inlineRadio1">Nam</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gioi_tinh" id="inlineRadio2" value="0">
                            <label class="form-check-label" for="inlineRadio2">Nữ</label>
                        </div>
                    </div>

                    <div class="form-group form-check">
                      <input type="checkbox" class="form-check-input" id="trang_thai" name="trang_thai" value="1"
                      <?php echo old('trang_thai') ? 'checked ="checked"' : "" ?> >
                      <label class="form-check-label" for="trang_thai">Trạng thái</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                  </form>
            </div>
        </div>

    </div>

</div>

@endsection

<script>
    function Xem_truoc_media1(){
        var reader = new FileReader();
        reader.onload = function(e){
            xemhinh1.src = e.target.result;
        }
        reader.readAsDataURL(hinh1.files[0]);
    }
    function Xem_truoc_media2(){
        var reader = new FileReader();
        reader.onload = function(e){
            xemhinh2.src = e.target.result;
        }
        reader.readAsDataURL(hinh2.files[0]);
    }
    function Xem_truoc_media3(){
        var reader = new FileReader();
        reader.onload = function(e){
            xemhinh3.src = e.target.result;
        }
        reader.readAsDataURL(hinh3.files[0]);
    }
</script>
@section('script')
<link rel="stylesheet" href="{{URL::asset('resources/summernote/summernote.min.css')}}">
<script src="{{URL::asset('resources/summernote/summernote.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#chi_tiet').summernote();
    });
</script>
@endsection
