@extends('admin.master')
@section('title')
    Thêm Tin Tức
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
              Thêm Tin Tức
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="tieu_de">Tên tiêu đề</label>
                        <input type="text" class="form-control" name="tieu_de" id="tieu_de" value="{{old('tieu_de')}}">
                        @if (count($errors)>0)
                            <small class="text-danger">
                                @foreach ($errors->get('tieu_de') as $message )
                                    {{$message}} <br>
                                @endforeach
                            </small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tom_tat">Mô tả tóm tắt</label>
                        <textarea  class="form-control" name="tom_tat" id="tom_tat" rows="3">{{old('tom_tat')}}</textarea>
                        @if (count($errors)>0)
                              <small class="text-danger">
                                  @foreach ($errors->get('tom_tat') as $message )
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
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="hinh">Hình</label>
                                <input type="file" class="form-control"onchange="Xem_truoc_media()" name="hinh" id="hinh">
                                @if (count($errors)>0)
                                    <small class="text-danger">
                                    @foreach ($errors->get('hinh') as $message )
                                        {{$message}} <br>
                                    @endforeach
                                </small>
                                 @endif
                            </div>
                        </div>
                        <div class="col-6">
                            <img id="xemhinh" width="100px">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tac_gia">Tác giả</label>
                        <input type="text" class="form-control" id="tac_gia" name="tac_gia" value="{{old('tac_gia')}}">
                        @if (count($errors)>0)
                              <small class="text-danger">
                                  @foreach ($errors->get('tac_gia') as $message )
                                      {{$message}} <br>
                                  @endforeach
                              </small>
                          @endif
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
    function Xem_truoc_media(){
        var reader = new FileReader();
        reader.onload = function(e){
            xemhinh.src = e.target.result;
        }
        reader.readAsDataURL(hinh.files[0]);
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
