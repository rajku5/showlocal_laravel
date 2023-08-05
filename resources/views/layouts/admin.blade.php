<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bigdeal admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Bigdeal admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('storage/admin/images/favicon/favicon.pngs')}} type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('storage/admin/images/favicon/favicon.pngs')}} type="image/x-icon">
    <title>Show Local</title>

    <!-- Google font-->
    <link href="https:/fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https:/fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{asset('storage/admin/css/font-awesome.css')}}">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('storage/admin/css/flag-icon.css')}}">

    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('storage/admin/css/icofont.css')}}">

    <!-- Prism css-->
    <link rel="stylesheet" type="text/css" href="{{asset('storage/admin/css/prism.css')}}">

    <!-- Chartist css -->
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('storage/admin/css/chartist.css')}}"> --}}

    <!-- vector map css -->
    <link rel="stylesheet" type="text/css" href="{{asset('storage/admin/css/vector-map.css')}}">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('storage/admin/css/bootstrap.css')}}">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('storage/admin/css/admin.css')}}">

    <!-- Custom  css-->
    @stack('css')
</head>

<body>
<!-- page-wrapper Start-->
<div class="page-wrapper">
    <!-- Page Header Start-->
        <div class="page-main-header">
            <div class="main-header-left">
                <div class="logo-wrapper"><a href="{{route('admin.dashboard')}}"><img class="blur-up lazyloaded" src="{{asset('img/logo.svg')}}" alt=""></a></div>
            </div>
            <div class="main-header-right ">
           
                <div class="nav-right col">
                    <ul class="nav-menus">
                 
                   
                        <li><a href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i> Full Screen</a></li>
                        <li class="onhover-dropdown">
                        <i data-feather="user"></i>
                            <ul class="profile-dropdown onhover-show-div p-20 profile-dropdown-hover">
                                <!--<li><a href="javascript:void(0)">Profile<span class="pull-right"><i data-feather="user"></i></span></a></li>-->
                                <li>
                                    <form  action="{{ route('admin.logout') }}" method="POST" id="logout">
                                    {{ csrf_field() }}
                                        <a  href="#" onclick="document.getElementById('logout').submit();" >Logout<span class="pull-right"></span></a>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
                </div>
            </div>
        </div>
 
        <!-- Page Header Ends -->

    <!-- page-wrapper Start-->
    <div class="page-body-wrapper">
    <!-- Page Sidebar Start-->
            <div class="page-sidebar">
                <div class="sidebar custom-scrollbar">
                    <ul class="sidebar-menu">
                        <li><a class="sidebar-header" href="{{route('admin.dashboard')}}"><i data-feather="home"></i><span>Dashboard</span></a></li>
                        <li><a class="sidebar-header" href="javascript:void(0)"><i data-feather="box"></i> <span>Category</span><i class="fa fa-angle-right pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                        <li><a href="{{route('admin.category')}}"><i class="fa fa-circle"></i>Category</a></li>
                                        <li><a href="{{route('admin.subCategory')}}"><i class="fa fa-circle"></i>Sub Category</a></li>
                                        <li><a href="{{route('admin.subsubcategory')}}"><i class="fa fa-circle"></i>Sub Sub Category</a></li>
                            </ul>
                        </li>
                        <li><a class="sidebar-header {{ $menu == 'seller' ? 'active' :''}} " href="{{route('admin.view.seller.list')}}"><i data-feather="user-plus"></i><span>Seller</span></a></li>
                        <li><a class="sidebar-header {{ $menu == 'review' ? 'active' :' '}} " href="{{route('admin.review.list')}}"><i data-feather="user-plus"></i><span>Review</span></a></li>
                        <li><a class="sidebar-header" ><i data-feather="box"></i> <span>Page Setup</span><i class="fa fa-angle-right pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                        <li><a href="{{route('admin.terms-condition')}}"><i class="fa fa-circle"></i>Terms and conditions</a></li>
                                        <li><a href="{{route('admin.privacy-policy')}}"><i class="fa fa-circle"></i>Privacy Policy</a></li>
                                        <li><a href="{{route('admin.about-us')}}"><i class="fa fa-circle"></i>About Us</a></li>
                                        {{-- <li><a href="{{route('admin.subsubcategory')}}"><i class="fa fa-circle"></i>FAQ</a></li> --}}
                                        
                            </ul>
                        </li>
                        <li><a class="sidebar-header {{ $menu == 'setting' ? 'active' :' '}} " href="{{route('admin.setting')}}"><i data-feather="user-plus"></i><span>Setting</span></a></li>
                        <li><a class="sidebar-header {{ $menu == 'subscription' ? 'active' :' '}} " href="{{route('admin.subscription-list')}}"><i data-feather="user-plus"></i><span>Subscriptions</span></a></li>
                        <li><a class="sidebar-header {{ $menu == 'news_offer' ? 'active' :' '}} " href="{{route('admin.news-offer')}}"><i data-feather="user-plus"></i><span>News Offer</span></a></li>                        <li><a class="sidebar-header {{ $menu == 'banner' ? 'active' :' '}} " href="{{route('admin.banner')}}"><i data-feather="user-plus"></i><span>Banner</span></a></li>
                    </ul>
                </div>
            </div>
            <!-- Page Sidebar Ends-->
            <div class="page-body">
             @yield('content')
            </div>
            <!-- footer start-->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 footer-copyright">
                            <p class="mb-0">Copyright 2022 © Techqueto All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- footer end-->
    </div>
</div>

<!-- latest jquery-->
<script src="{{asset('storage/admin/js/jquery-3.3.1.min.js')}}"></script>
<!-- Bootstrap js-->
<script src="{{asset('storage/admin/js/popper.min.js')}}"></script>
<script src="{{asset('storage/admin/js/bootstrap.js')}}"></script>
<!-- feather icon js-->
<script src="{{asset('storage/admin/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('storage/admin/js/icons/feather-icon/feather-icon.js')}}"></script>
<!-- Sidebar jquery-->
<script src="{{asset('storage/admin/js/sidebar-menu.js')}}"></script>

<script src="{{asset('storage/admin/js/lazysizes.min.js')}}"></script>
<!--copycode js-->
<script src="{{asset('storage/admin/js/prism/prism.min.js')}}"></script>
<script src="{{asset('storage/admin/js/clipboard/clipboard.min.js')}}"></script>
<script src="{{asset('storage/admin/js/custom-card/custom-card.js')}}"></script>
<!--counter js-->
<script src="{{asset('storage/admin/js/counter/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('storage/admin/js/counter/jquery.counterup.min.js')}}"></script>
<script src="{{asset('storage/admin/js/counter/counter-custom.js')}}"></script>
<!--Customizer admin-->
<script src="{{asset('storage/admin/js/admin-customizer.js')}}"></script>

<!--right sidebar js-->
<script src="{{asset('storage/admin/js/chat-menu.js')}}"></script>
<!--height equal js-->
<script src="{{asset('storage/admin/js/equal-height.js')}}"></script>
<!-- lazyload js-->
<script src="{{asset('storage/admin/js/lazysizes.min.js')}}"></script>
<!--script admin-->
<script src="{{asset('storage/admin/js/admin-script.js')}}"></script>
@stack('script')
</body>
</html>
