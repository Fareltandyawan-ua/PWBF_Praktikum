@extends('layouts.admin')
@section('content')
    <div class="container mt-4">
        <h2>Data Role User</h2>
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>@endif
        <a href="{{ route('admin.role-user.create') }}" class="btn btn-success mb-3">+ Tambah</a>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($roleUsers as $i => $ru)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $ru->user->nama ?? '-' }}</td>
                        <td>{{ $ru->role->nama_role ?? '-' }}</td>
                        <td>{{ $ru->status ? 'Aktif' : 'Nonaktif' }}</td>
                        <td>
                            <button class="btn btn-sm btn-warning">Edit</button>
                            <button class="btn btn-sm btn-danger"
                                onclick="if(confirm('Yakin?')) document.getElementById('del-{{ $ru->idrole_user }}').submit();">Hapus</button>
                            <form id="del-{{ $ru->idrole_user }}" action="#" method="POST" style="display:none">@csrf
                                @method('DELETE')</form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection