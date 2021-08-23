@extends('layouts.pdf')

@section('content')
    <h2>Daftar Peserta Tryout</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>No HP</th>
                <th>Wilayah</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->phone ?? '' }}</td>
                    <td>{{ $user->region ?? '' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" align="center">Data peserta masih kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

@push('style')
    <style>
        h2 {
            width: 100%;
            border-bottom: .5rem solid #1356e6;
            margin: 1rem;
        }

    </style>
@endpush
