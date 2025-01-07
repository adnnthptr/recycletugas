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
        $data['pelanggan'] = Pelanggan::paginate(3);  // Pagination data pelanggan
        $data['judul'] = 'Data-data Pelanggan';
        return view('pelanggan_index', $data);  // Menampilkan halaman index
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['list_sp'] = ['Motor', 'Mobil'];  // Daftar jenis kendaraan
        return view('pelanggan_create', $data);  // Menampilkan form untuk menambah pelanggan
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'kode_pelanggan' => 'required|unique:pelanggans,kode_pelanggan',
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'jenis_kendaraan' => 'required'
        ]);

        // Menyimpan data pelanggan baru ke database
        $pelanggan = new Pelanggan();
        $pelanggan->kode_pelanggan = $request->kode_pelanggan;
        $pelanggan->nama_pelanggan = $request->nama_pelanggan;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->no_hp = $request->no_hp;
        $pelanggan->jenis_kendaraan = $request->jenis_kendaraan;
        $pelanggan->save();

        // Kembali ke halaman index dengan pesan sukses
        return redirect()->route('pelanggan_index')->with('pesan', 'Data pelanggan berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['pelanggan'] = Pelanggan::findOrFail($id);
        $data['list_sp'] = ['Motor', 'Mobil'];  // Daftar jenis kendaraan
        return view('pelanggan_edit', $data);  // Menampilkan form untuk mengedit pelanggan
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $request->validate([
            'kode_pelanggan' => 'required|unique:pelanggans,kode_pelanggan,' . $id,
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'jenis_kendaraan' => 'required'
        ]);

        // Menemukan pelanggan berdasarkan id
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->kode_pelanggan = $request->kode_pelanggan;
        $pelanggan->nama_pelanggan = $request->nama_pelanggan;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->no_hp = $request->no_hp;
        $pelanggan->jenis_kendaraan = $request->jenis_kendaraan;
        $pelanggan->save();

        // Kembali ke halaman index dengan pesan sukses
        return redirect()->route('pelanggan_index')->with('pesan', 'Data pelanggan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Menemukan pelanggan berdasarkan id
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        // Kembali ke halaman index dengan pesan sukses
        return redirect()->route('pelanggan_index')->with('pesan', 'Data pelanggan berhasil dihapus');
    }

    /**
     * Generate a report for the pelanggan data.
     */
    public function laporan()
    {
        $data['judul'] = 'Laporan Data Pelanggan';
        $data['pelanggan'] = Pelanggan::all(); // Ambil semua data pelanggan
        return view('pelanggan_laporan', $data); // Menampilkan laporan pelanggan
    }
}

