@extends('layouts.template-admin')

@section('content')
    <h4>Dashboard</h4>
    <div id="underline"></div>
    <div class="row">
            <div class="col-xl-4 col-md-6 mb-4">
         
                <div class="card border-left-primary shadow">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h1 mb-0 font-weight-bold text-gray-800">{{$jumlah_quiz}}</div>
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Quiz/Ujian</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file-alt fa-4x "></i>
                            </div>
                        </div>
                    </div>
                </div>
          
            </div>
            <div class="col-xl-4 col-md-6 mb-4" >
                <div class="card border-left-primary  shadow style="background-color: #00a65a;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h1 mb-0 font-weight-bold text-gray-800">{{$jumlah_peserta}}</div>
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Total Peserta</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-friends fa-4x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h1 mb-0 font-weight-bold text-gray-800">{{$avg_result}}</div>
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Rata Rata Skor</div>
                            </div>
                            <div class="col-auto">
                            <i class=""></i>
                            <i class="fas fa-star-half-alt fa-4x"></i>                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-primary" role="alert">
                <h5>Selamat Datang , {{ Auth::user()->name }}</h5>
                <p>Kamu saat ini berada pada halaman dashboard . Di halaman dashboard admin ini kamu dapat menambah , mengupdate , dan menghapus user , dan juga admin . Selain itu kamu pun bisa menambah quiz baru dan melihat daftar quiz yang tersedia saat ini . kamu pun bisa melihat daftar user yang sudah mengerjakan quiz tertentu.</p>
            </div>
        </div>
    </div>

    <!-- <div class="row">
        <div class="col-12">
            <h5>
                <i class="fas fa-info-circle mr-1"></i>
                Informasi Quiz
            </h5>
            <hr>
            @if (Session::has("quiz_create"))
                <div class="alert alert-primary" role="alert">
                    <strong>{{ Session::get("quiz_create") }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif(Session::has("delete"))
                <div class="alert alert-warning" role="alert">
                    <strong>{{ Session::get("delete") }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
    </div> -->
    <div class="row">
        @forelse ($quizzes as $quiz)
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-1">{{ $quiz->title }}</h5>
                        <p class="text-muted mb-2">Kadaluarsa : {{ $quiz->due_date }}</p>
                        <div class="d-flex">
                            <p class="btn btn-primary mb-0 mr-2">Dikerjakan : {{ $quiz->attempt->count() }} Siswa</p>
                            <a href="{{ route("quiz.show",["id" => $quiz->id]) }}" class="btn btn-detail">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <p class="text-muted">Belum ada quiz yang dibuat! . <a href="{{ route("quiz.create") }}" style="text-decoration: underline;">Buat Sekarang</a></p>
                </div>
            </div>
        @endforelse
    </div>
@endsection
@push('style')
    <style>
        .btn-detail{
            background-color: #ffb228;
            color: white;
        }
    </style>
@endpush