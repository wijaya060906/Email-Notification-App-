<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    
    // Menyimpan data golongan
    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required|unique:jabatan|max:255',
        ]);

        Jabatan::create([
            'nama_jabatan' => $request->nama_jabatan,
        ]);

        return redirect()->route('jabatan.jabatan')->with('success', 'jabatan berhasil ditambahkan');
    }

    public function edit($id)
    {
      // Ambil data golongan berdasarkan ID
      $jabatan = Jabatan::findOrFail($id);

      // Kirim data golongan ke view edit
      return view('jabatan.update', compact('jabatan'));
    }

    public function update(Request $request, $id)
    {
      // Validasi input
      $request->validate([
        'nama_jabatan' => 'required|max:255|unique:jabatan,nama_jabatan,' . $id,
      ]);

      // Cari golongan yang akan diupdate
      $jabatan = Jabatan::findOrFail($id);

      // Update nama golongan
      $jabatan->update([
        'nama_jabatan' => $request->nama_jabatan,
      ]);

      // Redirect dengan pesan sukses
      return redirect()->route('jabatan.jabatan')->with('success', 'Golongan berhasil diperbarui');
}


    // Menghapus golongan
    public function destroy($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete();

        return redirect()->route('jabatan.jabatan')->with('success', 'Golongan berhasil dihapus');
    }


}
