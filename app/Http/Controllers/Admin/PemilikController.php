<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemilik;
use App\Models\User;

class PemilikController extends Controller
{
    public function index()
    {
        $pemilik = Pemilik::with('user')->get();
        return view('admin.pemilik.index', compact('pemilik'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.pemilik.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $this->validatePemilik($request);
        $this->createPemilik($validated);

        return redirect()->route('admin.pemilik.index')->with('success', 'Data pemilik berhasil ditambahkan!');
    }

    protected function validatePemilik(Request $request, $id = null): array
    {
        return $request->validate([
            'no_wa' => ['nullable','string','max:45'],
            'alamat' => ['nullable','string','max:100'],
            'iduser' => ['nullable','integer','exists:user,iduser'],
        ], [
            'iduser.exists' => 'User tidak valid.',
        ]);
    }

    protected function createPemilik(array $data)
    {
        try {
            return Pemilik::create([
                'no_wa' => $data['no_wa'] ?? null,
                'alamat' => $data['alamat'] ?? null,
                'iduser' => $data['iduser'] ?? null,
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan pemilik: '.$e->getMessage());
        }
    }
}
