<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mekanik;

class MekanikController extends Controller
{
    protected $mekanik;

    public function __construct(Mekanik $mekanik)
    {
        $this->mekanik = $mekanik;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['mekanik'] = Mekanik::paginate(3); 
        $data['judul'] = 'Data-data Mekanik'; 
        return view('mekanik_index', $data); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['list_sp'] = ['Motor', 'Mobil'];
        return view('mekanik_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_mekanik' => 'required|unique:mekaniks,kode_mekanik',
            'nama_mekanik' => 'required',
            'bidang_mekanik' => 'required',
            'no_hp' => 'required',
            'jenis_masalah_kendaraan' => 'required',
        ]);

        $this->mekanik->create([
            'kode_mekanik' => $request->kode_mekanik,
            'nama_mekanik' => $request->nama_mekanik,
            'bidang_mekanik' => $request->bidang_mekanik,
            'no_hp' => $request->no_hp,
            'jenis_masalah_kendaraan' => $request->jenis_masalah_kendaraan,
        ]);

        return redirect()->route('mekanik_index')->with('pesan', 'Data sudah Disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['mekanik'] = $this->mekanik->findOrFail($id);
        $data['list_sp'] = ['Motor', 'Mobil'];
        return view('mekanik_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_mekanik' => "required|unique:mekaniks,kode_mekanik,{$id}",
            'nama_mekanik' => 'required',
            'bidang_mekanik' => 'required',
            'no_hp' => 'required',
            'jenis_masalah_kendaraan' => 'required',
        ]);

        $mekanik = $this->mekanik->findOrFail($id);
        $mekanik->update($request->all());

        return redirect()->route('mekanik_index')->with('pesan', 'Data sudah Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mekanik = $this->mekanik->findOrFail($id);

        if (method_exists($mekanik, 'relatedData') && $mekanik->relatedData()->exists()) {
            return back()->with('error', 'Data ini memiliki relasi, tidak dapat dihapus.');
        }

        $mekanik->delete();
        return redirect()->route('mekanik_index')->with('pesan', 'Data berhasil dihapus');
    }

    /**
     * Generate a report for mekanik data.
     */
    public function laporan(Request $request)
    {
        $query = $this->mekanik->query();

        if ($request->filled('bidang_mekanik')) {
            $query->where('bidang_mekanik', $request->bidang_mekanik);
        }

        if ($request->filled('jenis_masalah_kendaraan')) {
            $query->where('jenis_masalah_kendaraan', 'like', '%' . $request->jenis_masalah_kendaraan . '%');
        }

        $data['judul'] = 'Laporan Data Mekanik';
        $data['mekanik'] = $query->get();
        return view('mekanik_laporan', $data);
    }
}
