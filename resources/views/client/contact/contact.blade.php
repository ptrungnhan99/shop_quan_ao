@extends('client.master')
@section('title')
    Thời trang việt
@endsection
@section('content')
    <!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{URL::asset('public/template/client/images/bg-01.jpg')}});">
		<h2 class="ltext-105 cl0 txt-center">
			Liên hệ
		</h2>
	</section>


	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form method="POST">
                        @if (session('alert'))
                            <div class="alert alert-danger">
                                {{session('alert')}}
                            </div>
                        @endif
                        @csrf
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Liên hệ với chúng tôi
						</h4>

						<div class="form-group">
						  <label for="name">Tên của bạn</label>
						  <input type="text" name="ho_ten" id="name" class="form-control" >
                            @if (count($errors)>0)
                            <small class="text-danger">
                                @foreach ($errors->get('ho_ten') as $message )
                                    {{$message}} <br>
                                @endforeach
                            </small>
                            @endif
						</div>

						<div class="form-group">
							<label for="dien_thoai">Điện thoại</label>
							<input type="text" name="dien_thoai" id="dien_thoai" class="form-control">
                            @if (count($errors)>0)
                            <small class="text-danger">
                                @foreach ($errors->get('dien_thoai') as $message )
                                    {{$message}} <br>
                                @endforeach
                            </small>
                            @endif
						</div>

						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" name="email" id="email" class="form-control" >
                            @if (count($errors)>0)
                            <small class="text-danger">
                                @foreach ($errors->get('email') as $message )
                                    {{$message}} <br>
                                @endforeach
                            </small>
                            @endif
						</div>
						<div class="form-group">
							<label for="tieu_de">Tiêu đề</label>
							<input type="text" name="tieu_de" id="tieu_de" class="form-control">
                            @if (count($errors)>0)
                            <small class="text-danger">
                                @foreach ($errors->get('tieu_de') as $message )
                                    {{$message}} <br>
                                @endforeach
                            </small>
                            @endif
						</div>

						<div class="form-group">
                            <label for="noi_dung">Nội dung</label>
                            <textarea  class="form-control" name="noi_dung" id="noi_dung" rows="5"></textarea>
                            @if (count($errors)>0)
                            <small class="text-danger">
                                @foreach ($errors->get('noi_dung') as $message )
                                    {{$message}} <br>
                                @endforeach
                            </small>
                            @endif
                        </div>
						<button id="btnSend" type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							Gửi
						</button>
					</form>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Địa chỉ
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								103 ĐH 20, Cần Giuộc, Long An
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Đường dây nóng
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								+1 800 1236879
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Hỗ trợ bán hàng
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								contact@example.com
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
