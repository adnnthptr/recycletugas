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
        // Validasi input dari pengguna
        $request->validate([
            'kode_pelanggan' => 'required|unique:pelanggans,kode_pelanggan',
            'nama_pelanggan' => 'required',
            'kendaraan' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        // Membuat instance pelanggan baru dan menyimpannya
        $pelanggan = new Pelanggan();
        $pelanggan->kode_pelanggan = $request->kode_pelanggan;
        $pelanggan->nama_pelanggan = $request->nama_pelanggan;
        $pelanggan->kendaraan = $request->kendaraan;
        $pelanggan->no_hp = $request->no_hp;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->save();

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('pesan', 'Data sudah Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);  // Cari pelanggan berdasarkan ID
        return view('pelanggan_show', compact('pelanggan'));  // Menampilkan detail pelanggan
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['pelanggan'] = Pelanggan::findOrFail($id);  // Ambil data pelanggan untuk diubah
        $data['list_sp'] = ['Motor', 'Mobil'];  // Jenis kendaraan
        return view('pelanggan_edit', $data);  // Menampilkan form edit
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'kode_pelanggan' => 'required|unique:pelanggans,kode_pelanggan,' . $id,
            'nama_pelanggan' => 'required',
            'kendaraan' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        // Cari pelanggan berdasarkan ID
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->kode_pelanggan = $request->kode_pelanggan;
        $pelanggan->nama_pelanggan = $request->nama_pelanggan;
        $pelanggan->kendaraan = $request->kendaraan;
        $pelanggan->no_hp = $request->no_hp;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->save();  // Update data pelanggan

        // Redirect ke halaman index dengan pesan sukses
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
        $data['judul'] = 'Laporan Data Pelanggan';  // Judul laporan
        $data['pelanggan'] = Pelanggan::all();  // Ambil semua data pelanggan
        return view('pelanggan_laporan', $data);  // Tampilkan halaman laporan
    }
}
