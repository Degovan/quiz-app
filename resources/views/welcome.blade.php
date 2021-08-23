<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tryout UNY</title>

    {{-- My Css --}}
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">

    {{-- Eksternal Library --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light responsive" data-aos="fade-down">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <div class="row">
                        <div class="col-2">
                            <span id="icon-navbar">
                                <img src="{{ asset('img/logo.png') }}" width="45px" class="mt-2">
                            </span>
                        </div>
                        <div class="col-3 ml-1" id="title">
                            <p class="mb-0 title-web"><span id="title-name" class="font-weight-bold">B</span>e<span id="title-name" class="font-weight-bold">S</span>mart</p>
                            <p class="text-muted mini-title">Quiz Management System</p>
                        </div>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item active">
                            @if (Auth::guard("web")->check())
                                <a href="{{ route("user.dashboard") }}" class="btn btn-sm btn-login">
                                    {{ Auth::guard("web")->user()->name }}
                                </a>
                            @elseif(Auth::guard("admin")->check())
                                <a href="{{ route("user.dashboard") }}" class="btn btn-sm btn-login">
                                    {{ Auth::guard("admin")->user()->name }}
                                </a>
                            @else
                                <a href="{{ route("login") }}" class="btn btn-sm btn-login">
                                    Sign In
                                </a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="content">
                <div class="row flex-column-reverse flex-sm-row">
                    <div class="col-sm-6 align-self-center" data-aos="fade-right">
                        <p class="font-weight-bold text-uppercase mb-0" id="sub-title">Otamatisasi dalam sistem quiz</p>
                        <div id="underline"></div>
                        <h3 id="text-welcome">Sistem Quiz online </h3>
                        <p>BeSmart merupakan sebuah aplikasi berbasis web untuk sistem quiz secara online . 
                            Clean UI , kaya akan fitur , dan tentu saja sangat user friendly . Membantu siswa dan guru
                            dalam melaksanakan quiz daring dimanapun dan kapanpun sehingga memudahkan bagi siswa itu sendiri di kala pandemi.</p>
                        <a href="{{ route("login") }}" class="btn btn-started">Get Started</a>
                    </div>
                    <div class="col-sm-6" data-aos="fade-left">
                        <img src="{{ asset("img/3784896.webp") }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </header>

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


    {{-- Bootstrap Javascript --}}
    <script src="{{ asset("js/app.js") }}"></script>

    {{-- Eksternal Library Javascript --}}
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 400
        });
    </script>
</body>
</html>