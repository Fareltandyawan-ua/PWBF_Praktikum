@extends('layouts.admin')
@section('content')
<div class="container mt-4">
  <h2>Data Ras Hewan</h2>
  @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
  <a href="{{ route('admin.ras-hewan.create') }}" class="btn btn-success mb-3">+ Tambah</a>
  <table class="table table-bordered">
    <thead class="table-dark"><tr><th>No</th><th>Nama Ras</th><th>Jenis Hewan</th><th>Aksi</th></tr></thead>
    <tbody>
      @forelse($ras as $i => $r)
        <tr>
          <td>{{ $i+1 }}</td>
          <td>{{ $r->nama_ras }}</td>
          <td>{{ $r->jenisHewan->nama_jenis_hewan ?? '-' }}</td>
          <td>
            <button class="btn btn-sm btn-warning">Edit</button>
            <button class="btn btn-sm btn-danger" onclick="if(confirm('Yakin?')) document.getElementById('del-{{ $r->idras_hewan }}').submit();">Hapus</button>
            <form id="del-{{ $r->idras_hewan }}" action="#" method="POST" style="display:none">@csrf @method('DELETE')</form>
          </td>
        </tr>
      @empty
        <tr><td colspan="4" class="text-center">Belum ada data</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
