<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['manager'] = \App\Models\Manager::paginate(3); 
        $data['judul'] = 'Data-data manager'; 
        return view('manager_index', $data); 
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['list_sp']=['Tim Pengawas','Pemimpin','Tim Operasional'];
        return view('manager_create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_manager' => 'required|unique:managers,kode_manager',
            'nama_manager' => 'required',
            'tugas_manager' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required'
        ]);

        $manager = new \App\Models\Manager();
        $manager->kode_manager = $request->kode_manager;
        $manager->nama_manager = $request->nama_manager;
        $manager->tugas_manager = $request->tugas_manager;
        $manager->no_hp = $request->no_hp;
        $manager->alamat = $request->alamat;
        $manager->save();

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
    public function edit(Request $request, $id)
    {
    $data['manager'] = \App\Models\Manager::findOrFail($id);
    $data['list_sp'] = ['Tim Pengawas', 'Pemimpin', 'Tim Operasional'];
    return view('manager_edit', $data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_manager' => 'required|unique:managers,kode_manager,'.$id,
            'nama_manager' => 'required',
            'tugas_manager' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required'
        ]);
    
        $manager = \App\Models\Manager::findOrFail($id);
        $manager->kode_manager = $request->kode_manager;
        $manager->nama_manager = $request->nama_manager;
        $manager->tugas_manager = $request->tugas_manager;
        $manager->no_hp = $request->no_hp;
        $manager->alamat = $request->alamat;
        $manager->save();
        return redirect('/manager')->with('pesan', 'Data sudah Diupdate');
    }

    public function movePhoneToTask()
{
    // Ambil semua data manager
    $managers = \App\Models\Manager::all();

    foreach ($managers as $manager) {
        // Pindahkan data dari no_hp ke tugas_manager
        $manager->tugas_manager = $manager->no_hp;
        $manager->no_hp = null; // Kosongkan kolom no_hp
        $manager->save();
    }

    return redirect()->route('manager_index')->with('pesan', 'Data nomor HP telah dipindahkan ke tugas manager');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $manager = \App\Models\Manager::findOrFail($id);
        $manager->delete();
        return back()->with('pesan','Data Sudah Dihapus');
    }

    public function laporan() 
    {
    $data['judul'] = 'Laporan Data Manager';
    $data['manager'] = \App\Models\Manager::all(); 
    return view('manager_laporan', $data);
    }

}
