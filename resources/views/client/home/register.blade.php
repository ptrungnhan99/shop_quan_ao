<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Thời trang việt</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 mb-3">
                <h3 class="text-success text-center">Đăng ký</h3>
            </div>
            <div class="col-12">
                @if (session('alert'))
                <div class="alert alert-success">
                    {{session('alert')}}
                </div>
                @endif
                <form action="" method="post" role="form">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6">
                            <label>Họ KH</label>
                            <input type="text" name="ho_kh" class="form-control select2" value="{{ old('ho_kh')}}">
                            <small id="ho_khHelp" class="form-text text-muted">
                                @if ($errors->has('ho_kh'))
                                {{ $errors->first('ho_kh') }}
                                @endif
                            </small>
                        </div>
                        <div class="col-md-6">
                            <label>Tên KH</label>
                            <input type="text" name="ten_kh" class="form-control select2" value="{{ old('ten_kh')}}">
                            <small id="ten_khHelp" class="form-text text-muted">
                                @if ($errors->has('ten_kh'))
                                {{ $errors->first('ten_kh') }}
                                @endif
                            </small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input type="text" name="dia_chi" class="form-control select2" value="{{ old('dia_chi')}}">
                        <small id="ho_khHelp" class="form-text text-muted">
                            @if ($errors->has('dia_chi'))
                            {{ $errors->first('dia_chi') }}
                            @endif
                        </small>
                    </div>
                    <div class="form-group">
                        <label>Điện thoại</label>
                        <input type="text" name="dien_thoai" class="form-control select2"
                            value="{{ old('dien_thoai')}}">
                            <small id="ho_khHelp" class="form-text text-muted">
                                @if ($errors->has('dien_thoai'))
                                {{ $errors->first('dien_thoai') }}
                                @endif
                            </small>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control select2" value="{{ old('email')}}">
                        <small id="ho_khHelp" class="form-text text-muted">
                            @if ($errors->has('email'))
                            {{ $errors->first('email') }}
                            @endif
                        </small>
                    </div>
                    <div class="box-footer d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                        <a href="{{url('login')}}">Đăng nhập</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>


</body>

</html>
