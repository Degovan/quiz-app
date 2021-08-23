<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tryout UNY</title>
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    @stack('style')
</head>
<body>
    <nav class="navbar navbar-expand-lg px-2 py-1" style="background-color: #0076fa;">
        <div class="container" style="margin-bottom: -18px;">
            @if (Auth::guard("web")->check())
                <a class="navbar-brand" href="{{ route('user.dashboard') }}">
            @else
                <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
            @endif
                <div class="row">
                    <div class="col-2">
                        <span id="icon-navbar">
                            <img src="{{ asset('assets/logo.png') }}" width="45px" >
                        </span>
                    </div>
                    <div class="col-3 ml-3">
                        <p class="mb-0 text-white"><span id="title-name" class="font-weight-bold">TryOut UNY</p>
                        <p class="text-white mini-title">Computer Base Test</p>
                    </div>
                </div>
            </a>
            <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars p-1" aria-hidden="true"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                            <span>
                                {{ Auth::user()->name }}
                                <i class="fa fa-user-circle h5 ml-2" aria-hidden="true"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="wrapped mt-3 pb-5" style="margin-bottom: {{ Auth::guard('admin')->check() ? "30px" : "129px;" }};">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-12 mb-5">
                    <div class="card">
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
                    </div>
                </div>
                <div class="col-md-12 col-lg-9">
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
    <script src="{{ asset("js/app.js") }}"></script>
    <script src="{{ asset("plugins/summernote/summernote-bs4.min.js") }}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    @stack('script')
</body>
</html>