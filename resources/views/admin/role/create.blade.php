@extends('layouts.app')
@section('title', 'Tambah Role')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Role</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.role.store') }}" method="POST">@csrf
                    <div class="mb-3">
                        <label for="nama_role" class="form-label">Nama Role</label>
                        <input type="text" id="nama_role" name="nama_role" value="{{ old('nama_role') }}"
                            class="form-control @error('nama_role') is-invalid @enderror" required>
                        @error('nama_role')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.role.index') }}" class="btn btn-secondary">Kembali</a>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection