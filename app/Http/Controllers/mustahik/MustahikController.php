<?php

namespace App\Http\Controllers\mustahik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mustahik;
use App\Models\mustahikLainnya;
use App\Models\kategoriMustahik;

class MustahikController extends Controller
{
    protected $kategoriUtama = ['fakir', 'miskin', 'mampu'];
    public function index()
    {
        $allMustahik = mustahik::all();
        $allMustahikLainnya = mustahikLainnya::all();
        return view('mustahik.index', compact('allMustahik', 'allMustahikLainnya'));
    }

    public function create()
    {
        $allKategori = kategoriMustahik::all();
        return view('mustahik.create', compact('allKategori'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_mustahik' => 'required|string|max:255',
            'kategori_mustahik' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'handphone' => 'required|string|max:255',
            'nomor_kk' => 'required|string|max:255'
        ]);
        // Ambil jumlah_hak dari database berdasarkan kategori
        $kategori = KategoriMustahik::where('nama_kategori', $validatedData['kategori_mustahik'])->first();

        if (!$kategori) {
            return back()->with('error', 'Kategori tidak valid')->withInput();
        }

        // Tambahkan jumlah_hak ke data yang akan disimpan
        $validatedData['jumlah_hak'] = $kategori->jumlah_hak;

        // Simpan ke tabel yang sesuai
        if (in_array(strtolower($validatedData['kategori_mustahik']), ['fakir', 'miskin', 'mampu'])) {
            Mustahik::create($validatedData);
        } else {
            MustahikLainnya::create($validatedData);
        }
        return redirect()->route('mustahik.index')->with('success', 'Kategori Mustahik created successfully.');
    }

    public function show($id)
    {
        $mustahik = Mustahik::find($id) ?? MustahikLainnya::findOrFail($id);
        return view('mustahik.show', compact('mustahik'));
    }
    public function edit($id)
    {
        // Find the record by ID and return the edit view
        $mustahik = Mustahik::find($id);
        $mustahikLainnya = MustahikLainnya::find($id);

        if (!$mustahik && !$mustahikLainnya) {
            abort(404);
        }

        $mustahik = $mustahik ?? $mustahikLainnya;
        $allKategori = KategoriMustahik::all();

        return view('mustahik.edit', compact('mustahik', 'allKategori'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_mustahik' => 'required|string|max:255',
            'kategori_mustahik' => 'required|string|max:255',
            'jumlah_hak' => 'required|numeric',
            'alamat' => 'required|string|max:255',
            'handphone' => 'required|string|max:20',
            'nomor_kk' => 'required|string|max:30'
        ]);

        $kategoriUtama = ['fakir', 'miskin', 'mampu'];
        $kategori = strtolower($validatedData['kategori_mustahik']);

        // Cari data mustahik yang akan diupdate
        $mustahik = Mustahik::find($id);
        $mustahikLainnya = MustahikLainnya::find($id);

        if (in_array($kategori, $kategoriUtama)) {
            // Jika kategori termasuk kategori utama
            if ($mustahikLainnya) {
                // Jika sebelumnya di mustahik_lainnya, hapus dan buat baru di mustahik
                $mustahikLainnya->delete();
                Mustahik::create($validatedData);
            } elseif ($mustahik) {
                // Jika sudah di mustahik, update saja
                $mustahik->update($validatedData);
            }
        } else {
            // Jika kategori bukan kategori utama
            if ($mustahik) {
                // Jika sebelumnya di mustahik, hapus dan buat baru di mustahik_lainnya
                $mustahik->delete();
                MustahikLainnya::create($validatedData);
            } elseif ($mustahikLainnya) {
                // Jika sudah di mustahik_lainnya, update saja
                $mustahikLainnya->update($validatedData);
            }
        }

        return redirect()->route('mustahik.index')->with('success', 'Data mustahik berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Cari data di kedua tabel
        $mustahik = Mustahik::find($id);
        $mustahikLainnya = MustahikLainnya::find($id);

        if ($mustahik) {
            $mustahik->delete();
        } elseif ($mustahikLainnya) {
            $mustahikLainnya->delete();
        } else {
            return redirect()->route('mustahik.index')->with('error', 'Data tidak ditemukan');
        }
        return redirect()->route('mustahik.index')->with('success', 'Mustahik deleted successfully.');
        // Redirect or return a response
    }
}
