<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\bayarZakat;

class LaporanPengumpulan extends Model
{
    use HasFactory;
    
    /**
     * Get total number of muzakki
     */
    public static function getTotalMuzakki()
    {
        return bayarZakat::distinct('nama_kk')->count('nama_kk');
    }
    
    /**
     * Get total number of jiwa/tanggungan
     */
    public static function getTotalJiwa()
    {
        return bayarZakat::sum('jumlah_tanggungan_dibayar');
    }
    
    /**
     * Get total amount of rice collected
     */
    public static function getTotalBeras()
    {
        return bayarZakat::where('jenis_bayar', 'beras')->sum('bayar_beras');
    }
    
    /**
     * Get total amount of money collected
     */
    public static function getTotalUang()
    {
        return bayarZakat::where('jenis_bayar', 'uang')->sum('bayar_uang');
    }
}
