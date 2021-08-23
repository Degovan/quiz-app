@extends('layouts.template-admin')

@section('content')
    <h4>{{ $quiz->title }}</h4>
    <div id="underline"></div>
    @if (Session::has("updated"))
        <div class="alert alert-success" role="alert">
            <strong>{{ Session::get("updated") }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif(Session::has("question_create"))
        <div class="alert alert-success" role="alert">
            <strong>{{ Session::get("question_create") }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif(Session::has("question_update"))
        <div class="alert alert-success" role="alert">
            <strong>{{ Session::get("question_update") }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif(Session::has("deleted"))
        <div class="alert alert-warning" role="alert">
            <strong>{{ Session::get("deleted") }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif(Session::has("opened"))
        <div class="alert alert-primary" role="alert">
            <strong>{{ Session::get("opened") }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    
    <div class="row">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-end">
                        <div>
                            <a href="{{ route("quiz.edit",["id" => $quiz->id]) }}" class="btn btn-sm btn-success">
                                <i class="fas fa-edit"></i>
                                Edit
                            </a>
                            <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modaldelete">
                                <i class="fas fa-trash-alt"></i>
                                Hapus
                            </a>
                            <a href="{{ route("quiz.ranking",["id" => $quiz->id]) }}" class="btn btn-sm btn-warning text-secondary">
                                <i class="fas fa-trophy"></i>
                                Ranking
                            </a>
                            <div class="modal fade" id="modaldelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route("quiz.delete",["id" => $quiz->id]) }}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Quiz</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Semua data-data quiz ini akan di hapus termasuk data pertanyaan dan semua data yang sudah mengerjakan quiz . Yakin mau menghapus?</strong></p>
                                                <p class="mb-0">Judul Quiz : {{ $quiz->title }}</p>
                                                <p class="mb-0">Dibuat Pada : {{ $quiz->created_at }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="alert alert-primary" role="alert">
                        Note : <strong>Akses quiz baru bisa di buka ketika quiz sudah memiliki pertanyaan sesuai dengan jumlah pertanyaan yang diinputkan sebelumnya!</strong>
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
                    @php $nilai = 0; @endphp
                    @foreach ($quiz->question as $data)
                        @php $nilai += $data->score @endphp
                    @endforeach
                    <p class="mb-1">Maks.Score : {{ $nilai }} Points</p>
                    <div class="d-flex">
                        <p class="btn btn-primary mt-2 mb-0 question-count" data-toggle="collapse" data-target="#collapse2">Pertanyaan : {{ $quiz->question->count() }}</p>
                        @if ($quiz->question->count() < $quiz->number_of_question)
                            <a class="btn mt-2 ml-2 btn-tambah" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fas fa-plus-circle"></i>
                                Tambah
                            </a>
                        @else
                            @if (!$quiz->access_type)
                                <form action="{{ route("quiz.open",["id" => $quiz->id]) }}" method="post" class="form-inline">
                                    @csrf
                                    @method("PUT")
                                    <button type="submit" class="btn mt-2 ml-2 btn-tambah">
                                        Buka Akses
                                    </button>
                                </form>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
            <div class="collapse mt-2" id="collapse2">
                <div class="card card-body">
                    <div class="row">
                        @forelse ($quiz->question as $key => $q)
                            <div class="col-12">
                                <div class="card mb-2">
                                    <div class="card-header">
                                        Nomor {{ $key + 1 }}
                                    </div>
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
                                        <div class="row mt-4">
                                            <div class="col-sm-12">
                                                <p class="mb-0">Nilai : {{ $q->score }} Poin</p>
                                                <p class="mb-1">Kunci Jawaban : {{ $q->key }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        @if (!$quiz->access_type)
                                            <a href="{{ route("question.edit",["quiz_id" => $quiz->id , "id" => $q->id]) }}" class="btn btn-sm btn-success">
                                                Edit
                                            </a>
                                            <a href="" class="btn-sm btn btn-danger" data-target="#deleteq{{ $q->id }}" data-toggle="modal">
                                                Hapus
                                            </a>
                                        @endif
                                        <div class="modal fade" id="deleteq{{ $q->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route("question.delete",["quiz_id" => $quiz->id , "id" => $q->id]) }}" method="post">
                                                        @csrf
                                                        @method("DELETE")
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Pertanyaan Ini</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><strong>Semua data dari pertanyaan ini akan di hapus . Yakin mau menghapus?</strong></p>
                                                            <p>Pertanyaan : {!! $q->question_title !!}</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-danger" role="alert">
                                    <strong>Kamu belum membuat soal!</strong>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            
            <div class="collapse mt-2" id="collapseExample">
                <div class="card card-body">
                    <h5>Pertanyaan Nomor {{ $quiz->question->count() + 1 }}</h5>
                    <hr>
                    <form action="{{ route("question.store",["quiz_id" => $quiz->id]) }}" method="post">
                        @csrf
                        <input type="hidden" name="nomor" value="{{ $quiz->question->count() }}">
                        <div class="form-group">
                            <label for="">Pertanyaan</label>
                            <textarea name="pertanyaan" id="summernote" rows="3" class="form-control" required></textarea>
                            @error('pertanyaan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Option A</label>
                            <textarea name="option_a" id="summernote1" rows="3" class="form-control" required></textarea>
                            @error('option_a')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Option B</label>
                            <textarea name="option_b" id="summernote2" rows="3" class="form-control" required></textarea>
                            @error('option_b')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Option C</label>
                            <textarea name="option_c" id="summernote3" rows="3" class="form-control" required></textarea>
                            @error('option_c')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Option D</label>
                            <textarea name="option_d" id="summernote4" rows="3" class="form-control" required></textarea>
                            @error('option_d')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="key">Kunci Jawaban</label>
                            <input type="text" name="key" id="key" class="form-control" required>
                            @error('key')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form0group">
                            <label for="nilai">Nilai Soal</label>
                            <input type="text" name="nilai" id="nilai" class="form-control" required>
                            @error('nilai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">
                            <i class="fas fa-save"></i>
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
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
@push('script')
    <script>
        $("#summernote").summernote({
            height:190,
        })
        $("#summernote1").summernote({
            height:150,
        })
        $("#summernote2").summernote({
            height:150,
        })
        $("#summernote3").summernote({
            height:150,
        })
        $("#summernote4").summernote({
            height:150,
        })
    </script>
@endpush
