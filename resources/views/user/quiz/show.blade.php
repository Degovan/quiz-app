@extends('layouts.template')

@section('content')
    <h4>{{ $quiz->title }}</h4>
    <div id="underline"></div>
    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-primary" role="alert">
                        Note : <strong>Kamu hanya punya 1 kali kesempatan untuk mengerjakan quiz ini</strong>
                    </div>
                    <hr>
                    @if ($quiz->instructions)
                        <p class="mb-1">Instructions : </p>
                        <div class="alert alert-success" role="alert">
                            <p class="mb-0">{!! $quiz->instructions !!}</p>
                        </div>
                    @endif
                    <p class="mb-1">Jumlah Percobaan : 1 Kali</p>
                    <p class="mb-1">Akses : {{ $quiz->access_type ? "Dibuka" : "Ditutup" }}</p>
                    <p class="mb-1">Kadaluarsa : {{ $quiz->due_date }} @if(date("Y-m-d H:i:s") > $quiz->due_date) <span class='text-danger font-weight-bold'> Sudah Kadaluarsa </span> @endif</p>
                    <p class="mb-1">Jumlah Pertanyaan : {{ $quiz->number_of_question }} Pertanyaan</p>
                </div>
                <div class="card-footer">
                    @if ($quiz->attempt->count()<1)
                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modalattempt">Attempt Quiz</a>
                        <div class="modal fade" id="modalattempt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="{{ route("quiz.attempt",["id" => $quiz->id]) }}" method="post">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Attempt Quiz</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Setelah melakukan quiz ini kamu tidak akan bisa melakukan quiz ini lagi , kesempatan quiz hanya 1 kali . Yakin mau melakukan quiz ?</strong></p>
                                            <p>Judul : {{ $quiz->title }}</p>
                                            <p>Waktu Pengerjaan : {{ date("Y-m-d H:i:s") }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Attempt</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Review Answers
                        </a>
                    @endif
                </div>
            </div>
            <div class="collapse mt-2" id="collapseExample">
                <div class="card card-body">
                    @foreach ($quiz->question as $key => $q)
                        @foreach ($quiz->answer as $a)
                            @if ($a->question_id==$q->id)
                                <div class="col-sm-12">
                                    <div class="card mb-2">
                                        <div class="card-header">Number {{ $key+1 }}</div>
                                        <div class="card-body">
                                            <p>{!! $q->question_title !!}</p>
                                            <div class="row mt-4">
                                                <div class="col-sm-12">
                                                    <span id="options">{!! "A . ".$q->option_a !!}</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <span id="options">{!! "B . ".$q->option_b !!}</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <span id="options">{!! "C . ".$q->option_c !!}</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <span id="options">{!! "D . ".$q->option_d !!}</span>
                                                </div>
                                            </div>
                                            @if ($a->option == $q->key)
                                                <div class="alert alert-success mt-2">
                                                    <div class="d-flex justify-content-between">
                                                        <p class="mb-0">Your Answer : {{ $a->option }} <i style="font-size: 14px">(Correct)</i></p>
                                                        <p class="mb-0">{{ $q->score }} Points</p>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="alert alert-danger mb-0 mt-2">
                                                    <div class="d-flex justify-content-between">
                                                        <p class="mb-0">Your Answer : {{ $a->option }} <i style="font-size: 14px">(Wrong)</i></p>
                                                        <p class="mb-0">0 Points</p>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
            @if ($quiz->attempt->count() == 1)
                <div class="row mt-2">
                    <div class="col-sm-12">
                        <h5>Quiz Result</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead style="background-color: #0076fa; color:white; text-align: center">
                                    <tr>
                                        <th>Correct</th>
                                        <th>Score</th>
                                        <th>Attempt At</th>
                                        <th>Submitted At</th>
                                        <th>Duration</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    @foreach ($quiz->result as $r)
                                        @foreach ($quiz->attempt as $s)
                                            @if ($r->quiz_id == $s->quiz_id)
                                                <tr>
                                                    <td align="center">{{ $r->correct_answer }}/{{ $quiz->question->count() }}</td>
                                                    <td align="center">{{ $r->point }}/{{ $r->max_points }}</td>
                                                    <td align="center">{{ $s->attempt_at }}</td>
                                                    <td align="center">{{ $r->created_at }}</td>
                                                    @php
                                                        $startTime  = \Carbon\Carbon::parse($s->attempt_at);
                                                        $endTime  = \Carbon\Carbon::parse($r->created_at);
                                                        $diff_in_days = $startTime->diff($endTime)->format('%H Hours %I Minutes %S Seconds');
                                                    @endphp
                                                    <td align="center">{{ $diff_in_days }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
@push('style')
    <style>
        #options p{
            display: inline;
        }
    </style>
@endpush
