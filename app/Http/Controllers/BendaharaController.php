<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bendahara;

class BendaharaController extends Controller
{
    public function index()
    {

        $bendahara = Bendahara::get();
        return view('bendahara.index',['bendahara'=>$bendahara]);

        
    }

    public function tambah()
    {
        return view('bendahara.form'); 
    }

    public function store(Request $request)
    {
        // Logika untuk menyimpan data bendahara baru
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
        ]);

        // Simpan data ke database
         Bendahara::create($validatedData);

        return redirect()->route('bendahara')->with('success', 'Bendahara berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Cari data bendahara berdasarkan ID
        $bendahara = Bendahara::findOrFail($id); 

        // Tampilkan view form edit dengan data bendahara
        return view('bendahara.edit', compact('bendahara'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang dikirim dari form
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
        ]);

        // Cari data bendahara berdasarkan ID
        $bendahara = Bendahara::findOrFail($id);

        // Update data bendahara dengan data yang telah divalidasi
        $bendahara->update($validatedData);

        // Redirect ke halaman daftar bendahara dengan pesan sukses
        return redirect()->route('bendahara')->with('success', 'Bendahara berhasil diupdate.');
    }

    public function destroy($id)
    {
        // Cari data bendahara berdasarkan ID
        $bendahara = Bendahara::findOrFail($id);

        // Hapus data bendahara
        $bendahara->delete();

        // Redirect ke halaman daftar bendahara dengan pesan sukses
        return redirect()->route('bendahara')->with('success', 'Bendahara berhasil dihapus.');
    }

}
