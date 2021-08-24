@extends('layouts.template-admin')

@section('content')
    <div id="underline" class="mt-4"></div>
    <div class="container-fluid font-weight-normal mt-4" style="font-size: 0.8rem;">
        <div class="card shadow mb-4 mt-4">
            <div class="card-header py-1" style="text-align: center;">
                <h7 class="m-0 font-weight-bold text-primary">Daftar Kehadiran</h7>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" style="font-size: 11px;" id="dataTable" width="100%"
                        cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Ujian</th>
                                <th>Jumlah Soal</th>
                                <th>Kedaluwarsa</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quizzes as $quiz)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $quiz->title }}</td>
                                    <td>{{ $quiz->number_of_question }}</td>
                                    <td>{{ $quiz->due_date }}</td>
                                    <td>
                                        <a href="{{ route('attendance.show', $quiz->id) }}"
                                            class="btn btn-sm btn-warning text-white"><i class="fas fa-eye"></i>
                                            daftar hadir</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {!! $quizzes->links() !!}
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
