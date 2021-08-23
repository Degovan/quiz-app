
@extends('layouts.template-admin')

@section('content')
    <div id="underline"></div>
    <div class="container-fluid font-weight-normal" style="font-size: 0.8rem;">
					<!-- <h1 class="h3 mb-2 text-gray-800">Produk</h1> -->
					<!-- <p class="mb-4">Menampilkan data produk </p> -->
                    <div class="card-header">
                        <a href="{{ route("account.user.create") }}" class="btn btn-primary btn-plus btn-sm">
                            <i class="fas fa-user-plus"></i>
                            Tambah User
                        </a>
                    </div>
                    <a class="btn btn-primary" href="{{ URL::to('/user/pdf') }}">Export to PDF</a>

					<div class="card shadow mb-4">
						<div class="card-header py-1" style="text-align: center;">
							<h7 class="m-0 font-weight-bold text-primary">Daftar Peserta</h7>
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
                            <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>No HP</th>
                            <th>Wilayah</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->no_hp }}</td>
                                <td>{{ $item->wilayah }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <a href="{{ route("account.user.edit",["id" => $item->id]) }}" class="btn-sm btn btn-success">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </a>
                                    <a href="" class="btn-sm btn btn-danger" data-target="#modaldelete{{ $item->id }}" data-toggle="modal">
                                        <i class="fas fa-trash-alt"></i>
                                        Hapus
                                    </a>
                                    <div class="modal fade" id="modaldelete{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ route("account.user.delete",["id" => $item->id]) }}" method="post">
                                                    @csrf
                                                    @method("DELETE")
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Yakin mau menghapus?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><b>Akun ini akan dihapus beserta data-data yang berhubungan dengan user ini . Anda yakin ? </b></p>
                                                        <p class="mb-0">Nama : {{ $item->name }}</p>
                                                        <p>Username : {{ $item->username }}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
								</table>
                                <div class="d-flex justify-content-center">
    {!! $user->links() !!}
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