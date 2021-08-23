<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tryout UNY</title>
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    @stack('style')
</head>
<body>
    <header class="header-section d-lg-block d-none" style="margin-bottom: -610px;">
        <div class="header-bottom sticky-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="main-menu" style="">
                            <div style="background-color: #0076fa; color: white;">
                                <nav class="container" style="color: white;">
                                    <ul>
                                        <li class="has-dropdown">
                                            <a class="main-menu-link" href="index.html" style="padding: 5px; font-size:10px;"><img src="{{ asset('assets/logo.png')}}" style="width: 50px;" alt=""></a>
                                        
                                        </li>
                                        <li class="has-dropdown">
                                            <a class="main-menu-link" href="index.html" style="padding: 2px; font-size:13px;color: white;">Administrator TryOut UNY</a>                                        
                                        </li>
                                        
                                        <li class="has-dropdown" style="float: right;">
                                            <a class="main-menu-link" href="index.html" style="padding: 2px; font-size:10px; padding-right: 10px; color: white;">Bahasa <i class="fa fa-angle-down"></i></a>
                                            <ul class="sub-menu">
                                                <li><a href="#">Link Variable 0</a></li>
                                                <li> <form action="{{ route("logout") }}" method="post">
                                        @csrf
                                        <button type="submit" class="text-dark" style="border: none; outline: none; background: none; padding: 0">
                                            <i class="fa fa-sign-out-alt mr-2" aria-hidden="true"></i>
                                            Sign Out
                                        </button>
                                    </form></li>
                                            </ul>
                                        </li>
                                        <li class="has-dropdown" style="float: right;">
                                            <a class="main-menu-link" href="index.html" style="padding: 2px; font-size:10px;">Login <i class="fa fa-angle-down"></i></a>
                                            <ul class="sub-menu">
                                                <li><a href="#">Link Variable 0</a></li>
                                                <li><a href="#">Link Variable 0</a></li>
                                            </ul>
                                        </li>
                                    </ul>    
                                </nav>
                            </div>
                            <nav class="container" style="margin-bottom: -15px; margin-top: -15px;">
                                <ul>
                                    <li class="has-dropdown">
                                        <a class="main-menu-link" href="{{route('admin.dashboard')}}" style="padding: 2px; font-size:15px; margin-right: 20px;">Dashboard</a>

                                    </li>
                                    <li class="has-dropdown">
                                        <a class="main-menu-link" href="index.html" style="padding: 2px; font-size:10px;margin-right: 10px;">Peserta <i class="fa fa-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a class="active" style="color: blue; background-color: blanchedalmond;" href="{{route('account.user')}}">Daftar Peserta</a></li>
                                            <li><a href="#">Daftar Kehadiran</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-dropdown">
                                        <a class="main-menu-link" href="index.html"  style="padding: 2px; font-size:10px;margin-right: 10px;">Ujian <i class="fa fa-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="content_dua.php">Buat Soal</a></li>
                                            <li><a href="{{route('admin.bank-soal')}}">Bank Soal</a></li>
                                            <li><a href="{{route('admin.hasil')}}">Hasil Ujian</a></li>
                                            <li><a href="{{route('admin.peringkat')}}">Peringkat Hasil Ujian</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-dropdown">
                                        <a class="main-menu-link" href="index.html"  style="padding: 2px; font-size:10px;">Admin</a>
                                        <!-- <ul class="sub-menu">
                                            <li><a class="active" href="content_satu.php">Link Variable 1</a></li>
                                            <li><a href="#">Link Variable 0</a></li>
                                        </ul> -->
                                    </li>
                                    <li style="float: right;">
                                           
                                    </li>
                                </ul>
                            </nav>
                        </div> 
                    </div>
                </div>
            </div>
        </div> 
    </header> 
    <div class="mobile-header-section d-block d-lg-none">
        <div class="mobile-header-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex justify-content-between align-items-center">
                        <div class="mobile-header--left">
                            <a href="" class="mobile-logo-link">
                                <svg class="d-block" width="42" height="42" viewBox="0 0 612 612" xmlns="http://www.w3.org/2000/svg" focusable="false"><title>Bootstrap</title><path fill="currentColor" d="M510 8a94.3 94.3 0 0 1 94 94v408a94.3 94.3 0 0 1-94 94H102a94.3 94.3 0 0 1-94-94V102a94.3 94.3 0 0 1 94-94h408m0-8H102C45.9 0 0 45.9 0 102v408c0 56.1 45.9 102 102 102h408c56.1 0 102-45.9 102-102V102C612 45.9 566.1 0 510 0z"></path><path fill="currentColor" d="M196.77 471.5V154.43h124.15c54.27 0 91 31.64 91 79.1 0 33-24.17 63.72-54.71 69.21v1.76c43.07 5.49 70.75 35.82 70.75 78 0 55.81-40 89-107.45 89zm39.55-180.4h63.28c46.8 0 72.29-18.68 72.29-53 0-31.42-21.53-48.78-60-48.78h-75.57zm78.22 145.46c47.68 0 72.73-19.34 72.73-56s-25.93-55.37-76.46-55.37h-74.49v111.4z"></path></svg>
                            </a>
                        </div>
                        <div class="mobile-header--right">
                            <a href="#mobile-menu-offcanvas" class="mobile-menu offcanvas-toggle">
                                <span class="mobile-menu-dash"></span>
                                <span class="mobile-menu-dash"></span>
                                <span class="mobile-menu-dash"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <div id="mobile-menu-offcanvas" class="offcanvas offcanvas-leftside offcanvas-mobile-menu-section">
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="fa fa-times"></i></button>
        </div> 
        <div class="offcanvas-mobile-menu-wrapper">
            <div class="mobile-menu-top">
                <span>Welcome to our store!</span>
            </div> 
            <div class="mobile-menu-center">
                <div class="offcanvas-menu">
                    <ul>
                        <li>
                            <a href="#"><span>Peserta</span></a>
                            <ul class="mobile-sub-menu">
                                <li><a href="#">Daftar Peserta</a></li>
                                <li><a href="#">Daftar Kehadiran</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span>Shop</span></a>
                            <ul class="mobile-sub-menu">
                                <li>
                                    <a href="#">Shop Layout</a>
                                    <ul class="mobile-sub-menu">
										<li><a href="#">Link Variable 1</a></li>
										<li><a href="#">Link Variable 1</a></li>
										<li><a href="#">Link Variable 1</a></li>
										<li><a href="#">Link Variable 1</a></li>
										<li><a href="#">Link Variable 1</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="mobile-sub-menu">
                                <li>
                                    <a href="#">Shop Pages</a>
                                    <ul class="mobile-sub-menu">
										<li><a href="#">Link Variable 2</a></li>
										<li><a href="#">Link Variable 2</a></li>
										<li><a href="#">Link Variable 2</a></li>
										<li><a href="#">Link Variable 2</a></li>
										<li><a href="#">Link Variable 2</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="mobile-sub-menu">
                                <li>
                                    <a href="#">Product Single</a>
                                    <ul class="mobile-sub-menu">
										<li><a href="#">Link Variable 3</a></li>
										<li><a href="#">Link Variable 3</a></li>
										<li><a href="#">Link Variable 3</a></li>
										<li><a href="#">Link Variable 3</a></li>
										<li><a href="#">Link Variable 3</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span>Blogs</span></a>
                            <ul class="mobile-sub-menu">
                                <li>
                                    <a href="#">Blog 1</a>
                                    <ul class="mobile-sub-menu">
                                        <li><a href="#">Link Variable 1</a></li>
                                        <li><a href="#">Link Variable 1</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="blog-full-width.html">Blog Full Width</a>
                                </li>
                                <li>
                                    <a href="#">Blog 2</a>
                                    <ul class="mobile-sub-menu">
                                        <li><a href="#">Link Variable 1</a></li>
                                        <li><a href="#">Link Variable 1</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span>Pages</span></a>
                            <ul class="mobile-sub-menu">
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="service.html">Service</a></li>
                                <li><a href="faq.html">Frequently Questions</a></li>
                                <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                <li><a href="404.html">404 Page</a></li>
                            </ul>
                        </li>
                        <li><a href="contact-us.html">Contact Us</a></li>
                    </ul>
                </div> 
            </div>
            <div class="mobile-menu-bottom">
                <a class="mobile-menu-email icon-text-right" href="mailto:info@yourdomain.com"><i class="fa fa-envelope-o"> info@yourdomain.com</i></a>
                <ul class="mobile-menu-social">
                    <li><a href="" class="facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="" class="twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="" class="youtube"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                    <li><a href="" class="instagram"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div> 
        </div>
    </div>

    <div class="wrapped pb-5" style="margin-bottom: {{ Auth::guard('admin')->check() ? "30px" : "129px;" }};">
        <div class="container-fluid">
            <div class="row container-fluid">
                <!-- <div class="col-lg-3 col-md-12 mb-5"> -->
                    <!-- <div class="card">
                        <div class="card-header">
                            Main Navigation
                        </div>
                        <div class="card-body">
                            <nav class="nav flex-column">
                                
                                @if (Auth::guard("web")->check())
                                    @if (isset($take))
                                        @include('user.partials.quiz_nav')
                                    @else
                                        @include('user.partials.menu')
                                        <div id="underline"></div>
                                    @endif
                                @else
                                    @include('admin.partials.menu')
                                    <div id="underline"></div>
                                @endif
                                @if (!isset($take))
                                <li class="nav-link">
                                    <form action="{{ route("logout") }}" method="post">
                                        @csrf
                                        <button type="submit" class="text-dark" style="border: none; outline: none; background: none; padding: 0">
                                            <i class="fa fa-sign-out-alt mr-2" aria-hidden="true"></i>
                                            Sign Out
                                        </button>
                                    </form>
                                </li>
                                @endif
                            </nav>
                        </div>
                    </div> -->
                    
                <!-- </div> -->
                <div class="container">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 mt-3">
                    <h5 class="text-muted">BeSmart</h5>
                    <a href="#" class="text-white h4">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-white h4 ml-3">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-white h4 ml-3">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="#" class="text-white h4 ml-3">
                        <i class="fab fa-youtube"></i>
                    </a>

                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <span class="text-white"><i class="fas fa-phone-alt mr-2"></i> +628212099283</span>
                        </div>
                        <div class="col-sm-12">
                            <span class="text-white"><i class="fas fa-envelope mr-2"></i> besmart@info.com</span>
                        </div>
                        <div class="col-sm-12">
                            <span class="text-white">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                Jalan Cicalengka Raya no 23 ,<br> Antapani , Bandung
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mt-3">
                    <h5 class="text-muted">Get Touch</h5>
                    <p class="text-muted">Untuk mengetahui lebih jauh tentang kami , silahkan isi form dibawah ini untuk mengirim pesan kepada kami . </p>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Some message" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="button" id="button-addon2"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="height: 2px;background-color: #727272;margin-top: 17px;"></div>
        <div class="row">
            <div class="col-sm-12">
                <p class="text-center mb-0 mt-2 text-muted">&copy; 2021-2022 BeSmart Quiz Management System</p>
            </div>
        </div>
    </footer>
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="http://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset("js/app.js") }}"></script>
    <script src="{{ asset("plugins/summernote/summernote-bs4.min.js") }}"></script>
    <!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script> -->
    <script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>

    @stack('script')
</body>
</html>