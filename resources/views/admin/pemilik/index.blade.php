@extends('layouts.admin')
@section('content')
<div class="container mt-4">
  <h2>Data Pemilik</h2>
  @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
  <a href="{{ route('admin.pemilik.create') }}" class="btn btn-success mb-3">+ Tambah</a>
  <table class="table table-bordered">
    <thead class="table-dark"><tr><th>No</th><th>No WA</th><th>Alamat</th><th>User</th><th>Aksi</th></tr></thead>
    <tbody>
      @forelse($pemilik as $i => $p)
        <tr>
          <td>{{ $i+1 }}</td>
          <td>{{ $p->no_wa }}</td>
          <td>{{ $p->alamat }}</td>
          <td>{{ $p->user->nama ?? '-' }}</td>
          <td>
            <button class="btn btn-sm btn-warning">Edit</button>
            <button class="btn btn-sm btn-danger" onclick="if(confirm('Yakin?')) document.getElementById('del-{{ $p->idpemilik }}').submit();">Hapus</button>
            <form id="del-{{ $p->idpemilik }}" action="#" method="POST" style="display:none">@csrf @method('DELETE')</form>
          </td>
        </tr>
      @empty
        <tr><td colspan="5" class="text-center">Belum ada data</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
