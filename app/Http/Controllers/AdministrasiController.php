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
        'jenis_masalah kendaraan' => 'required',
        'harga' => 'required',
        'metode_pembayaran' => 'required',
    ]);

    $administrasi = new \App\Models\Administrasi();
    $administrasi->kode_pembayaran = $request->kode_pembayaran;
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
            'jenis_masalah kendaraan' => 'required',
            'harga' => 'required',
            'metode_pembayaran' => 'required',
        ]);
    
        $administrasi = new \App\Models\Administrasi();
        $administrasi->kode_pembayaran = $request->kode_pembayaran;
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
    $data['administrator'] = \App\Models\Administrasi::all();
    return view('administrator_laporan', $data);
    }

}

