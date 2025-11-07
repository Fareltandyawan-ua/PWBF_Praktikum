<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateKategori($request);
        $this->createKategori($validated);

        return redirect()->route('admin.kategori.index')->with('success', 'Data kategori berhasil ditambahkan!');
    }

    protected function validateKategori(Request $request, $id = null): array
    {
        $uniqueRule = $id ?
            'unique:kategori,nama_kategori,'.$id.',idkategori' :
            'unique:kategori,nama_kategori';

        return $request->validate([
            'nama_kategori' => ['required','string','min:3','max:100',$uniqueRule],
        ], [
            'nama_kategori.required' => 'Nama kategori wajib diisi.',
            'nama_kategori.min' => 'Nama kategori minimal 3 karakter.',
            'nama_kategori.max' => 'Nama kategori maksimal 100 karakter.',
            'nama_kategori.unique' => 'Nama kategori sudah ada.',
        ]);
    }

    protected function createKategori(array $data)
    {
        try {
            return Kategori::create([
                'nama_kategori' => $this->formatNama($data['nama_kategori']),
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan data kategori: '.$e->getMessage());
        }
    }

    protected function formatNama($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }
}

