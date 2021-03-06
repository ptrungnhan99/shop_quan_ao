@extends('client.master')
@section('title')
    Thời trang việt
@endsection
@section('content')
    <!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
                @foreach ( $slider as $sl )
				<div class="item-slick1" style="background-image: url({{URL::asset('storage/app/hinh_slider/'.$sl->hinh)}});">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									{{$sl->ten_slider}}
								</span>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									{{$sl->tieu_de}}
								</h2>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									MUA NGAY
								</a>
							</div>
						</div>
					</div>
				</div>
                @endforeach
			</div>
		</div>
	</section>


	<!-- Banner -->
	<div class="sec-banner bg0 p-t-80 p-b-50">
		<div class="container">
			<div class="row">
                @foreach ( $banner as  $ban)
                <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="{{URL::asset('storage/app/hinh_banner/'.$ban->hinh)}}" alt="IMG-BANNER">

						<a href="{{url($ban->ten_url)}}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									{{$ban->ten_banner}}
								</span>

								<span class="block1-info stext-102 trans-04">
									{{$ban->tieu_de}}
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Mua Ngay
								</div>
							</div>
						</a>
					</div>
				</div>
                @endforeach
			</div>
		</div>
	</div>

    <!-- Product -->
	<section class="sec-product bg0  p-b-50">
		<div class="container">
			<div class="p-b-32">
				<h3 class="ltext-105 cl5 txt-center respon1">
					@lang('label.womenfashion')
				</h3>
			</div>

			<!-- Tab01 -->
			<div class="tab01">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
                    @foreach ( $dsLSP as $lsp )
                        <li class="nav-item p-b-10">
                            <a class="nav-link <?php if($lsp->id == 1){ echo 'active';} ?>" data-toggle="tab"  href="#women{{$lsp->id}}" role="tab">{{$lsp->ten_loai}}</a>
                        </li>
                    @endforeach

				</ul>

				<!-- Tab panes -->
				<div class="tab-content p-t-50">
					<!-- - -->
                    @foreach ( $lsp_sp as $lsp => $dssp )

					<div class="tab-pane fade show <?php if($lsp==1){ echo 'active';} ?>" id="women{{$lsp}}" role="tabpanel">
						<!-- Slide2 -->
						<div class="wrap-slick2">
							<div class="slick2">
                                @foreach ( $dssp as $sp )
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

                    @endforeach
				</div>
			</div>
		</div>
	</section>

    <!-- Product -->
	<section class="sec-product bg0 p-b-50">
		<div class="container">
			<div class="p-b-32">
				<h3 class="ltext-105 cl5 txt-center respon1">
					@lang('label.menfashion')
				</h3>
			</div>

			<!-- Tab01 -->
			<div class="tab01">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
                    @foreach ( $dsLSP1 as $lsp )
                        <li class="nav-item p-b-10">
                            <a class="nav-link <?php if($lsp->id == 1){ echo 'active';} ?>" data-toggle="tab"  href="#men{{$lsp->id}}" role="tab">{{$lsp->ten_loai}}</a>
                        </li>
                    @endforeach

				</ul>

				<!-- Tab panes -->
				<div class="tab-content p-t-50">
					<!-- - -->
                    @foreach ( $lsp_sp1 as $lsp => $dssp )

					<div class="tab-pane fade show <?php if($lsp==1){ echo 'active';} ?>" id="men{{$lsp}}" role="tabpanel">
						<!-- Slide2 -->
						<div class="wrap-slick2">
							<div class="slick2">
                                @foreach ( $dssp as $sp )
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

                    @endforeach
				</div>
			</div>
		</div>
	</section>

	<!-- Blog -->
	<section class="sec-blog bg0 p-t-60 p-b-90">
		<div class="container">
			<div class="p-b-66">
				<h3 class="ltext-105 cl5 txt-center respon1">
					@lang('label.blog')
				</h3>
			</div>

			<div class="row">
                @foreach ($dstt as $tt )
                <div class="col-sm-6 col-md-4 p-b-40">
					<div class="blog-item">
						<div class="hov-img0">
							<a href="blog-detail.html">
								<img src="{{URL::asset('storage/app/hinh_tin_tuc/'.$tt->hinh)}}" alt="IMG-BLOG">
							</a>
						</div>

						<div class="p-t-15">
							<div class="stext-107 flex-w p-b-14">
								<span class="m-r-3">
									<span class="cl4">
										By
									</span>

									<span class="cl5">
										{{$tt->tac_gia}}
									</span>
								</span>

								<span>
									<span class="cl4">
										on
									</span>

									<span class="cl5">
										{{$tt->created_at}}
									</span>
								</span>
							</div>

							<h4 class="p-b-12">
								<a href="blog-detail.html" class="mtext-101 cl2 hov-cl1 trans-04">
									{{$tt->tieu_de}}
								</a>
							</h4>

							<p class="stext-108 cl6">
								{{$tt->tom_tat}}
							</p>
						</div>
					</div>
				</div>
                @endforeach

			</div>
		</div>
	</section>
@endsection
