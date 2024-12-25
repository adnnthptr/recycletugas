<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pelanggan'] = \App\Models\Pelanggan::paginate(3); 
        $data['judul'] = 'Data-data pelanggan'; 
        return view('pelanggan_index', $data); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['list_sp']=['Motor','Mobil'];
        return view('pelanggan_create',$data);
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

    $pelanggan = new \App\Models\Pelanggan();
    $pelanggan->kode_pelanggan = $request->kode_pelanggan;
    $pelanggan->nama_pelanggan = $request->nama_pelanggan;
    $pelanggan->kendaraan = $request->kendaraan;
    $pelanggan->no_hp = $request->no_hp;
    $pelanggan->alamat = $request->alamat;
    $pelanggan->save();

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
        $data['pelanggan']=\App\Models\Pelanggan::findOrFail($id);
        $data['list_sp']=['Motor','Mobil'];
        return view('pelanggan_edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_pelanggan' => 'required|unique:pelanggans,kode_pelanggan,'.$id,
            'nama_pelanggan' => 'required',
            'kendaraan' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required'
        ]);
    
        $pelanggan = \App\Models\Pelanggan::findOrFail($id);
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
        //
    }

    public function laporan()
    {
    $data['judul'] = 'Laporan Data Pelanggan';
    $data['pelanggan'] = \App\Models\Pelanggan::all();
    return view('pelanggan_laporan', $data);
    }

}
