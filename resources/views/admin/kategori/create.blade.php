@extends('layouts.app')
@section('title','Tambah Kategori')
@section('content')
<div class="container">
  <div class="card">
    <div class="card-header"><h4>Tambah Kategori</h4></div>
    <div class="card-body">
      @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif

      <form action="{{ route('admin.kategori.store') }}" method="POST">@csrf
        <div class="mb-3">
          <label for="nama_kategori" class="form-label">Nama Kategori</label>
          <input type="text" name="nama_kategori" id="nama_kategori" value="{{ old('nama_kategori') }}"
            class="form-control @error('nama_kategori') is-invalid @enderror" placeholder="Masukkan nama kategori" required>
          @error('nama_kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="d-flex justify-content-between">
          <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">Kembali</a>
          <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
