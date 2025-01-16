<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';

    // Kolom yang bisa diisi
    protected $fillable = [
        'nama',
        'nip',
        'jabatan_id',
        'golongan_id',
        'tanggal_kenaikan_pangkat',
        'tanggal_kenaikan_gaji',
        'kenaikan_pangkat_terakhir',
        'kenaikan_gaji_berkala',
        'batas_usia_pensiun',
        'email',
        'tanggal_lahir',
        'status',
        'gaji',   
    ];

    // Relasi ke Jabatan (Many-to-One)
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }

    // Relasi ke Golongan (Many-to-One)
    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'golongan_id');
    }

    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // Scope untuk filter berdasarkan gaji lebih besar dari nilai tertentu
    public function scopeGajiLebihDari($query, $amount)
    {
        return $query->where('gaji', '>', $amount);
    }
}
