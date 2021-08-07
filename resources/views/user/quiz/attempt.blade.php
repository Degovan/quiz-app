@extends('layouts.template')

@section('content')
    <h4 class="mb-3">{{ $quiz->title }}</h4>
    <div id="underline"></div>
    @php
        $row = $questions->first();
    @endphp
    <div class="row col-12 mt-2">
        <form action="{{ route("quiz.result",["id" => $quiz->id]) }}" method="post" style="width: 100%">
            @foreach ($quiz->question as $key => $q)
                <div class="col-sm-10">
                    <div class="card mb-3" id="q{{ $key+1 }}">
                        <div class="card-header">Number {{ $key+1 }}</div>
                        @csrf
                        <div class="card-body">
                            {!! $q->question_title !!}
                            <div class="row mt-4">
                                <div class="col-sm-12">
                                    <span id="options"><input type="radio" name="options{{ $q->id }}" id="options" value="A"> {!! "A . ".$q->option_a !!}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <span id="options"><input type="radio" name="options{{ $q->id }}" id="options" value="B"> {!! "B . ".$q->option_b !!}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <span id="options"><input type="radio" name="options{{ $q->id }}" id="options" value="C"> {!! "C . ".$q->option_c !!}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <span id="options"><input type="radio" name="options{{ $q->id }}" id="options" value="D"> {!! "D . ".$q->option_d !!}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </div>
        </form>
    </div>
@endsection
@push('style')
    <style>
        .question-count:hover{
            background-color: #3490dc!important;
            border-color: #3490dc!important;
        }
        .btn-tambah{
            background-color: #ffb228;
            color: white;
            border-color: #ffb228;

        }
        #options p{
            display: inline;
        }
    </style>
@endpush