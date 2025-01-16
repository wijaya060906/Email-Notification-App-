<?php

namespace Database\Seeders;

use App\Models\Golongan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GolonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Golongan::insert([
            ['nama_golongan' => 'Pemula'],
            ['nama_golongan' => 'Menengah'],
            ['nama_golongan' => 'Expert'],
        ]);
    }
}
