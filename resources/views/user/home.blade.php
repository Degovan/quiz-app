@extends('layouts.template')

@section('content')
    <h4>Dashboard User</h4>
    <div id="underline"></div>
    <div class="alert alert-primary mb-4" role="alert">
        <h5>Selamat Datang, {{ Auth::user()->name }}</h5>
        <p class="mb-0">Di halaman ini kamu dapat melihat quiz yang dapat dikerjakan . User hanya bisa melihat quiz yang akses nya sudah dibuka oleh admin . User hanya bisa melakukan quiz sebanyak 1 kali.</p>
    </div>
    <h5>
        <i class="fas fa-tasks"></i>
        Daftar Quiz
    </h5>
    <hr>
    <div class="row">
        @forelse ($quizzes as $quiz)
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-1">{{ $quiz->title }}</h5>
                        <p class="text-muted mb-2">Kadaluarsa : {{ $quiz->due_date }}</p>
                        <div class="d-flex">
                            <a href="{{ route("user.quiz.show",["id" => $quiz->id]) }}" class="btn btn-detail">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <p class="text-muted">Belum ada quiz yang tersedia!.
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