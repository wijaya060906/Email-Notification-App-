<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;

    protected $table = 'golongan';

    // Kolom yang bisa diisi
    protected $fillable = ['nama_golongan'];

    // Relasi ke Karyawan (One-to-Many)
    public function karyawan()
    {
        return $this->hasMany(Karyawan::class, 'golongan_id');
    }
}
