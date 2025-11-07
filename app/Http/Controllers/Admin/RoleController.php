<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateRole($request);
        $this->createRole($validated);

        return redirect()->route('admin.role.index')->with('success', 'Data role berhasil ditambahkan!');
    }

    protected function validateRole(Request $request, $id = null): array
    {
        $uniqueRule = $id ? 'unique:role,nama_role,'.$id.',idrole' : 'unique:role,nama_role';

        return $request->validate([
            'nama_role' => ['required','string','min:2','max:100',$uniqueRule],
        ], [
            'nama_role.required' => 'Nama role wajib diisi.',
        ]);
    }

    protected function createRole(array $data)
    {
        try {
            return Role::create(['nama_role' => $this->formatNama($data['nama_role'])]);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan role: '.$e->getMessage());
        }
    }

    protected function formatNama($nama) { return trim(ucwords(strtolower($nama))); }
}
