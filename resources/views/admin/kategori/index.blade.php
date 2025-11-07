@extends('layouts.admin')
@section('content')
<div class="container mt-4">
    <h2>Data Kategori</h2>

    @if (session('success'))
        <div class="alert alert-success mb-3">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.kategori.create') }}" class="btn btn-success mb-3">+ Tambah Kategori</a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr><th>No</th><th>Nama Kategori</th><th>Aksi</th></tr>
        </thead>
        <tbody>
            @forelse($kategori as $i => $k)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $k->nama_kategori }}</td>
                    <td>
                        <button class="btn btn-sm btn-warning">Edit</button>
                        <button class="btn btn-sm btn-danger" onclick="if(confirm('Yakin ingin menghapus data ini?')){ document.getElementById('delete-form-{{ $k->idkategori }}').submit(); }">Hapus</button>
                        <form id="delete-form-{{ $k->idkategori }}" action="#" method="POST" style="display:none;">
                            @csrf @method('DELETE')
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3" class="text-center">Belum ada data</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
