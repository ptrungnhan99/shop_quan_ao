@extends('client.master')
@section('title')
    Thời trang việt
@endsection
@section('content')
    <!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="product.html" class="stext-109 cl8 hov-cl1 trans-04">
				Men
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Lightweight Jacket
			</span>
		</div>
	</div>


	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="{{URL::asset('storage/app/hinh_san_pham/'.$sp->hinh1)}}">
									<div class="wrap-pic-w pos-relative">
										<img src="{{URL::asset('storage/app/hinh_san_pham/'.$sp->hinh1)}}" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{URL::asset('storage/app/hinh_san_pham/'.$sp->hinh1)}}">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

								<div class="item-slick3" data-thumb="{{URL::asset('storage/app/hinh_san_pham/'.$sp->hinh2)}}">
									<div class="wrap-pic-w pos-relative">
										<img src="{{URL::asset('storage/app/hinh_san_pham/'.$sp->hinh2)}}" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{URL::asset('storage/app/hinh_san_pham/'.$sp->hinh2)}}">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

								<div class="item-slick3" data-thumb="{{URL::asset('storage/app/hinh_san_pham/'.$sp->hinh3)}}">
									<div class="wrap-pic-w pos-relative">
										<img src="{{URL::asset('storage/app/hinh_san_pham/'.$sp->hinh3)}}" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{URL::asset('storage/app/hinh_san_pham/'.$sp->hinh3)}}">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							{{$sp->ten_sp}}
						</h4>

						<span class="mtext-106 cl2">
							{{number_format($sp->gia)}}đ
						</span>

						<div class="stext-102 cl3 p-t-23">
							{!!$sp->chi_tiet!!}
						</div>

						<!--  -->
						<div class="p-t-33">
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
									<div class="wrap-num-product flex-w m-r-20 m-tb-10">
										<input type="hidden" name="idsp" id="idsp" value="{{$sp->id}}">

                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input class="mtext-104 cl3 txt-center num-product" type="number" id="soluong" name="soluong" value="1">

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>

									<button id="btnAdd" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
										Add to cart
									</button>
								</div>
							</div>
						</div>

						<!--  -->
						<div class="flex-w flex-m p-l-100 p-t-40 respon7">
							<div class="flex-m bor9 p-r-10 m-r-11">
								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
									<i class="zmdi zmdi-favorite"></i>
								</a>
							</div>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
								<i class="fa fa-facebook"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
								<i class="fa fa-twitter"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
								<i class="fa fa-google-plus"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
		</div>
	</section>


	<!-- Related Products -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					Sản phẩm liên quan
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
                    @foreach ( $sp_lq as $sp )
                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="{{URL::asset('storage/app/hinh_san_pham/'.$sp->hinh1)}}" alt="IMG-PRODUCT">

							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="{{url('san-pham/'.$sp->ten_url.'-'.$sp->id)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										{{$sp->ten_sp}}
									</a>

									<span class="stext-105 cl3">
										{{number_format($sp->gia)}}đ
									</span>
								</div>
							</div>
						</div>
					</div>
                    @endforeach
				</div>
			</div>
		</div>
	</section>
@endsection
@section('script')
    <script>
        $('#btnAdd').click(function(){
            var id = $('#idsp').val();
            var soluong = $('#soluong').val();
            if(soluong <= 0){
               alert('Số lượng không hợp lệ');
               return false;
            }
            $.ajax({
                type: 'POST',
                // dataType: 'json',
                url: "{{url('khach-hang/add-to-cart')}}/" + id,
                data: { _token: '<?php echo csrf_token()?>', sl: soluong},
                success:function(data){
                    // alert('Thành công');
                    if(data.n == 0){
                        alert('Thêm giỏ hàng không thành công');
                    }else{
                        // alert('Đã thêm giỏ hàng');
                        $('#change-item-cart').empty();
                        $('#change-item-cart').append(data);
                        var a = $('#total-quanty-cart').val();
                        // console.log(a);
                        $('#total-qty-show').attr("data-notify",a);
                        swal('Sản phẩm', "đã được thêm vào giỏ hàng !", "success");
                    }
                },
                error:function(xhr,status,error){
                    alert(error);
                }
            });
        });
    </script>
@endsection
