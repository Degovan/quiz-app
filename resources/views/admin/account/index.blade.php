@extends('layouts.template')

@section('content')
    <h4>Account User</h4>
    <div id="underline"></div>
    @if (Session::has("admin_create"))
        <div class="alert alert-success" role="alert">
            <strong>{{ Session::get("admin_create") }}</strong>
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif(Session::has("admin_update"))
        <div class="alert alert-success" role="alert">
            <strong>{{ Session::get("admin_update") }}</strong>
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif(Session::has("admin_delete"))
        <div class="alert alert-warning" role="alert">
            <strong>{{ Session::get("admin_delete") }}</strong>
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a href="{{ route("account.admin.create") }}" class="btn btn-plus btn-sm">
                <i class="fas fa-user-plus"></i>
                Tambah Admin
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admin as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <a href="{{ route("account.admin.edit",["id" => $item->id]) }}" class="btn-sm btn btn-success">
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
                                                <form action="{{ route("account.admin.delete",["id" => $item->id]) }}" method="post">
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
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $("#datatable").DataTable()
    </script>
@endpush
@push('style')
    <style>
        .btn-plus{
            background-color: #ffb228;
            color: white;
            font-weight: bold;
            letter-spacing: 1.5px;
        }
    </style>
@endpush