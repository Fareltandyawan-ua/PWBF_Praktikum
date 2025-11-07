@extends('layouts.admin')
@section('content')
<div class="container mt-4">
  <h2>Data Kode Tindakan Terapi</h2>
  @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
  <a href="{{ route('admin.kode-tindakan-terapi.create') }}" class="btn btn-success mb-3">+ Tambah</a>
  <table class="table table-bordered">
    <thead class="table-dark"><tr><th>No</th><th>Kode</th><th>Deskripsi</th><th>Kategori</th><th>Klinis</th><th>Aksi</th></tr></thead>
    <tbody>
      @forelse($kodes as $i => $k)
        <tr>
          <td>{{ $i+1 }}</td>
          <td>{{ $k->kode }}</td>
          <td>{{ $k->deskripsi_tindakan_terapi }}</td>
          <td>{{ $k->kategori->nama_kategori ?? '-' }}</td>
          <td>{{ $k->kategoriKlinis->nama_kategori_klinis ?? '-' }}</td>
          <td>
            <button class="btn btn-sm btn-warning">Edit</button>
            <button class="btn btn-sm btn-danger" onclick="if(confirm('Yakin?')) document.getElementById('del-{{ $k->idkode_tindakan_terapi }}').submit();">Hapus</button>
            <form id="del-{{ $k->idkode_tindakan_terapi }}" action="#" method="POST" style="display:none">@csrf @method('DELETE')</form>
          </td>
        </tr>
      @empty
        <tr><td colspan="6" class="text-center">Belum ada data</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
