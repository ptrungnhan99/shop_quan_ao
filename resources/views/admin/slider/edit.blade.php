@extends('admin.master')
@section('title')
    Cập nhật slider
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
              Cập nhật Slider
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="ten_slider">Tên Slider</label>
                        <input type="text" class="form-control" name="ten_slider" id="ten_slider" value="{{$slider->ten_slider}}">
                        {{-- @if (count($errors)>0)
                            <small class="text-danger">
                                @foreach ($errors->get('ten_slider') as $message )
                                    {{$message}} <br>
                                @endforeach
                            </small>
                        @endif --}}
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="hinh">Hình</label>
                                <input type="file" class="form-control"onchange="Xem_truoc_media()" name="hinh" id="hinh">
                                {{-- @if (count($errors)>0)
                                    <small class="text-danger">
                                    @foreach ($errors->get('hinh') as $message )
                                        {{$message}} <br>
                                    @endforeach
                                </small>
                                 @endif --}}
                            </div>
                        </div>
                        <div class="col-6">
                            <img id="xemhinh" width="100px">
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="tieu_de">Tiêu đề</label>
                      <input type="text" class="form-control" id="tieu_de" name="tieu_de" value="{{$slider->tieu_de}}">
                      {{-- @if (count($errors)>0)
                            <small class="text-danger">
                                @foreach ($errors->get('tieu_de') as $message )
                                    {{$message}} <br>
                                @endforeach
                            </small>
                        @endif --}}
                    </div>
                    <div class="form-group form-check">
                      <input type="checkbox" class="form-check-input" id="trang_thai" name="trang_thai" value="1"
                      @if ($slider->trang_thai == 1)
                        checked = "checked"
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
    function Xem_truoc_media(){
        var reader = new FileReader();
        reader.onload = function(e){
            xemhinh.src = e.target.result;
        }
        reader.readAsDataURL(hinh.files[0]);
    }
</script>

