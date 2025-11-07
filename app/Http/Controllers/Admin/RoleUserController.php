<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\Role;

class RoleUserController extends Controller
{
    public function index()
    {
        $roleUsers = RoleUser::with(['user','role'])->get();
        return view('admin.role-user.index', compact('roleUsers'));
    }

    public function create()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.role-user.create', compact('users','roles'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateRoleUser($request);
        $this->createRoleUser($validated);

        return redirect()->route('admin.role-user.index')->with('success', 'Data role user berhasil ditambahkan!');
    }

    protected function validateRoleUser(Request $request, $id = null): array
    {
        return $request->validate([
            'iduser' => ['required','integer','exists:user,iduser'],
            'idrole' => ['required','integer','exists:role,idrole'],
            'status' => ['nullable','in:0,1'],
        ], [
            'iduser.required' => 'User wajib dipilih.',
            'idrole.required' => 'Role wajib dipilih.',
        ]);
    }

    protected function createRoleUser(array $data)
    {
        try {
            return RoleUser::create([
                'iduser' => $data['iduser'],
                'idrole' => $data['idrole'],
                'status' => $data['status'] ?? 1,
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan role user: '.$e->getMessage());
        }
    }
}

