<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\RasHewan;
use App\Models\Pemilik;

class PetController extends Controller
{
    public function index()
    {
        $pet = Pet::with(['pemilik.user', 'rasHewan'])->get();
        return view('admin.pet.index', compact('pet'));
    }

    public function create()
    {
        $rasHewan = RasHewan::all();
        $pemilik = Pemilik::with('user')->get();
        return view('admin.pet.create', compact('rasHewan', 'pemilik'));
    }

    public function store(Request $request)
    {
        $validated = $this->validatePet($request);
        $this->createPet($validated);

        return redirect()->route('admin.pet.index')->with('success', 'Data pet berhasil ditambahkan!');
    }

    protected function validatePet(Request $request, $id = null): array
    {
        $uniqueRule = $id ? 'unique:pet,nama_pet,' . $id . ',idpet' : 'unique:pet,nama_pet';

        return $request->validate([
            'nama_pet' => ['required', 'string', 'min:2', 'max:255', $uniqueRule],
            'idras_hewan' => ['required', 'integer', 'exists:ras_hewan,idras_hewan'],
            'idpemilik' => ['required', 'integer', 'exists:pemilik,idpemilik'],
            'jenis_kelamin' => ['nullable', 'in:Jantan,Betina'],
            'tgl_lahir' => ['nullable', 'date'],
        ], [
            'nama_pet.required' => 'Nama pet wajib diisi.',
            'nama_pet.unique' => 'Nama pet sudah ada.',
            'idras_hewan.required' => 'Ras hewan wajib dipilih.',
            'idpemilik.required' => 'Pemilik wajib dipilih.',
        ]);
    }

    protected function createPet(array $data)
    {
        try {
            return Pet::create([
                'nama_pet' => $this->formatNama($data['nama_pet']),
                'idras_hewan' => $data['idras_hewan'],
                'idpemilik' => $data['idpemilik'],
                'jenis_kelamin' => $data['jenis_kelamin'] ?? null,
                'tgl_lahir' => $data['tgl_lahir'] ?? null,
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan pet: ' . $e->getMessage());
        }
    }

    protected function formatNama($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }
}
