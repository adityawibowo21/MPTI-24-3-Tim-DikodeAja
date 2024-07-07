<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index()
    {

        $siswa = Siswa::get();
        return view('siswa.index',['siswa'=>$siswa]);

        
    }

    public function getDashboard()
    {
        $jumlahSiswa = Siswa::count(); // Mengambil jumlah siswa dari database
        return view('dashboard', compact('jumlahSiswa'));
    }

    public function tambah()
    {
        return view('siswa.form'); 
    }

    public function store(Request $request)
    {
        // Logika untuk menyimpan data siswa baru
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:10',
            'kelas' => 'required|string|max:5',
            'no_hp' => 'required|string|max:15',
        ]);

        // Simpan data ke database
         Siswa::create($validatedData);

        return redirect()->route('siswa')->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Cari data siswa berdasarkan ID
        $siswa = Siswa::findOrFail($id); 

        // Tampilkan view form edit dengan data siswa
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang dikirim dari form
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:10',
            'kelas' => 'required|string|max:5',
            'no_hp' => 'required|string|max:15',
        ]);

        // Cari data siswa berdasarkan ID
        $siswa = Siswa::findOrFail($id);

        // Update data siswa dengan data yang telah divalidasi
        $siswa->update($validatedData);

        // Redirect ke halaman daftar siswa dengan pesan sukses
        return redirect()->route('siswa')->with('success', 'Siswa berhasil diupdate.');
    }

    public function destroy($id)
    {
        // Cari data siswa berdasarkan ID
        $siswa = Siswa::findOrFail($id);

        // Hapus data siswa
        $siswa->delete();

        // Redirect ke halaman daftar siswa dengan pesan sukses
        return redirect()->route('siswa')->with('success', 'Siswa berhasil dihapus.');
    }

}
