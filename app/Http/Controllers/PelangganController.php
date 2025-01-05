<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pelanggan'] = Pelanggan::paginate(3);
        $data['judul'] = 'Data-data pelanggan';
        return view('pelanggan_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['list_sp'] = ['Motor', 'Mobil'];
        return view('pelanggan_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_pelanggan' => 'required|unique:pelanggans,kode_pelanggan',
            'nama_pelanggan' => 'required',
            'kendaraan' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required'
        ]);

        $pelanggan = new Pelanggan();
        $pelanggan->kode_pelanggan = $request->kode_pelanggan;
        $pelanggan->nama_pelanggan = $request->nama_pelanggan;
        $pelanggan->kendaraan = $request->kendaraan;
        $pelanggan->no_hp = $request->no_hp;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->save();

        return back()->with('pesan', 'Data sudah Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan_show', compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['pelanggan'] = Pelanggan::findOrFail($id);
        $data['list_sp'] = ['Motor', 'Mobil'];
        return view('pelanggan_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_pelanggan' => 'required|unique:pelanggans,kode_pelanggan,' . $id,
            'nama_pelanggan' => 'required',
            'kendaraan' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required'
        ]);

        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->kode_pelanggan = $request->kode_pelanggan;
        $pelanggan->nama_pelanggan = $request->nama_pelanggan;
        $pelanggan->kendaraan = $request->kendaraan;
        $pelanggan->no_hp = $request->no_hp;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->save();

        return redirect('/pelanggan')->with('pesan', 'Data sudah Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Cari data pelanggan berdasarkan ID
            $pelanggan = Pelanggan::findOrFail($id);

            // Hapus data pelanggan
            $pelanggan->delete();

            // Redirect ke halaman index dengan pesan sukses
            return redirect()->route('pelanggan_index')->with('pesan', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            // Tangani error dan redirect dengan pesan error
            return redirect()->route('pelanggan_index')->with('pesan', 'Terjadi kesalahan saat menghapus data!')->with('alert-type', 'danger');
        }
    }

    /**
     * Generate laporan data pelanggan.
     */
    public function laporan()
    {
        $data['judul'] = 'Laporan Data Pelanggan';
        $data['pelanggan'] = Pelanggan::all();
        return view('pelanggan_laporan', $data);
    }
}
