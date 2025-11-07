@extends('layouts.app')
@section('title','Tambah Ras Hewan')
@section('content')
<div class="container">
  <div class="card"><div class="card-header"><h4>Tambah Ras Hewan</h4></div>
  <div class="card-body">
    <form action="{{ route('admin.ras-hewan.store') }}" method="POST">@csrf
      <div class="mb-3">
        <label for="nama_ras" class="form-label">Nama Ras</label>
        <input type="text" id="nama_ras" name="nama_ras" value="{{ old('nama_ras') }}" class="form-control @error('nama_ras') is-invalid @enderror" required>
        @error('nama_ras')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <label for="idjenis_hewan" class="form-label">Jenis Hewan</label>
        <select id="idjenis_hewan" name="idjenis_hewan" class="form-select @error('idjenis_hewan') is-invalid @enderror" required>
          <option value="">-- Pilih Jenis Hewan --</option>
          @foreach($jenisHewan as $j)
            <option value="{{ $j->idjenis_hewan }}" {{ old('idjenis_hewan') == $j->idjenis_hewan ? 'selected' : '' }}>{{ $j->nama_jenis_hewan }}</option>
          @endforeach
        </select>
        @error('idjenis_hewan')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="d-flex justify-content-between">
        <a href="{{ route('admin.ras-hewan.index') }}" class="btn btn-secondary">Kembali</a>
        <button class="btn btn-primary" type="submit">Simpan</button>
      </div>
    </form>
  </div></div>
</div>
@endsection
