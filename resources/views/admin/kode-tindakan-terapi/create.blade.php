@extends('layouts.app')
@section('title','Tambah Kode Tindakan Terapi')
@section('content')
<div class="container">
  <div class="card"><div class="card-header"><h4>Tambah Kode Tindakan Terapi</h4></div>
  <div class="card-body">
    <form action="{{ route('admin.kode-tindakan-terapi.store') }}" method="POST">@csrf
      <div class="mb-3">
        <label for="kode" class="form-label">Kode</label>
        <input type="text" id="kode" name="kode" value="{{ old('kode') }}" class="form-control @error('kode') is-invalid @enderror" required>
        @error('kode')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <label for="deskripsi_tindakan_terapi" class="form-label">Deskripsi</label>
        <textarea id="deskripsi_tindakan_terapi" name="deskripsi_tindakan_terapi" class="form-control @error('deskripsi_tindakan_terapi') is-invalid @enderror">{{ old('deskripsi_tindakan_terapi') }}</textarea>
        @error('deskripsi_tindakan_terapi')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <label for="idkategori" class="form-label">Kategori</label>
        <select name="idkategori" id="idkategori" class="form-select @error('idkategori') is-invalid @enderror">
          <option value="">-- Pilih Kategori --</option>
          @foreach($kategori as $cat)
            <option value="{{ $cat->idkategori }}" {{ old('idkategori') == $cat->idkategori ? 'selected' : '' }}>{{ $cat->nama_kategori }}</option>
          @endforeach
        </select>
        @error('idkategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <label for="idkategori_klinis" class="form-label">Kategori Klinis</label>
        <select name="idkategori_klinis" id="idkategori_klinis" class="form-select @error('idkategori_klinis') is-invalid @enderror">
          <option value="">-- Pilih Kategori Klinis --</option>
          @foreach($kategoriKlinis as $ck)
            <option value="{{ $ck->idkategori_klinis }}" {{ old('idkategori_klinis') == $ck->idkategori_klinis ? 'selected' : '' }}>{{ $ck->nama_kategori_klinis }}</option>
          @endforeach
        </select>
        @error('idkategori_klinis')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="d-flex justify-content-between">
        <a href="{{ route('admin.kode-tindakan-terapi.index') }}" class="btn btn-secondary">Kembali</a>
        <button class="btn btn-primary" type="submit">Simpan</button>
      </div>
    </form>
  </div></div>
</div>
@endsection
