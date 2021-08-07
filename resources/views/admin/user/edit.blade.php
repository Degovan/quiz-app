@extends('layouts.template')

@section('content')
    <h4>Edit User</h4>
    <div id="underline"></div>
    <form action="{{ route("account.user.update",["id" => $user->id]) }}" method="post">
        <div class="card">
            <div class="card-body">
                @csrf
                @method("PUT")
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Tuliskan nama user...." value="{{ old("name") ?? $user->name }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Tuliskan username untuk user....." value="{{ old("username") ?? $user->username }}">
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="password">Buat Password Baru (Optional)</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password lama akan diganti dengan password ini....">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Password Baru</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Tolong konfirmasi password yang anda masukan...">
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
        </div>
    </form>
@endsection