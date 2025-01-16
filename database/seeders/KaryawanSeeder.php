<?php

namespace Database\Seeders;

use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jabatan = Jabatan::first(); // Ambil jabatan pertama
        $golongan = Golongan::first(); // Ambil golongan pertama

        Karyawan::create([
            'nama' => 'Yusan Pamungkas',
            'nip' => '123456789',
            'jabatan_id' => $jabatan->id,
            'golongan_id' => $golongan->id,
            'tanggal_kenaikan_pangkat' => '2020-01-01',
            'tanggal_kenaikan_gaji'=> '2020-01-01',
            'kenaikan_pangkat_terakhir' => '2023-01-01',
            'kenaikan_gaji_berkala' => '2024-01-01',
            'batas_usia_pensiun' => '2040-01-01',
            'email' => 'abihhawa@gmail.com',
            'tanggal_lahir' => '1990-01-01',
            'gaji'=>'900000000',
            'status'=>'belum',
        ]);

        Karyawan::create([
            'nama' => 'Yusan Wijaya',
            'nip' => '1234567810',
            'jabatan_id' => $jabatan->id,
            'golongan_id' => $golongan->id,
            'tanggal_kenaikan_pangkat' => '2020-01-01',
            'tanggal_kenaikan_gaji'=> '2020-01-01',
            'kenaikan_pangkat_terakhir' => '2023-01-01',
            'kenaikan_gaji_berkala' => '2024-01-01',
            'batas_usia_pensiun' => '2040-01-01',
            'email' => 'wijayayusan9@gmail.com',
            'tanggal_lahir' => '1990-01-01',
            'gaji'=>'900000000',
            'status'=>'belum',
        ]);

        Karyawan::create([
            'nama' => 'Fathan',
            'nip' => '1234567811',
            'jabatan_id' => $jabatan->id,
            'golongan_id' => $golongan->id,
            'tanggal_kenaikan_pangkat' => '2020-01-01',
            'tanggal_kenaikan_gaji'=> '2020-01-01',
            'kenaikan_pangkat_terakhir' => '2023-01-01',
            'kenaikan_gaji_berkala' => '2024-01-01',
            'batas_usia_pensiun' => '2040-01-01',
            'email' => 'adiyatmazira07@gmail.com',
            'tanggal_lahir' => '1990-01-01',
            'gaji'=>'900000000',
            'status'=>'belum',
        ]);
    }
}
