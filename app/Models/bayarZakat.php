<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bayarZakat extends Model
{
    use HasFactory;
    
    // Nama tabel yang benar sesuai migration
    protected $table = 'bayar_zakat';
    
    // Semua kolom yang dapat diisi massal (mass assignable)
    protected $fillable = [
        'nama_kk',
        'jumlah_tanggungan',
        'jenis_bayar',
        'jumlah_tanggungan_dibayar',
        'bayar_beras',
        'bayar_uang'
    ];
    
    // Pastikan tipe data yang benar untuk kolom-kolom tertentu
    protected $casts = [
        'jumlah_tanggungan' => 'integer',
        'jumlah_tanggungan_dibayar' => 'integer',
        'bayar_beras' => 'integer',
        'bayar_uang' => 'integer',
    ];
    
    // Relasi dengan model Muzakki jika diperlukan
    public function muzakki()
    {
        return $this->belongsTo(muzakki::class, 'nama_kk', 'nama_kk');
    }
}