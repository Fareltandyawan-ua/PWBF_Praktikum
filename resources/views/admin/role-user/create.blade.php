@extends('layouts.app')
@section('title', 'Tambah Role User')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Role User</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.role-user.store') }}" method="POST">@csrf
                    <div class="mb-3">
                        <label for="iduser" class="form-label">User</label>
                        <select id="iduser" name="iduser" class="form-select @error('iduser') is-invalid @enderror"
                            required>
                            <option value="">-- Pilih User --</option>
                            @foreach($users as $u)
                                <option value="{{ $u->iduser }}" {{ old('iduser') == $u->iduser ? 'selected' : '' }}>
                                    {{ $u->nama }}</option>
                            @endforeach
                        </select>
                        @error('iduser')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="idrole" class="form-label">Role</label>
                        <select id="idrole" name="idrole" class="form-select @error('idrole') is-invalid @enderror"
                            required>
                            <option value="">-- Pilih Role --</option>
                            @foreach($roles as $r)
                                <option value="{{ $r->idrole }}" {{ old('idrole') == $r->idrole ? 'selected' : '' }}>
                                    {{ $r->nama_role }}</option>
                            @endforeach
                        </select>
                        @error('idrole')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select id="status" name="status" class="form-select">
                            <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.role-user.index') }}" class="btn btn-secondary">Kembali</a>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection