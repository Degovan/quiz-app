@extends('layouts.template-admin')

@section('content')
    <h4>Hasil Ujian {{ $quizzes->title }}</h4>
    <div id="underline"></div>
    <div class="card card-body">
        <div class="table-responsive">
            <div class="d-flex justify-content-start">
                <a href="{{ route('quiz.pdf', $quizzes->id) }}" class="btn btn-primary">Export
                    PDF</a>
            </div>
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
