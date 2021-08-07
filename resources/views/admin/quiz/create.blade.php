@extends('layouts.template')

@section('content')
    <h4>Buat Quiz Baru</h4>
    <div id="underline"></div>
    <form action="{{ route("quiz.store") }}" method="post">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="title">Judul Quiz <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old("title") }}">
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
                            <textarea name="instruksi" id="summernote" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="jumlah">Jumlah Pertanyaan <span class="text-danger">*</span></label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ old("jumlah") }}">
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
                            <input type="date" name="date" id="date" class="form-control" value="{{ old("date") }}">
                            @error('date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="time">Waktu Kadaluarsa</label>
                                <input type="time" name="time" id="time" class="form-control" value="{{ old("time") }}">
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