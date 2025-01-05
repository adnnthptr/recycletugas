<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['administrasi'] = \App\Models\Administrasi::paginate(3); 
        $data['judul'] = 'Data-data administrasi'; 
        return view('administrasi_index', $data); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['list_pelanggan'] = \App\Models\Pelanggan::selectRaw("id, concat(kode_pelanggan,'-', nama_pelanggan) as
        tampil")->pluck('tampil', 'id');
        $data['list_mekanik'] = \App\Models\Mekanik::selectRaw("id, concat(kode_mekanik,'-', nama_mekanik) as
        tampil")->pluck('tampil', 'id');
        return view('administrasi_create', $data);
        $data['list_sp']=['Motor','Mobil'];
        return view('administrasi_create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'kode_pembayaran' => 'required|unique:administrators,kode_pelanggan',
        'pelanggan' => 'required',
        'mekanik' => 'required',
        'jenis_masalah kendaraan' => 'required',
        'harga' => 'required',
        'metode_pembayaran' => 'required',
    ]);

    $administrasi = new \App\Models\Administrasi();
    $administrasi->kode_pembayaran = $request->kode_pembayaran;
    $administrasi->pelanggan = $request->pelanggan;
    $administrasi->mekanik = $request->mekanik;
    $administrasi->jenis_masalah_kendaraan = $request->jenis_masalah_kendaraan;
    $administrasi->harga = $request->harga;
    $administrasi->metode_pembayaran = $request->metode_pembayaran;
    $administrasi->save();

    return back()->with('pesan','Data sudah Disimpan');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['administrator']=\App\Models\Administrasi::findOrFail($id);
        $data['list_sp']=['Motor','Mobil'];
        return view('pelanggan_edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_pembayaran' => 'required|unique:pelanggans,kode_pelanggan',
            'pelanggan' => 'required',
            'mekanik' => 'required',
            'jenis_masalah kendaraan' => 'required',
            'harga' => 'required',
            'metode_pembayaran' => 'required',
        ]);
    
        $administrasi = new \App\Models\Administrasi();
        $administrasi->kode_pembayaran = $request->kode_pembayaran;
        $administrasi->pelanggan = $request->pelanggan;
        $administrasi->mekanik = $request->mekanik;
        $administrasi->jenis_masalahkendaraan = $request->jenis_masalahkendaraan;
        $administrasi->harga = $request->harga;
        $administrasi->metode_pembayaran = $request->metode_pembayaran;
        $administrasi->save(); 
        return redirect('/administrator')->with('pesan', 'Data sudah Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function laporan()
    {
    $data['judul'] = 'Laporan Data administrasi';
    $data['administrasi'] = \App\Models\Administrasi::all();
    return view('administrasi_laporan', $data);
    }

}

