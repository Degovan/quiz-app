@extends('layouts.pdf')

@section('content')
    <h2>Daftar Hadir Ujian {{ $quiz->title }}</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Peserta</th>
                <th>Waktu Hadir</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($attempts as $attempt)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $attempt->user->name }}</td>
                    <td>{{ $attempt->attempt_at }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" align="center">Daftar hadir ujian masih kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

@push('style')
    <style>
        h2 {
            width: 100%;
            border-bottom: .5rem solid #1356e6;
            margin: 1rem;
        }

    </style>
@endpush
