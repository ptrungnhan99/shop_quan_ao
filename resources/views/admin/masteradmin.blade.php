
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('title')</title>

   @include('admin.head')

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    <img src="{{URL::asset('public/template/admin/images/icon/logo-white.png')}}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="{{URL::asset('public/template/admin/images/icon/avatar-big-01.jpg')}}" alt="John Doe" />
                    </div>
                    <h4 class="name">john doe</h4>
                    <a href="#">Sign out</a>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-th"></i>Slider
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{url('/slider/them')}}">
                                        <i class="far fa-circle"></i>Thêm slider</a>
                                </li>
                                <li>
                                    <a href="{{url('/slider')}}">
                                        <i class="far fa-circle"></i>Danh sách slider</a>
                                </li>
                            </ul>
                        </li>

                        <li class="has-sub">
                            <a class="js-arrow open" href="#">
                                <i class="fa fa-th"></i>Banner
                                <span class="arrow up">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list" style="display: block;">
                                <li>
                                    <a href="{{url('banner/them')}}">
                                        <i class="far fa-circle"></i>Thêm Banner</a>
                                </li>
                                <li>
                                    <a href="{{url('banner')}}">
                                        <i class="far fa-circle"></i>Danh sách Banner</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow open" href="#">
                                <i class="fa fa-th"></i>Loại sản phẩm
                                <span class="arrow up">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list" style="display: block;">
                                <li>
                                    <a href="table.html">
                                        <i class="far fa-circle"></i>Thêm loại sản phẩm</a>
                                </li>
                                <li>
                                    <a href="form.html">
                                        <i class="far fa-circle"></i>Danh sách loại sản phẩm</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow open" href="#">
                                <i class="fa fa-th"></i>Sản phẩm
                                <span class="arrow up">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list" style="display: block;">
                                <li>
                                    <a href="table.html">
                                        <i class="far fa-circle"></i>Thêm sản phẩm</a>
                                </li>
                                <li>
                                    <a href="form.html">
                                        <i class="far fa-circle"></i>Danh sách sản phẩm</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow open" href="#">
                                <i class="fa fa-th"></i>Tin tức
                                <span class="arrow up">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list" style="display: block;">
                                <li>
                                    <a href="table.html">
                                        <i class="far fa-circle"></i>Thêm tin tức</a>
                                </li>
                                <li>
                                    <a href="form.html">
                                        <i class="far fa-circle"></i>Danh sách tin tức</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="{{URL::asset('public/template/admin/images/icon/logo-white.png')}}" alt="CoolAdmin" />
                                </a>
                            </div>
                            <div class="header-button2">

                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-settings"></i>Setting</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-money-box"></i>Billing</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-globe"></i>Language</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-pin"></i>Location</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-email"></i>Email</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-notifications"></i>Notifications</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                <div class="logo">
                    <a href="#">
                        <img src="{{URL::asset('public/template/admin/images/icon/logo-white.png')}}" alt="Cool Admin" />
                    </a>
                </div>
                <div class="menu-sidebar2__content js-scrollbar2">
                    <div class="account2">
                        <div class="image img-cir img-120">
                            <img src="{{URL::asset('public/template/admin/images/icon/avatar-big-01.jpg')}}" alt="John Doe" />
                        </div>
                        <h4 class="name">john doe</h4>
                        <a href="#">Sign out</a>
                    </div>
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
                            <li class="active has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fa fa-th"></i>Slider
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="{{url('/slider/them')}}">
                                            <i class="far fa-circle"></i>Thêm slider</a>
                                    </li>
                                    <li>
                                        <a href="{{url('slider')}}">
                                            <i class="far fa-circle"></i>Danh sách slider</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="has-sub">
                                <a class="js-arrow open" href="#">
                                    <i class="fa fa-th"></i>Banner
                                    <span class="arrow up">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list" style="display: block;">
                                    <li>
                                        <a href="{{url('banner/them')}}">
                                            <i class="far fa-circle"></i>Thêm Banner</a>
                                    </li>
                                    <li>
                                        <a href="{{url('banner')}}">
                                            <i class="far fa-circle"></i>Danh sách Banner</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow open" href="#">
                                    <i class="fa fa-th"></i>Loại sản phẩm
                                    <span class="arrow up">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list" style="display: block;">
                                    <li>
                                        <a href="table.html">
                                            <i class="far fa-circle"></i>Thêm loại sản phẩm</a>
                                    </li>
                                    <li>
                                        <a href="form.html">
                                            <i class="far fa-circle"></i>Danh sách loại sản phẩm</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow open" href="#">
                                    <i class="fa fa-th"></i>Sản phẩm
                                    <span class="arrow up">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list" style="display: block;">
                                    <li>
                                        <a href="table.html">
                                            <i class="far fa-circle"></i>Thêm sản phẩm</a>
                                    </li>
                                    <li>
                                        <a href="form.html">
                                            <i class="far fa-circle"></i>Danh sách sản phẩm</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow open" href="#">
                                    <i class="fa fa-th"></i>Tin tức
                                    <span class="arrow up">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list" style="display: block;">
                                    <li>
                                        <a href="table.html">
                                            <i class="far fa-circle"></i>Thêm tin tức</a>
                                    </li>
                                    <li>
                                        <a href="form.html">
                                            <i class="far fa-circle"></i>Danh sách tin tức</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END HEADER DESKTOP-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            @section('content')

                           @show
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>

    @include('admin.footer');

</body>

</html>
<!-- end document-->
