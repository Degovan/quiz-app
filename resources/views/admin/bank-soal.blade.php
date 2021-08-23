
@extends('layouts.template-admin')

@section('content')
    <div id="underline"></div>
    <div class="container-fluid font-weight-normal" style="font-size: 0.8rem;">
					<!-- <h1 class="h3 mb-2 text-gray-800">Produk</h1> -->
					<!-- <p class="mb-4">Menampilkan data produk </p> -->
					<div class="card shadow mb-4">
						<div class="card-header py-1" style="text-align: center;">
							<h7 class="m-0 font-weight-bold text-primary">Kumpulan Soal-soal</h7>
						</div>
						<div class="card-body">
							<!-- <nav class="navbar navbar-light bg-light justify-content-between mb-2" style="margin-top: -13px;"> <a class="navbar-brand" style="font-size: 13px;">Data ini selalu di update pada periode tertentu</a>
								<form action="" class="form-inline" method="GET">
									<a href="" class="btn btn-outline-primary mr-sm-2 my-2 my-sm-0 btn-sm " ><i class="fas fa-plus-square"></i>&nbsp;Tambah</a>
									<input class="form-control form-control-sm" type="search" name="cari" placeholder="Cari data ..." aria-label="Cari data ...">
									<a class="btn btn-outline-secondary my-2 my-sm-0  btn-sm" type="submit"><i class="fas fa-search"></i>&nbsp;Cari</a>
								</form>
							</nav> -->
							<div class="table-responsive">
                            <table class="table table-bordered table-sm" style="font-size: 11px;" id="dataTable" width="100%" cellspacing="0">
									<thead class="thead-light">
										<tr>
                                            <th>No</th>
											<th>Title</th>
											<th>Kadaluarsa</th>
											<th>Dikerjakan</th>
											<th>Detail</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>No</th>
											<th>Title</th>
											<th>Kadaluarsa</th>
											<th>Dikerjakan</th>
                                            <th>Detail</th>
											
										</tr>
									</tfoot>
									<tbody>@php $i = 1; @endphp   @forelse ($quizzes as $quiz)
										<tr>
											<td>{{$i++}}</td>
											<td>{{$quiz->title }}</td>
											<td>{{$quiz->due_date}}</td>
											<td>{{$quiz->attempt->count()}} Orang</td>
											<td><a href="{{ route('quiz.show',['id' => $quiz->id]) }}" class="btn btn-detail">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
										</tr>@endforeach</tbody>
								</table>
                                <div class="d-flex justify-content-center">
    {!! $quizzes->links() !!}
</div>
							</div>
						</div>
					</div>
				</div>
    <div class="row">
        <div class="col-12">
            <!-- <h5>
                <i class="fas fa-info-circle mr-1"></i>
                Informasi Quiz
            </h5> -->
            <!-- <hr> -->
            @if (Session::has("quiz_create"))
                <div class="alert alert-primary" role="alert">
                    <strong>{{ Session::get("quiz_create") }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif(Session::has("delete"))
                <div class="alert alert-warning" role="alert">
                    <strong>{{ Session::get("delete") }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
    </div>
    <!-- <div class="row">
        @forelse ($quizzes as $quiz)
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-1">{{ $quiz->title }}</h5>
                        <p class="text-muted mb-2">Kadaluarsa : {{ $quiz->due_date }}</p>
                        <div class="d-flex">
                            <p class="btn btn-primary mb-0 mr-2">Dikerjakan : {{ $quiz->attempt->count() }} Siswa</p>
                            <a href="{{ route("quiz.show",["id" => $quiz->id]) }}" class="btn btn-detail">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <p class="text-muted">Belum ada quiz yang dibuat! . <a href="{{ route("quiz.create") }}" style="text-decoration: underline;">Buat Sekarang</a></p>
                </div>
            </div>
        @endforelse
    </div> -->
@endsection
@push('style')
    <style>
        .btn-detail{
            background-color: #ffb228;
            color: white;
        }
    </style>
@endpush

	<script>
	$(document).ready(function() {
		$('#dataTables').DataTable();
	} );
	</script>