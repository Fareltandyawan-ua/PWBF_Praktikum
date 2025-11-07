<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KodeTindakanTerapi;
use App\Models\Kategori;
use App\Models\KategoriKlinis;

class KodeTindakanTerapiController extends Controller
{
    public function index()
    {
        $kodes = KodeTindakanTerapi::with(['kategori','kategoriKlinis'])->get();
        return view('admin.kode-tindakan-terapi.index', compact('kodes'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        $kategoriKlinis = KategoriKlinis::all();
        return view('admin.kode-tindakan-terapi.create', compact('kategori','kategoriKlinis'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateKode($request);
        $this->createKode($validated);

        return redirect()->route('admin.kode-tindakan-terapi.index')->with('success', 'Data kode tindakan terapi berhasil ditambahkan!');
    }

    protected function validateKode(Request $request, $id = null): array
    {
        $uniqueRule = $id ? 'unique:kode_tindakan_terapi,kode,'.$id.',idkode_tindakan_terapi' : 'unique:kode_tindakan_terapi,kode';

        return $request->validate([
            'kode' => ['required','string','max:5',$uniqueRule],
            'deskripsi_tindakan_terapi' => ['nullable','string','max:1000'],
            'idkategori' => ['nullable','integer','exists:kategori,idkategori'],
            'idkategori_klinis' => ['nullable','integer','exists:kategori_klinis,idkategori_klinis'],
        ], [
            'kode.required' => 'Kode wajib diisi.',
            'kode.max' => 'Kode maksimal 5 karakter.',
            'idkategori.exists' => 'Kategori tidak valid.',
            'idkategori_klinis.exists' => 'Kategori klinis tidak valid.',
        ]);
    }

    protected function createKode(array $data)
    {
        try {
            return KodeTindakanTerapi::create([
                'kode' => strtoupper(trim($data['kode'])),
                'deskripsi_tindakan_terapi' => $data['deskripsi_tindakan_terapi'] ?? null,
                'idkategori' => $data['idkategori'] ?? null,
                'idkategori_klinis' => $data['idkategori_klinis'] ?? null,
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan kode tindakan terapi: '.$e->getMessage());
        }
    }
}
