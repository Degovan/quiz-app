@extends('layouts.template')

@section('content')
    <h4>Edit Pertanyaan</h4>
    <div id="underline"></div>
    <div class="card card-body">
        <form action="{{ route("question.update",["quiz_id" => request()->quiz_id , "id" => $question->id]) }}" method="post">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="">Pertanyaan</label>
                <textarea name="pertanyaan" id="summernote" rows="3" class="form-control" required>{!! old("pertanyaan") ?? $question->question_title !!}</textarea>
                @error('pertanyaan')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Option A</label>
                <textarea name="option_a" id="summernote1" rows="3" class="form-control" required>{!! old("option_a") ?? $question->option_a !!}</textarea>
                @error('option_a')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Option B</label>
                <textarea name="option_b" id="summernote2" rows="3" class="form-control" required>{!! old("option_b") ?? $question->option_b !!}</textarea>
                @error('option_b')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Option C</label>
                <textarea name="option_c" id="summernote3" rows="3" class="form-control" required>{!! old("option_c") ?? $question->option_c !!}</textarea>
                @error('option_c')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Option D</label>
                <textarea name="option_d" id="summernote4" rows="3" class="form-control" required>{!! old("option_d") ?? $question->option_d !!}</textarea>
                @error('option_d')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="key">Kunci Jawaban</label>
                <input type="text" name="key" id="key" class="form-control" required value="{{ old("key") ?? $question->key }}">
                @error('key')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form0group">
                <label for="nilai">Nilai Soal</label>
                <input type="text" name="nilai" id="nilai" class="form-control" required value="{{ old("nilai") ?? $question->score }}">
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
@endsection

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