<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisHewan;

class JenisHewanController extends Controller
{
    public function index()
    {
        // $jenishewan = JenisHewan::select('idjenis_hewan', 'nama_jenis_hewan')->get();
        $jenisHewan = \DB::table('jenis_hewan')
        ->select('idjenis_hewan', 'nama_jenis_hewan')
        ->get();

        return view('admin.jenis-hewan.index', compact('jenisHewan'));
    }
    
    public function create()
    {
        return view('admin.jenis-hewan.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateJenisHewan($request);
        $this->createJenisHewan($validated);

        return redirect()->route('admin.jenis-hewan.index')->with('success', 'Data jenis hewan berhasil ditambahkan!');
    }

    protected function validateJenisHewan(Request $request, $id = null)
    {
        // data yang bersifat unix
        $uniqueRule = $id ?
            'unique:jenis_hewan, nama_jenis_hewan,'. $id . 'idjenis_hewan' :
            'unique:jenis_hewan, nama_jenis_hewan';


        // validasi data input
        return $request->validate([
            'nama_jenis_hewan' => [
                'required',
                'string',
                'max:255',
                'min:3',
                $uniqueRule
            ],
        ], [
            'nama_jenis_hewan.required' => 'Nama jenis hewan wajib diisi.',
            'nama_jenis_hewan.string' => 'Nama jenis hewan harus berupa teks.',
            'nama_jenis_hewan.max' => 'Nama jenis hewan maksimal 255 karakter.',
            'nama_jenis_hewan.min' => 'Nama jenis hewan minimal 3 karakter.',
            'nama_jenis_hewan.unique' => 'Nama jenis hewan sudah ada.',
        ]
    );
    }

    // Helper untuk membuat data baru
    protected function createJenisHewan(array $data)
    {
        try {
        //     return JenisHewan::create([
        //         'nama_jenis_hewan' => $this->formatNamaJenisHewan($data['nama_jenis_hewan']),
        //     ]);
        // } catch (\Exception $e) {
        //     throw new \Exception('Gagal menyimpan data jenis hewan: ' . $e->getMessage());
        $jenisHewan = \DB::table('jenis_hewan')->insert(['nama_jenis_hewan' => $this->formatNamaJenisHewan($data['nama_jenis_hewan']),
        ]);

        return $jenisHewan;
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan data jenis hewan: ' . $e->getMessage());
        }
    }

    // Helper untuk format nama menjadi Title Case
    protected function formatNamaJenisHewan($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }
}
