<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class LaporanDistribusi extends Model
{
    use HasFactory;
    
    /**
     * Get data for zakat collection report
     * 
     * @return array
     */
    public static function getLaporanPengumpulan()
    {
        // Total Muzakki
        $totalMuzakki = DB::table('muzakki')->count();
        
        // Total Jiwa (summing jumlah_tanggungan from muzakki table)
        $totalJiwa = DB::table('muzakki')
            ->sum(DB::raw('CAST(jumlah_tanggungan AS UNSIGNED)'));
        
        // Total Beras collected from bayar_zakat table
        $totalBeras = DB::table('bayar_zakat')
            ->whereNotNull('bayar_beras')
            ->sum('bayar_beras');
            
        // Total Uang collected from bayar_zakat table
        $totalUang = DB::table('bayar_zakat')
            ->whereNotNull('bayar_uang')
            ->sum('bayar_uang');
            
        return [
            'total_muzakki' => $totalMuzakki,
            'total_jiwa' => $totalJiwa,
            'total_beras' => $totalBeras ?? 0,
            'total_uang' => $totalUang ?? 0
        ];
    }
    
    /**
     * Get data for warga mustahik distribution by category (actual distribution from distribusi_zakat)
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getDistribusiWarga()
    {
        // Get all categories first
        $categories = DB::table('kategori_mustahik')
            ->select('id', 'nama_kategori', 'jumlah_hak')
            ->get()
            ->keyBy('nama_kategori');
        
        // Get actual distribution data for 'warga' type from distribusi_zakat table
        $actualDistribution = DB::table('distribusi_zakat')
            ->join('mustahik_warga', 'distribusi_zakat.nama_mustahik', '=', 'mustahik_warga.nama_mustahik')
            ->where('distribusi_zakat.jenis_zakat', 'warga')
            ->select(
                'mustahik_warga.kategori_mustahik',
                DB::raw('COUNT(DISTINCT distribusi_zakat.nama_mustahik) as jumlah_kk'),
                DB::raw('COALESCE(SUM(distribusi_zakat.jumlah_beras), 0) as total_beras_terdistribusi')
            )
            ->groupBy('mustahik_warga.kategori_mustahik')
            ->get()
            ->keyBy('kategori_mustahik');
        
        // Combine category data with actual distribution
        $result = collect();
        foreach ($categories as $categoryName => $category) {
            $distribution = $actualDistribution->get($categoryName);
            
            $result->push((object)[
                'id' => $category->id,
                'nama_kategori' => $category->nama_kategori,
                'jumlah_hak' => $category->jumlah_hak,
                'jumlah_kk' => $distribution ? $distribution->jumlah_kk : 0,
                'total_beras' => $distribution ? $distribution->total_beras_terdistribusi : 0
            ]);
        }
        
        return $result;
    }
    
    /**
     * Get data for other mustahik distribution by category (actual distribution from distribusi_zakat)
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getDistribusiLainnya()
    {
        // Get all categories first
        $categories = DB::table('kategori_mustahik')
            ->select('id', 'nama_kategori', 'jumlah_hak')
            ->get()
            ->keyBy('nama_kategori');
        
        // Get actual distribution data for 'mustahik' type from distribusi_zakat table
        $actualDistribution = DB::table('distribusi_zakat')
            ->join('mustahik_lainnya', 'distribusi_zakat.nama_mustahik', '=', 'mustahik_lainnya.nama_mustahik')
            ->where('distribusi_zakat.jenis_zakat', 'mustahik')
            ->select(
                'mustahik_lainnya.kategori_mustahik',
                DB::raw('COUNT(DISTINCT distribusi_zakat.nama_mustahik) as jumlah_kk'),
                DB::raw('COALESCE(SUM(distribusi_zakat.jumlah_beras), 0) as total_beras_terdistribusi')
            )
            ->groupBy('mustahik_lainnya.kategori_mustahik')
            ->get()
            ->keyBy('kategori_mustahik');
        
        // Combine category data with actual distribution
        $result = collect();
        foreach ($categories as $categoryName => $category) {
            $distribution = $actualDistribution->get($categoryName);
            
            $result->push((object)[
                'id' => $category->id,
                'nama_kategori' => $category->nama_kategori,
                'jumlah_hak' => $category->jumlah_hak,
                'jumlah_kk' => $distribution ? $distribution->jumlah_kk : 0,
                'total_beras' => $distribution ? $distribution->total_beras_terdistribusi : 0
            ]);
        }
        
        return $result;
    }
    
    /**
     * Get total distribution per category for both warga and lainnya (from actual distribution records)
     * 
     * @return array
     */
    public static function getTotalDistribusiPerCategory()
    {
        // Get distribution data directly from distribusi_zakat table grouped by category
        $totalDistribution = DB::table('distribusi_zakat as dz')
            ->leftJoin('mustahik_warga as mw', function($join) {
                $join->on('dz.nama_mustahik', '=', 'mw.nama_mustahik')
                     ->where('dz.jenis_zakat', '=', 'warga');
            })
            ->leftJoin('mustahik_lainnya as ml', function($join) {
                $join->on('dz.nama_mustahik', '=', 'ml.nama_mustahik')
                     ->where('dz.jenis_zakat', '=', 'mustahik');
            })
            ->select(
                DB::raw('COALESCE(mw.kategori_mustahik, ml.kategori_mustahik) as kategori'),
                DB::raw('COUNT(DISTINCT dz.nama_mustahik) as jumlah_kk'),
                DB::raw('COALESCE(SUM(dz.jumlah_beras), 0) as total_beras'),
                DB::raw('COALESCE(SUM(dz.jumlah_uang), 0) as total_uang')
            )
            ->whereNotNull(DB::raw('COALESCE(mw.kategori_mustahik, ml.kategori_mustahik)'))
            ->groupBy(DB::raw('COALESCE(mw.kategori_mustahik, ml.kategori_mustahik)'))
            ->get();

        return $totalDistribution->map(function($item) {
            return [
                'kategori' => $item->kategori,
                'jumlah_kk' => (int) $item->jumlah_kk,
                'total_beras' => (int) $item->total_beras,
                'total_uang' => (int) $item->total_uang
            ];
        })->toArray();
    }
    
    /**
     * Get data from distribusi_zakat table (actual distribution records)
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getDistribusiZakat()
    {
        return DB::table('distribusi_zakat')
            ->select(
                'nama_mustahik',
                'jenis_zakat',
                'jumlah_beras',
                'jumlah_uang',
                'created_at'
            )
            ->orderBy('created_at', 'desc')
            ->get();
    }
    
    /**
     * Get summary from actual collection data (not from jumlah_zakat table)
     * 
     * @return array
     */
    public static function getJumlahZakat()
    {
        $pengumpulan = self::getLaporanPengumpulan();
        return [
            'total_beras' => $pengumpulan['total_beras'],
            'total_uang' => $pengumpulan['total_uang']
        ];
    }
    
    /**
     * Get remaining zakat after distribution (based on actual distribution records)
     * 
     * @return array
     */
    public static function getSisaZakat()
    {
        $pengumpulan = self::getLaporanPengumpulan();
        
        // Get total actual distribution from distribusi_zakat table
        $actualDistribution = DB::table('distribusi_zakat')
            ->select(
                DB::raw('COALESCE(SUM(jumlah_beras), 0) as total_distribusi_beras'),
                DB::raw('COALESCE(SUM(jumlah_uang), 0) as total_distribusi_uang')
            )
            ->first();

        return [
            'total_distribusi_beras' => (int) $actualDistribution->total_distribusi_beras,
            'total_distribusi_uang' => (int) $actualDistribution->total_distribusi_uang,
            'sisa_beras' => $pengumpulan['total_beras'] - (int) $actualDistribution->total_distribusi_beras,
            'sisa_uang' => $pengumpulan['total_uang'] - (int) $actualDistribution->total_distribusi_uang
        ];
    }
}