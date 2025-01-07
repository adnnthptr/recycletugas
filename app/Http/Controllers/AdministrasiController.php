<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrasi;
use App\Models\Pelanggan;
use App\Models\Mekanik;

class AdministrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menggunakan paginate untuk membatasi jumlah data yang ditampilkan
        $data['administrasi'] = Administrasi::paginate(3);
        $data['judul'] = 'Data Administrasi';
        return view('administrasi_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengambil data pelanggan dan mekanik dengan menggunakan selectRaw
        $data['list_pelanggan'] = Pelanggan::selectRaw("id, concat(kode_pelanggan, '-', nama_pelanggan) as tampil")
            ->pluck('tampil', 'id');
        $data['list_mekanik'] = Mekanik::selectRaw("id, concat(kode_mekanik, '-', nama_mekanik) as tampil")
            ->pluck('tampil', 'id');
        return view('administrasi_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_pembayaran' => 'required|unique:administrasi,kode_pembayaran',
            'pelanggan' => 'required',
            'mekanik' => 'required',
            'jenis_masalah_kendaraan' => 'required',
            'harga' => 'required',
            'metode_pembayaran' => 'required',
        ]);

        // Menyimpan administrasi baru
        $administrasi = new Administrasi();
        $administrasi->kode_pembayaran = $request->kode_pembayaran;
        $administrasi->pelanggan_id = $request->pelanggan;
        $administrasi->mekanik_id = $request->mekanik;
        $administrasi->jenis_masalah_kendaraan = $request->jenis_masalah_kendaraan;
        $administrasi->harga = $request->harga;
        $administrasi->metode_pembayaran = $request->metode_pembayaran;
        $administrasi->save();

        // Mengarahkan kembali dengan pesan sukses
        return back()->with('pesan', 'Data sudah Disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Mengambil data administrasi yang ingin diedit
        $data['administrasi'] = Administrasi::findOrFail($id);
        $data['list_pelanggan'] = Pelanggan::selectRaw("id, concat(kode_pelanggan, '-', nama_pelanggan) as tampil")
            ->pluck('tampil', 'id');
        $data['list_mekanik'] = Mekanik::selectRaw("id, concat(kode_mekanik, '-', nama_mekanik) as tampil")
            ->pluck('tampil', 'id');
        return view('administrasi_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input sebelum update
        $request->validate([
            'kode_pembayaran' => 'required|unique:administrasi,kode_pembayaran,' . $id,
            'pelanggan' => 'required',
            'mekanik' => 'required',
            'jenis_masalah_kendaraan' => 'required',
            'harga' => 'required',
            'metode_pembayaran' => 'required',
        ]);

        // Menemukan administrasi berdasarkan ID
        $administrasi = Administrasi::findOrFail($id);
        $administrasi->kode_pembayaran = $request->kode_pembayaran;
        $administrasi->pelanggan_id = $request->pelanggan;
        $administrasi->mekanik_id = $request->mekanik;
        $administrasi->jenis_masalah_kendaraan = $request->jenis_masalah_kendaraan;
        $administrasi->harga = $request->harga;
        $administrasi->metode_pembayaran = $request->metode_pembayaran;
        $administrasi->save();

        // Redirect dengan pesan sukses
        return redirect('/administrasi')->with('pesan', 'Data sudah Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Menemukan administrasi berdasarkan ID dan menghapusnya
        $administrasi = Administrasi::findOrFail($id);
        $administrasi->delete();

        // Mengarahkan kembali ke halaman administrasi dengan pesan sukses
        return redirect()->route('administrasi_index')->with('pesan', 'Data sudah Dihapus');
    }

    /**
     * Generate a report for administrasi data.
     */
    public function laporan()
    {
        $data['judul'] = 'Laporan Data Administrasi';
        $data['administrasi'] = Administrasi::all();  // Mengambil semua data administrasi
        return view('administrasi_laporan', $data);
    }
}
