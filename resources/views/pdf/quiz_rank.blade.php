@extends('layouts.pdf')

@section('content')
    <h2>Hasil Ujian {{ $quiz->title }}</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Rank</th>
                <th>Nama</th>
                <th>Skor</th>
                <th>Jawaban Benar</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($results as $result)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $result->user->name }}</td>
                    <td>{{ $result->point }}</td>
                    <td>{{ $result->correct_answer }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" align="center">Data hasil ujian masih kosong</td>
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
