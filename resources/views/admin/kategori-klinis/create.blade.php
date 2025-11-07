@extends('layouts.app')
@section('title','Tambah Kategori Klinis')
@section('content')
<div class="container">
  <div class="card"><div class="card-header"><h4>Tambah Kategori Klinis</h4></div>
  <div class="card-body">
    <form action="{{ route('admin.kategori-klinis.store') }}" method="POST">@csrf
      <div class="mb-3">
        <label for="nama_kategori_klinis" class="form-label">Nama Kategori Klinis</label>
        <input type="text" name="nama_kategori_klinis" id="nama_kategori_klinis" value="{{ old('nama_kategori_klinis') }}"
          class="form-control @error('nama_kategori_klinis') is-invalid @enderror" required>
        @error('nama_kategori_klinis')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
      <div class="d-flex justify-content-between">
        <a href="{{ route('admin.kategori-klinis.index') }}" class="btn btn-secondary">Kembali</a>
        <button class="btn btn-primary" type="submit">Simpan</button>
      </div>
    </form>
  </div></div>
</div>
@endsection
