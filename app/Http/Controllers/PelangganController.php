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
        //
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
    
        $manager = \App\Models\Manager::findOrFail($id);
        $manager->kode_pelanggan = $request->kode_pelanggan;
        $manager->nama_pelanggan = $request->nama_pelanggan;
        $manager->kendaraan = $request->kendaraan;
        $manager->no_hp = $request->no_hp;
        $manager->alamat = $request->alamat;
        $manager->save();
        return redirect('/pelanggan')->with('pesan', 'Data sudah Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
