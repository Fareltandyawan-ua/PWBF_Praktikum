<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RasHewan;
use App\Models\JenisHewan;

class RasHewanController extends Controller
{
    public function index()
    {
        $ras = RasHewan::with('jenisHewan')->get();
        return view('admin.ras-hewan.index', compact('ras'));
    }

    public function create()
    {
        $jenisHewan = JenisHewan::all();
        return view('admin.ras-hewan.create', compact('jenisHewan'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateRas($request);
        $this->createRas($validated);

        return redirect()->route('admin.ras-hewan.index')->with('success', 'Data ras hewan berhasil ditambahkan!');
    }

    protected function validateRas(Request $request, $id = null): array
    {
        $uniqueRule = $id ? 'unique:ras_hewan,nama_ras,'.$id.',idras_hewan' : 'unique:ras_hewan,nama_ras';

        return $request->validate([
            'nama_ras' => ['required','string','min:2','max:100',$uniqueRule],
            'idjenis_hewan' => ['required','integer','exists:jenis_hewan,idjenis_hewan'],
        ], [
            'nama_ras.required' => 'Nama ras wajib diisi.',
            'idjenis_hewan.required' => 'Jenis hewan wajib dipilih.',
            'idjenis_hewan.exists' => 'Jenis hewan tidak valid.',
        ]);
    }

    protected function createRas(array $data)
    {
        try {
            return RasHewan::create([
                'nama_ras' => $this->formatNama($data['nama_ras']),
                'idjenis_hewan' => $data['idjenis_hewan'],
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan ras hewan: '.$e->getMessage());
        }
    }

    protected function formatNama($nama) { return trim(ucwords(strtolower($nama))); }
}
