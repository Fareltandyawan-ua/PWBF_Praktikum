<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriKlinis;

class KategoriKlinisController extends Controller
{
    public function index()
    {
        $kategoriKlinis = KategoriKlinis::all();
        return view('admin.kategori-klinis.index', compact('kategoriKlinis'));
    }

    public function create()
    {
        return view('admin.kategori-klinis.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateKategoriKlinis($request);
        $this->createKategoriKlinis($validated);

        return redirect()->route('admin.kategori-klinis.index')->with('success', 'Data kategori klinis berhasil ditambahkan!');
    }

    protected function validateKategoriKlinis(Request $request, $id = null): array
    {
        $uniqueRule = $id ? 'unique:kategori_klinis,nama_kategori_klinis,'.$id.',idkategori_klinis' : 'unique:kategori_klinis,nama_kategori_klinis';

        return $request->validate([
            'nama_kategori_klinis' => ['required','string','min:3','max:50',$uniqueRule],
        ], [
            'nama_kategori_klinis.required' => 'Nama kategori klinis wajib diisi.',
            'nama_kategori_klinis.min' => 'Nama minimal 3 karakter.',
            'nama_kategori_klinis.max' => 'Nama maksimal 50 karakter.',
            'nama_kategori_klinis.unique' => 'Nama sudah ada.',
        ]);
    }

    protected function createKategoriKlinis(array $data)
    {
        try {
            return KategoriKlinis::create([
                'nama_kategori_klinis' => $this->formatNama($data['nama_kategori_klinis']),
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan kategori klinis: '.$e->getMessage());
        }
    }

    protected function formatNama($nama) { return trim(ucwords(strtolower($nama))); }
}
