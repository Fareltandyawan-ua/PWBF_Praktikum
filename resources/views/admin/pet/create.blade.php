@extends('layouts.app')
@section('title', 'Tambah Pet')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Pet</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.pet.store') }}" method="POST">@csrf
                    <div class="mb-3">
                        <label for="nama_pet" class="form-label">Nama Pet</label>
                        <input type="text" id="nama_pet" name="nama_pet" value="{{ old('nama_pet') }}"
                            class="form-control @error('nama_pet') is-invalid @enderror" required>
                        @error('nama_pet')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="idras_hewan" class="form-label">Ras Hewan</label>
                        <select id="idras_hewan" name="idras_hewan"
                            class="form-select @error('idras_hewan') is-invalid @enderror" required>
                            <option value="">-- Pilih Ras Hewan --</option>
                            @foreach($rasHewan as $r)
                                <option value="{{ $r->idras_hewan }}" {{ old('idras_hewan') == $r->idras_hewan ? 'selected' : '' }}>
                                    {{ $r->nama_ras }} ({{ $r->jenisHewan->nama_jenis_hewan ?? '-' }})
                                </option>
                            @endforeach
                        </select>
                        @error('idras_hewan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="idpemilik" class="form-label">Pemilik</label>
                        <select id="idpemilik" name="idpemilik" class="form-select @error('idpemilik') is-invalid @enderror"
                            required>
                            <option value="">-- Pilih Pemilik --</option>
                            @foreach($pemilik as $p)
                                <option value="{{ $p->idpemilik }}" {{ old('idpemilik') == $p->idpemilik ? 'selected' : '' }}>
                                    {{ $p->user->nama ?? 'Tanpa Nama' }}
                                </option>
                            @endforeach
                        </select>
                        @error('idpemilik')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select id="jenis_kelamin" name="jenis_kelamin" class="form-select">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="Jantan" {{ old('jenis_kelamin') == 'Jantan' ? 'selected' : '' }}>Jantan</option>
                            <option value="Betina" {{ old('jenis_kelamin') == 'Betina' ? 'selected' : '' }}>Betina</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                            class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="warna_tanda" class="form-label">Warna Tanda</label>
                        <input type="text" id="warna_tanda" name="warna_tanda" value="{{ old('warna_tanda') }}">
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.pet.index') }}" class="btn btn-secondary">Kembali</a>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection