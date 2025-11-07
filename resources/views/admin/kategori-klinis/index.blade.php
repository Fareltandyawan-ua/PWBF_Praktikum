@extends('layouts.admin')
@section('content')
<div class="container mt-4">
  <h2>Data Kategori Klinis</h2>
  @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
  <a href="{{ route('admin.kategori-klinis.create') }}" class="btn btn-success mb-3">+ Tambah</a>
  <table class="table table-bordered">
    <thead class="table-dark"><tr><th>No</th><th>Nama Kategori Klinis</th><th>Aksi</th></tr></thead>
    <tbody>
      @forelse($kategoriKlinis as $i => $k)
        <tr>
          <td>{{ $i+1 }}</td>
          <td>{{ $k->nama_kategori_klinis }}</td>
          <td>
            <button class="btn btn-sm btn-warning">Edit</button>
            <button class="btn btn-sm btn-danger" onclick="if(confirm('Yakin?')) document.getElementById('delete-{{ $k->idkategori_klinis }}').submit();">Hapus</button>
            <form id="delete-{{ $k->idkategori_klinis }}" action="#" method="POST" style="display:none;">@csrf @method('DELETE')</form>
          </td>
        </tr>
      @empty
        <tr><td colspan="3" class="text-center">Belum ada data</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
