@extends('layouts.template-admin')

@section('content')
    <div id="underline"></div>
    <div class="container-fluid font-weight-normal" style="font-size: 0.8rem;">
        <div class="card shadow mb-4">
            <div class="card-header py-1" style="text-align: center;">
                <h7 class="m-0 font-weight-bold text-primary">Daftar Kehadiran {{ $quiz->title }}</h7>
            </div>
            <div class="card-body">
                <a class="btn btn-primary" href="{{ route('attendance.pdf', $quiz->id) }}">Export to PDF</a>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" style="font-size: 11px;" id="dataTable" width="100%"
                        cellspacing="0">
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
                                    <td colspan="4"></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {!! $attempts->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('style')
    <style>
        .btn-detail {
            background-color: #ffb228;
            color: white;
        }

    </style>
@endpush

<script>
    $(document).ready(function() {
        $('#dataTables').DataTable();
    });
</script>
