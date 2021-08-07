@extends('layouts.template')

@section('content')
    <h4>Ranking {{ $quizzes->title }}</h4>
    <div id="underline"></div>
    <div class="card card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Name</th>
                        <th>Score</th>
                        <th>Jawaban Benar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($results as $result)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $result->user->name }}</td>
                            <td>{{ $result->point }}</td>
                            <td>{{ $result->correct_answer }} Soal Benar</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" align="center">Belum ada yang mengerjakan quiz ini</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection