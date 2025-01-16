<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    // Menyimpan data golongan
    public function store(Request $request)
    {
        $request->validate([
            'nama_golongan' => 'required|unique:golongan|max:255',
        ]);

        Golongan::create([
            'nama_golongan' => $request->nama_golongan,
        ]);

        return redirect()->route('golongan.golongan')->with('success', 'Golongan berhasil ditambahkan');
    }

    public function edit($id)
    {
      // Ambil data golongan berdasarkan ID
      $golongan = Golongan::findOrFail($id);

      // Kirim data golongan ke view edit
      return view('golongan.update', compact('golongan'));
    }

    public function update(Request $request, $id)
    {
      // Validasi input
      $request->validate([
        'nama_golongan' => 'required|max:255|unique:golongan,nama_golongan,' . $id,
      ]);

      // Cari golongan yang akan diupdate
      $golongan = Golongan::findOrFail($id);

      // Update nama golongan
      $golongan->update([
        'nama_golongan' => $request->nama_golongan,
      ]);

      // Redirect dengan pesan sukses
      return redirect()->route('golongan.golongan')->with('success', 'Golongan berhasil diperbarui');
}


    // Menghapus golongan
    public function destroy($id)
    {
        $golongan = Golongan::findOrFail($id);
        $golongan->delete();

        return redirect()->route('golongan.golongan')->with('success', 'Golongan berhasil dihapus');
    }
}
