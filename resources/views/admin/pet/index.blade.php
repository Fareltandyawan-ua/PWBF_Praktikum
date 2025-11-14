@extends('layouts.lte.main')
@section('content')
    <div class="container mt-4">
        <h2>Data Pet</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('admin.pet.create') }}" class="btn btn-success mb-3">+ Tambah Pet</a>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Pet</th>
                    <th>Ras Hewan</th>
                    <th>Pemilik</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Warna Tanda</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pet as $i => $p)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $p->nama_pet }}</td>
                        <td>{{ $p->rasHewan->nama_ras ?? '-' }}</td>
                        <td>{{ $p->pemilik->user->nama ?? '-' }}</td>
                        <td>{{ $p->jenis_kelamin ?? '-' }}</td>
                        <td>{{ $p->tanggal_lahir ?? '-' }}</td>
                        <td>{{ $p->warna_tanda ?? '-' }}</td>
                        <td>
                            <button class="btn btn-sm btn-warning">Edit</button>
                            <button class="btn btn-sm btn-danger"
                                onclick="if(confirm('Yakin ingin menghapus data ini?')) document.getElementById('del-{{ $p->idpet }}').submit();">Hapus</button>
                            <form id="del-{{ $p->idpet }}" action="#" method="POST" style="display:none;">@csrf
                                @method('DELETE')</form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection