<header class="header-v4">
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    Free shipping for standard order over $100
                </div>

                <div class="right-top-bar flex-w h-full">
                @if(Session::has('ho_ten_kh'))
                    <a href="{{url('khach-hang/infor-customer/'.Session::get('id_kh'))}}" class="flex-c-m p-lr-10 trans-04">
                        {{-- {{Session::get('ho_ten_kh')}} --}}
                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                    </a>
                    <a href="{{url('logout')}}" class="flex-c-m p-lr-10 trans-04">
                        @lang('label.logout')
                    </a>
                @elseif (Cookie::has('ho_ten_kh'))
                    <a href="{{url('khach-hang/infor-customer/'.Cookie::get('id_kh'))}}" class="flex-c-m p-lr-10 trans-04">
                        {{-- {{Cookie::get('ho_ten_kh')}} --}}
                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                    </a>
                    <a href="{{url('logout')}}" class="flex-c-m p-lr-10 trans-04">
                        @lang('label.logout')
                    </a>
                @else
                    <a href="{{url('login')}}" class="flex-c-m p-lr-10 trans-04">
                        @lang('label.login')
                    </a>
                @endif

                    <a href="{!! route('change-language', ['en']) !!}" class="flex-c-m trans-04 p-lr-25">
                        EN
                    </a>

                    <a href="{!! route('change-language', ['vi']) !!}" class="flex-c-m trans-04 p-lr-25">
                        VI
                    </a>
                </div>
            </div>
        </div>

        <div class="wrap-menu-desktop how-shadow1">
            <nav class="limiter-menu-desktop container">

                <!-- Logo desktop -->
                <a href="{{url('/')}}" class="logo">
                    <img src="{{URL::asset('public/template/client/images/icons/logo-01.png')}}" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li>
                            <a href="{{url('/')}}">@lang('label.home')</a>

                        </li>

                        <li class="active-menu">
                            <a href="#">@lang('label.products')</a>
                            <ul class="sub-menu">
                                <li><a href="{{url('san-pham/nu')}}">@lang('label.women')</a></li>
                                <li><a href="{{url('san-pham/nam')}}">@lang('label.men')</a></li>
                                <li><a href="home-03.html">@lang('label.accessories')</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="product.html">@lang('label.brand')</a>
                            <ul class="sub-menu">
                                <li><a href="{{url('san-pham/viet-tien')}}">Viettien</a></li>
                                <li><a href="{{url('san-pham/pt2000')}}">PT2000</a></li>
                                <li><a href="{{url('san-pham/yame')}}">YaMe</a></li>
                                <li><a href="{{url('san-pham/blue-exchange')}}">Blue Exchange</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{url('tin-tuc')}}">@lang('label.blog')</a>
                        </li>

                        <li>
                            <a href="{{url('contact')}}">@lang('label.contact')</a>
                        </li>
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>
                    @if(Cart::count() !== 0 )
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" id="total-qty-show" data-notify="{{Cart::count()}}">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                    @else
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" id="total-qty-show" data-notify="0">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                    @endif
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="{{url('/')}}"><img src="{{URL::asset('public/template/client/images/icons/logo-01.png')}}" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="topbar-mobile">
            <li>
                <div class="left-top-bar">
                    Free shipping for standard order over $100
                </div>
            </li>

            <li>
                <div class="right-top-bar flex-w h-full">

                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        Help & FAQs
                    </a>

                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        My Account
                    </a>

                    <a href="{!! route('change-language', ['en']) !!}" class="flex-c-m p-lr-10 trans-04">
                        EN
                    </a>

                    <a href="{!! route('change-language', ['vi']) !!}" class="flex-c-m p-lr-10 trans-04">
                        vI
                    </a>
                </div>
            </li>
        </ul>

        <ul class="main-menu-m">
            <li>
                <a href="{{url('/')}}">@lang('label.home')</a>
            </li>

            <li>
                <a href="product.html">@lang('label.products')</a>
                <ul class="sub-menu-m">
                    <li><a href="{{url('san-pham/nu')}}">@lang('label.women')</a></li>
                    <li><a href="{{url('san-pham/nam')}}">@lang('label.men')</a></li>
                    <li><a href="home-03.html">@lang('label.accessories')</a></li>
                </ul>
                <span class="arrow-main-menu-m">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
            </li>

            <li>
                <a href="product.html">@lang('label.brand')</a>
                <ul class="sub-menu-m">
                    <li><a href="{{url('san-pham/viet-tien')}}">Viettien</a></li>
                    <li><a href="{{url('san-pham/pt2000')}}">PT2000</a></li>
                    <li><a href="{{url('san-pham/yame')}}">YaMe</a></li>
                    <li><a href="{{url('san-pham/blue-exchange')}}">Blue Exchange</a></li>
                </ul>
                <span class="arrow-main-menu-m">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
            </li>

            <li>
                <a href="{{url('tin-tuc')}}">@lang('label.blog')</a>
            </li>

            <li>
                <a href="{{url('contact')}}">@lang('label.contact')</a>
            </li>
        </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="{{URL::asset('public/template/client/images/icons/icon-close2.png')}}" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search...">
            </form>
        </div>
    </div>
</header>
