<?php

namespace App\Http\Controllers;

use App\Mail\NotifikasiKaryawan;
use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class KaryawanController extends Controller
{
    // Fungsi untuk mengirim notifikasi kenaikan gaji
    public function notifyGaji($id)
    {
        $karyawan = Karyawan::find($id);

        if ($karyawan) {
            $subject = "Notifikasi Gaji";
            $message = "Halo {$karyawan->nama}, gaji Anda telah dikirim. Terima kasih.";

            Mail::to($karyawan->email)->send(new NotifikasiKaryawan($subject, $message));

            return redirect()->back()->with('success', 'Notifikasi gaji telah dikirim.');
        }

        return redirect()->back()->with('error', 'Karyawan tidak ditemukan.');
    }

    public function notifyPangkat($id)
    {
        $karyawan = Karyawan::find($id);

        if ($karyawan) {
            $subject = "Notifikasi Pangkat";
            $message = "Halo {$karyawan->nama}, Anda telah dipromosikan ke pangkat baru. Selamat!";

            Mail::to($karyawan->email)->send(new NotifikasiKaryawan($subject, $message));

            return redirect()->back()->with('success', 'Notifikasi pangkat telah dikirim.');
        }

        return redirect()->back()->with('error', 'Karyawan tidak ditemukan.');
    }

    

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|unique:karyawan,nip',
            'jabatan_id' => 'required|exists:jabatan,id',
            'golongan_id' => 'required|exists:golongan,id',
            'kenaikan_pangkat_terakhir' => 'required|date',
            'kenaikan_gaji_berkala' => 'required|date',
            'batas_usia_pensiun' => 'required|date',
            'email' => 'required|email|unique:karyawan,email',
            'tanggal_lahir' => 'required|date',
            'gaji' => 'required|numeric',
        ]);

        // Hitung tanggal kenaikan pangkat dan gaji selanjutnya
        $tanggalKenaikanPangkat = date('Y-m-d', strtotime($request->kenaikan_pangkat_terakhir . ' +4 days'));
        $tanggalKenaikanGaji = date('Y-m-d', strtotime($request->kenaikan_gaji_berkala . ' +4 days'));

        // Simpan data karyawan
        $karyawan = Karyawan::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'jabatan_id' => $request->jabatan_id,
            'golongan_id' => $request->golongan_id,
            'kenaikan_pangkat_terakhir' => $request->kenaikan_pangkat_terakhir,
            'kenaikan_gaji_berkala' => $request->kenaikan_gaji_berkala,
            'tanggal_kenaikan_pangkat' => $tanggalKenaikanPangkat,
            'tanggal_kenaikan_gaji' => $tanggalKenaikanGaji,
            'batas_usia_pensiun' => $request->batas_usia_pensiun,
            'email' => $request->email,
            'tanggal_lahir' => $request->tanggal_lahir,
            'gaji' => $request->gaji,
            'status' => 'Belum',
        ]);

        // Kirim email "Selamat Datang"
        if ($karyawan->email) {
            $subject = "Selamat Datang di Perusahaan Yusan";
            $message = "Halo {$karyawan->nama},\n\nSelamat datang di perusahaan Yusan dan selamat bekerja. Anda akan menerima notifikasi kenaikan pangkat maupun kenaikan gaji di sini, jadi pantau terus ya.\n\nTerima kasih.";

            try {
                Mail::to($karyawan->email)->send(new NotifikasiKaryawan($subject, $message));
                return redirect()->route('karyawan.karyawan')->with('success', 'Data karyawan berhasil ditambahkan dan email telah dikirim.');
            } catch (\Exception $e) {
                return redirect()->route('karyawan.karyawan')->with('warning', 'Data karyawan berhasil ditambahkan, tetapi email gagal dikirim.');
            }
        }

        return redirect()->route('karyawan.karyawan')->with('error', 'Email karyawan tidak ditemukan.');
    }


    public function edit($id)
    {
    $karyawan = Karyawan::findOrFail($id);
    $jabatans = Jabatan::all();
    $golongans = Golongan::all();

    return view('karyawan.update', compact('karyawan', 'jabatans', 'golongans'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'nip' => 'required|string|max:255',
        'email' => 'required|email',
        'tanggal_lahir' => 'required|date',
        'jabatan_id' => 'required|exists:jabatan,id',
        'golongan_id' => 'required|exists:golongan,id',
        'kenaikan_pangkat_terakhir' => 'required|date',
        'kenaikan_gaji_berkala' => 'required|date',
        'batas_usia_pensiun' => 'required|date',
        'gaji' => 'required|numeric',
    ]);

    $karyawan = Karyawan::findOrFail($id);
    $data = $request->all();
    $data['gaji'] = number_format($request->gaji, 0, ',', '.');

    $karyawan->update($data);

    return redirect()->route('karyawan.karyawan')->with('success', 'Data Karyawan berhasil diperbarui!');
}

    public function destroy($id)
    {
      $karyawan = Karyawan::findOrFail($id);
      $karyawan->delete();

      return redirect()->route('karyawan.karyawan')->with('success', 'Data karyawan berhasil dihapus.');
    }

    public function index(Request $request)
{
    $query = Karyawan::query();

    // Check if search keyword is provided
    if ($request->has('search') && $request->search != '') {
        $search = $request->search;

        // Search by name or NIP
        $query->where('nama', 'LIKE', '%' . $search . '%')
              ->orWhere('nip', 'LIKE', '%' . $search . '%');
    }

    // Retrieve the filtered data with pagination
    $karyawans = $query->with(['jabatan', 'golongan'])->paginate(10);

    return redirect()->route('karyawan.karyawan', compact('karyawans'));
}



}
