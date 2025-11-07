@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Data Jenis Hewan</h2>

    @if (session('success'))
        <div class="alert alert-success mb-3">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.jenis-hewan.create') }}" class="btn btn-success mb-3">+ Tambah Jenis Hewan</a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Jenis Hewan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jenisHewan as $index => $hewan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $hewan->nama_jenis_hewan }}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-warning" onclick="window.location='#'">
                            <i class="fas fa-edit"></i> Edit
                        </button> 
                        <button type="button" class="btn btn-sm btn-danger" onclick="if(confirm('Yakin ingin menghapus data ini?')) { document.getElementById('delete-form-{{ $hewan->idjenis_hewan }}').submit(); }">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                        <form id="delete-form-{{ $hewan->idjenis_hewan }}" action="#" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Belum ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
