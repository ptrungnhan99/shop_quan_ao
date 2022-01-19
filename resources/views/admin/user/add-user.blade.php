@extends('admin.master')
@section('title')
    Thêm Người Dùng
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
              Thêm Người Dùng
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Họ và tên</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                        @if (count($errors)>0)
                            <small class="text-danger">
                                @foreach ($errors->get('name') as $message )
                                    {{$message}} <br>
                                @endforeach
                            </small>
                        @endif
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                      @if (count($errors)>0)
                            <small class="text-danger">
                                @foreach ($errors->get('email') as $message )
                                    {{$message}} <br>
                                @endforeach
                            </small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
                        @if (count($errors)>0)
                              <small class="text-danger">
                                  @foreach ($errors->get('password') as $message )
                                      {{$message}} <br>
                                  @endforeach
                              </small>
                          @endif
                    </div>
                    <div class="form-group">
                        <label for="">Nhập lại mật khẩu</label>
                        <input type="password" name="re-password" id="" class="form-control" placeholder="" >
                        @if (count($errors)>0)
                        <small class="text-danger">
                            @foreach ($errors->get('re-password') as $message )
                            {{$message}} <br>
                            @endforeach
                        </small>
                        @endif
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

