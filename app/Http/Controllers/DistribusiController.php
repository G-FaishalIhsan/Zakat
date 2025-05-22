<?php

namespace App\Http\Controllers;

use App\Models\DistribusiZakat;
use App\Models\ZakatWarga;
use App\Models\Muzakki;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DistribusiWargaController extends Controller
{
    /**
     * Display a listing of the distribution to residents.
     */
    public function index()
    {
        $distribusiList = DistribusiZakat::where('jenis_zakat', 'warga')->get();
        return view('distribusi-warga.index', compact('distribusiList'));
    }

    /**
     * Show the form for creating a new distribution to resident.
     */
    public function create()
    {
        // Get all muzakki data for dropdown
        $mustahikList = ZakatWarga::all();
        
        return view('distribusi-warga.create', compact('mustahikList'));
    }

    /**
     * Store a newly created distribution in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_mustahik' => 'required|string',
            'jenis_bayar' => 'required|in:beras,uang',
            'jumlah_beras' => 'required_if:jenis_bayar,beras|nullable|numeric|min:2.5',
            'jumlah_uang' => 'required_if:jenis_bayar,uang|nullable|numeric|min:35000',
        ]);

        // Check if the resident exists
        $mustahik = ZakatWarga::where('nama_mustahik', $request->nama_mustahik)->first();
        
        if (!$mustahik) {
            return redirect()->back()->with('error', 'Mustahik warga tidak ditemukan');
        }
        
        // Create distribution record
        $distribusi = new DistribusiZakat();
        $distribusi->nama_mustahik = $request->nama_mustahik;
        $distribusi->jenis_zakat = 'warga';
        
        if ($request->jenis_bayar == 'beras') {
            $distribusi->jumlah_beras = $request->jumlah_beras;
        } else {
            $distribusi->jumlah_uang = $request->jumlah_uang;
        }
        
        $distribusi->save();
        
        // Update total in jumlah_zakat table
        $this->updateTotalZakat($request->jenis_bayar, $request->jenis_bayar == 'beras' ? $request->jumlah_beras : 0, $request->jenis_bayar == 'uang' ? $request->jumlah_uang : 0);
        
        return redirect()->route('distribusi-warga.index')
            ->with('success', 'Distribusi zakat berhasil disimpan');
    }

    /**
     * Show the form for editing the specified distribution.
     */
    public function edit($id)
    {
        $distribusi = DistribusiZakat::findOrFail($id);
        $mustahikList = ZakatWarga::all();
        
        return view('distribusi-warga.edit', compact('distribusi', 'mustahikList'));
    }

    /**
     * Update the specified distribution in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_mustahik' => 'required|string',
            'jenis_bayar' => 'required|in:beras,uang',
            'jumlah_beras' => 'required_if:jenis_bayar,beras|nullable|numeric|min:2.5',
            'jumlah_uang' => 'required_if:jenis_bayar,uang|nullable|numeric|min:35000',
        ]);
        
        // Check if the resident exists
        $mustahik = ZakatWarga::where('nama_mustahik', $request->nama_mustahik)->first();
        
        if (!$mustahik) {
            return redirect()->back()->with('error', 'Mustahik warga tidak ditemukan');
        }
        
        // Get old distribution data for updating totals
        $oldDistribusi = DistribusiZakat::findOrFail($id);
        $oldJenisBayar = $oldDistribusi->jumlah_beras > 0 ? 'beras' : 'uang';
        $oldJumlahBeras = $oldDistribusi->jumlah_beras ?? 0;
        $oldJumlahUang = $oldDistribusi->jumlah_uang ?? 0;
        
        // Update distribution record
        $distribusi = DistribusiZakat::findOrFail($id);
        $distribusi->nama_mustahik = $request->nama_mustahik;
        
        if ($request->jenis_bayar == 'beras') {
            $distribusi->jumlah_beras = $request->jumlah_beras;
            $distribusi->jumlah_uang = null;
        } else {
            $distribusi->jumlah_uang = $request->jumlah_uang;
            $distribusi->jumlah_beras = null;
        }
        
        $distribusi->save();
        
        // Update totals in jumlah_zakat table
        $this->updateTotalZakatAfterEdit($oldJenisBayar, $request->jenis_bayar, $oldJumlahBeras, $request->jenis_bayar == 'beras' ? $request->jumlah_beras : 0, $oldJumlahUang, $request->jenis_bayar == 'uang' ? $request->jumlah_uang : 0);
        
        return redirect()->route('distribusi-warga.index')
            ->with('success', 'Distribusi zakat berhasil diperbarui');
    }

    /**
     * Remove the specified distribution from storage.
     */
    public function destroy($id)
    {
        $distribusi = DistribusiZakat::findOrFail($id);
        
        // Determine type and amount for updating totals
        $jenisBayar = $distribusi->jumlah_beras > 0 ? 'beras' : 'uang';
        $jumlahBeras = $distribusi->jumlah_beras ?? 0;
        $jumlahUang = $distribusi->jumlah_uang ?? 0;
        
        // Delete the record
        $distribusi->delete();
        
        // Update total in jumlah_zakat table (subtract values)
        $this->updateTotalZakat($jenisBayar, -$jumlahBeras, -$jumlahUang);
        
        return redirect()->route('distribusi-warga.index')
            ->with('success', 'Distribusi zakat berhasil dihapus');
    }
    
    /**
     * Update total zakat values in jumlah_zakat table
     */
    private function updateTotalZakat($jenisBayar, $jumlahBeras, $jumlahUang)
    {
        $jumlahZakat = DB::table('jumlah_zakat')->first();
        
        if (!$jumlahZakat) {
            // Create new record if it doesn't exist
            DB::table('jumlah_zakat')->insert([
                'total_distribusi' => 1,
                'jumlah_beras' => $jenisBayar == 'beras' ? $jumlahBeras : 0,
                'jumlah_uang' => $jenisBayar == 'uang' ? $jumlahUang : 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            // Update existing record
            DB::table('jumlah_zakat')->update([
                'total_distribusi' => DB::raw('total_distribusi + 1'),
                'jumlah_beras' => DB::raw('jumlah_beras + ' . ($jenisBayar == 'beras' ? $jumlahBeras : 0)),
                'jumlah_uang' => DB::raw('jumlah_uang + ' . ($jenisBayar == 'uang' ? $jumlahUang : 0)),
                'updated_at' => now(),
            ]);
        }
    }
    
    /**
     * Update total zakat values in jumlah_zakat table after edit
     */
    private function updateTotalZakatAfterEdit($oldJenisBayar, $newJenisBayar, $oldJumlahBeras, $newJumlahBeras, $oldJumlahUang, $newJumlahUang)
    {
        $jumlahZakat = DB::table('jumlah_zakat')->first();
        
        if (!$jumlahZakat) {
            // Create new record if it doesn't exist
            DB::table('jumlah_zakat')->insert([
                'total_distribusi' => 1,
                'jumlah_beras' => $newJenisBayar == 'beras' ? $newJumlahBeras : 0,
                'jumlah_uang' => $newJenisBayar == 'uang' ? $newJumlahUang : 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            // Calculate difference
            $berasDiff = $newJenisBayar == 'beras' ? $newJumlahBeras : 0;
            $berasDiff -= $oldJenisBayar == 'beras' ? $oldJumlahBeras : 0;
            
            $uangDiff = $newJenisBayar == 'uang' ? $newJumlahUang : 0;
            $uangDiff -= $oldJenisBayar == 'uang' ? $oldJumlahUang : 0;
            
            // Update existing record
            DB::table('jumlah_zakat')->update([
                'jumlah_beras' => DB::raw('jumlah_beras + ' . $berasDiff),
                'jumlah_uang' => DB::raw('jumlah_uang + ' . $uangDiff),
                'updated_at' => now(),
            ]);
        }
    }
}