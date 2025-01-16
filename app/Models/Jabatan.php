<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = 'jabatan';

    // Kolom yang bisa diisi
    protected $fillable = ['nama_jabatan'];

    // Relasi ke Karyawan (One-to-Many)
    public function karyawan()
    {
        return $this->hasMany(Karyawan::class, 'jabatan_id');
    }
}
