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
                <div class="logo-wrapper"><a href="dashboard"><img class="blur-up lazyloaded" src="{{asset('img/logo.svg')}}" alt=""></a></div>
            </div>
            <div class="main-header-right ">
           
                <div class="nav-right col">
                    <ul class="nav-menus">
                 
                    
                        <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
                        <li class="onhover-dropdown">
                            <div class="media align-items-center">
                                <div class="dotted-animation"><span class="animate-circle"></span><span class="main-circle"></span></div>
                            </div>
                            <ul class="profile-dropdown onhover-show-div p-20 profile-dropdown-hover">
                                <li><a href="javascript:void(0)">Profile<span class="pull-right"><i data-feather="user"></i></span></a></li>
                                <li>
                                    <form  action="{{ route('seller.logout') }}" method="POST" id="logout">
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
                <div class="sidebar custom-scrollbar noprint">
                    <ul class="sidebar-menu">
                        <li><a class="sidebar-header" href="dashboard"><i data-feather="home"></i><span>Dashboard</span></a></li>
                        <li><a class="sidebar-header {{ $menu == 'setting' ? 'active' :' '}} " href="qr-code"><i data-feather="user-plus"></i><span>QR Code</span></a></li>
                        <li><a class="sidebar-header {{ $menu == 'profile' ? 'active' :' '}} " href="profile"><i data-feather="user-plus"></i><span>Profile</span></a></li>
                        <li><a class="sidebar-header {{ $menu == 'subscriptions' ? 'active' :' '}} " href="view-subscriptions"><i data-feather="user-plus"></i><span>Subscriptions</span></a></li>
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
<!--script qr download-->
<script src="https://cdn.rawgit.com/tsayen/dom-to-image/bfc00a6c5bba731027820199acd7b0a6e92149d8/dist/dom-to-image.min.js"></script>
@stack('script')
</body>
</html>
