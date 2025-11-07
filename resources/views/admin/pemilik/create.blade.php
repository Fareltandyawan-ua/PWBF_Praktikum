@extends('layouts.app')
@section('title','Tambah Pemilik')
@section('content')
<div class="container">
  <div class="card"><div class="card-header"><h4>Tambah Pemilik</h4></div>
  <div class="card-body">
    <form action="{{ route('admin.pemilik.store') }}" method="POST">@csrf
      <div class="mb-3">
        <label for="no_wa" class="form-label">No WA</label>
        <input type="text" id="no_wa" name="no_wa" value="{{ old('no_wa') }}" class="form-control @error('no_wa') is-invalid @enderror">
        @error('no_wa')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" id="alamat" name="alamat" value="{{ old('alamat') }}" class="form-control @error('alamat') is-invalid @enderror">
        @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <label for="iduser" class="form-label">User</label>
        <select id="iduser" name="iduser" class="form-select @error('iduser') is-invalid @enderror">
          <option value="">-- Pilih User --</option>
          @foreach($users as $u)
            <option value="{{ $u->iduser }}" {{ old('iduser') == $u->iduser ? 'selected' : '' }}>{{ $u->nama }}</option>
          @endforeach
        </select>
        @error('iduser')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="d-flex justify-content-between">
        <a href="{{ route('admin.pemilik.index') }}" class="btn btn-secondary">Kembali</a>
        <button class="btn btn-primary" type="submit">Simpan</button>
      </div>
    </form>
  </div></div>
</div>
@endsection
