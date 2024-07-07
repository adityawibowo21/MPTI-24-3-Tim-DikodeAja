<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Infaq;

class InfaqController extends Controller
{

    public function index()
    {
        $infaq = Infaq::get();
        return view('infaq.index',['infaq'=>$infaq]);
    }
    
    public function tambah()
    {
        return view('infaq.form'); 
    }

    public function store(Request $request)
    {
        // Logika untuk menyimpan data donatur baru
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|string|max:255',
            'timestamps' => 'required|string|max:50',
        ]);

        // Simpan data ke database
         Infaq::create($validatedData);

        return redirect()->route('Infaq')->with('success', 'Infaq berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Cari data donatur berdasarkan ID
        $infaq = Infaq::findOrFail($id); 

        // Tampilkan view form edit dengan data donatur
        return view('infaq.edit', compact('donatur'));
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
        $infaq = Infaq::findOrFail($id);

        // Update data donatur dengan data yang telah divalidasi
        $infaq->update($validatedData);

        // Redirect ke halaman daftar donatur dengan pesan sukses
        return redirect()->route('infaq')->with('success', 'Donatur berhasil diupdate.');
    }

    public function destroy($id)
    {
        // Cari data donatur berdasarkan ID
        $infaq = Infaq::findOrFail($id);

        // Hapus data donatur
        $infaq->delete();

        // Redirect ke halaman daftar donatur dengan pesan sukses
        return redirect()->route('infaq')->with('success', 'donatur berhasil dihapus.');
    }
}
