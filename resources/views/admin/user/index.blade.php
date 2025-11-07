@extends('layouts.admin')
@section('content')
    <div class="container mt-4">
        <h2>Data User</h2>
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>@endif
        <a href="{{ route('admin.user.create') }}" class="btn btn-success mb-3">+ Tambah User</a>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $i => $u)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $u->nama }}</td>
                        <td>{{ $u->email }}</td>
                        <td>
                            <button class="btn btn-sm btn-warning">Edit</button>
                            <button class="btn btn-sm btn-danger"
                                onclick="if(confirm('Yakin?')) document.getElementById('del-{{ $u->iduser }}').submit();">Hapus</button>
                            <form id="del-{{ $u->iduser }}" action="#" method="POST" style="display:none">@csrf
                                @method('DELETE')</form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection