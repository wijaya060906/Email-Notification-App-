<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nip')->unique();
            $table->foreignId('jabatan_id')->constrained('jabatan')->onDelete('cascade'); // Relasi ke tabel jabatan
            $table->foreignId('golongan_id')->constrained('golongan')->onDelete('cascade'); // Relasi ke tabel golongan
            $table->date('kenaikan_pangkat_terakhir'); // Terakhir naik pangkat
            $table->date('kenaikan_gaji_berkala'); // Terakhir naik gaji
            $table->date('tanggal_kenaikan_pangkat'); // Untuk mengetahui kapan naik pangkat selanjutnya
            $table->date('tanggal_kenaikan_gaji'); // Untuk mengetahui kapan naik gaji selanjutnya
            $table->date('batas_usia_pensiun'); // Batas usia pensiun
            $table->string('email')->unique(); // Email karyawan
            $table->date('tanggal_lahir'); // Tanggal lahir
            $table->enum('status', ['belum', 'terkirim', 'approved'])->default('belum'); // Status karyawan
            $table->decimal('gaji', 15, 2); // Gaji karyawan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};
