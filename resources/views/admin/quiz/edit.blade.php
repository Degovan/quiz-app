@extends('layouts.template')

@section('content')
    <h4>Edit Quiz</h4>
    <div id="underline"></div>
    <form action="{{ route("quiz.update",["id" => $quiz->id]) }}" method="post">
        @csrf
        @method("PUT")
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="title">Judul Quiz <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old("title") ?? $quiz->title }}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="instruksi">Quiz Instructions</label>
                            <textarea name="instruksi" id="summernote" rows="3" class="form-control">{{ old("instruksi") ?? $quiz->instructions }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="jumlah" class="mb-0">Jumlah Pertanyaan <span class="text-danger">*</span></label><br>
                            @if($quiz->access_type) <small class="font-weight-bold">Kamu tidak bisa mengedit jumlah pertanyaan , karena quiz sudah di buka!</small> @endif
                            <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ old("jumlah") ?? $quiz->number_of_question }}" {{ $quiz->access_type ? "disabled" : "" }}>
                            @error('jumlah')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="date">Tanggal Kadaluarsa</label>
                            <input type="date" name="date" id="date" class="form-control" value="{{ old("date") ?? date("Y-m-d",strtotime($quiz->due_date)) }}">
                            @error('date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="time">Waktu Kadaluarsa</label>
                                <input type="time" name="time" id="time" class="form-control" value="{{ old("time") ?? date("H:i",strtotime($quiz->due_date)) }}">
                                @error('time')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
@endsection
@push('script')
    <script>
        $("#summernote").summernote({
            height:200,
        });
    </script>
@endpush