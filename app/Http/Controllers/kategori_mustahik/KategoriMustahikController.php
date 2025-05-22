<?php

namespace App\Http\Controllers\kategori_mustahik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kategoriMustahik;

class KategoriMustahikController extends Controller
{
    public function index()
    {
        $allKategoriMustahik = kategoriMustahik::all();

        return view('kategori_mustahik.index',compact('allKategoriMustahik'));
    }

    public function create()
    {
        return view('kategori_mustahik.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'jumlah_hak' => 'required|string'
        ]);
        // Store the validated data in the database
        kategoriMustahik::create($validatedData);
        return redirect()->route('kategori_mustahik.index')->with('success', 'Kategori Mustahik created successfully.');
    }

    public function show(kategoriMustahik $kategoriMustahik)
    {
        // Show the details of the kategori mustahik
        $kategoriMustahik = kategoriMustahik::findOrFail($kategoriMustahik->id);
        return view('kategori_mustahik.show', compact('kategoriMustahik'));
    }
    public function edit($id)
    {
        // Find the record by ID and return the edit view
        $kategoriMustahik = kategoriMustahik::findOrFail($id);
        return view('kategori_mustahik.edit', compact('kategoriMustahik'));
    }

    public function update(Request $request, kategoriMustahik $kategoriMustahik)
    {
        // Validate and update the record
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'jumlah_hak' => 'required|string'
        ]);
        $kategoriMustahik->update($validatedData);
        return redirect()->route('kategori_mustahik.index')->with('success', 'Kategori Mustahik updated successfully.');
        // Redirect or return a response
    }

    public function destroy(kategoriMustahik $kategoriMustahik)
    {
        // Delete the record
        $kategoriMustahik->delete();
        return redirect()->route('kategori_mustahik.index')->with('success', 'Kategori Mustahik deleted successfully.');
        // Redirect or return a response
    }
}
