<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donatur;

class DonaturController extends Controller
{
    public function index()
    {

        $donatur = Donatur::get();
        return view('donatur.index',['donatur'=>$donatur]);

        
    }

    public function tambah()
    {
        return view('donatur.form'); 
    }

    public function store(Request $request)
    {
        // Logika untuk menyimpan data donatur baru
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
        ]);

        // Simpan data ke database
         Donatur::create($validatedData);

        return redirect()->route('donatur')->with('success', 'Donatur berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Cari data donatur berdasarkan ID
        $donatur = Donatur::findOrFail($id); 

        // Tampilkan view form edit dengan data donatur
        return view('donatur.edit', compact('donatur'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang dikirim dari form
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
        ]);

        // Cari data donatur berdasarkan ID
        $donatur = Donatur::findOrFail($id);

        // Update data donatur dengan data yang telah divalidasi
        $donatur->update($validatedData);

        // Redirect ke halaman daftar donatur dengan pesan sukses
        return redirect()->route('donatur')->with('success', 'Donatur berhasil diupdate.');
    }

    public function destroy($id)
    {
        // Cari data donatur berdasarkan ID
        $donatur = Donatur::findOrFail($id);

        // Hapus data donatur
        $donatur->delete();

        // Redirect ke halaman daftar donatur dengan pesan sukses
        return redirect()->route('donatur')->with('success', 'donatur berhasil dihapus.');
    }

}
