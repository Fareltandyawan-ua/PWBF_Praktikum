<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateUser($request);
        $this->createUser($validated);

        return redirect()->route('admin.user.index')->with('success', 'Data user berhasil ditambahkan!');
    }

    protected function validateUser(Request $request, $id = null): array
    {
        $uniqueEmail = $id ? 'unique:user,email,'.$id.',iduser' : 'unique:user,email';

        return $request->validate([
            'nama' => ['required','string','max:500','min:3'],
            'email' => ['required','email','max:200',$uniqueEmail],
            'password' => [$id ? 'nullable' : 'required', 'string', 'min:6', 'max:300'],
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
        ]);
    }

    protected function createUser(array $data)
    {
        try {
            return User::create([
                'nama' => $this->formatNama($data['nama']),
                'email' => strtolower(trim($data['email'])),
                'password' => Hash::make($data['password']),
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan user: '.$e->getMessage());
        }
    }

    protected function formatNama($nama) { return trim(ucwords(strtolower($nama))); }
}
