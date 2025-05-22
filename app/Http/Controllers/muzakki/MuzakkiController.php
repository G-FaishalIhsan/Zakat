<?php

namespace App\Http\Controllers\muzakki;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\muzakki;

class MuzakkiController extends Controller
{
    public function index()
    {
        $allMuzakki = muzakki::all();
        return view('muzakki.index', compact('allMuzakki'));
    }

    public function create()
    {
        return view('muzakki.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_muzakki' => 'required|string|max:255',
            'jumlah_tanggungan' => 'required|string|max:255',
            'alamat' => 'required|string|max:15',
            'handphone' => 'required|string|max:255',
            'nomor_kk' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255'
        ]);
        // Store the validated data in the database
        muzakki::create($validatedData);
        return redirect()->route('muzakki.index')->with('success', 'Kategori Mustahik created successfully.');
    }

    public function show(muzakki $muzakki)
    {
        $muzakki = muzakki::findOrFail($muzakki->id);
        return view('muzakki.show', compact('muzakki'));
    }
    public function edit($id)
    {
        // Find the record by ID and return the edit view
        $muzakki = muzakki::findOrFail($id);
        return view('muzakki.edit', compact('muzakki'));
    }

    public function update(Request $request, muzakki $muzakki)
    {
        // Validate and update the record
        $validatedData = $request->validate([
            'nama_muzakki' => 'required|string|max:255',
            'jumlah_tanggungan' => 'required|string|max:255',
            'alamat' => 'required|string|max:15',
            'handphone' => 'required|string|max:255',
            'nomor_kk' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255'
        ]);
        $muzakki->update($validatedData);
        return redirect()->route('muzakki.index')->with('success', 'Kategori Mustahik updated successfully.');
        // Redirect or return a response
    }

    public function destroy(muzakki $muzakki)
    {
        // Delete the record
        $muzakki->delete();
        return redirect()->route('muzakki.index')->with('success', 'Kategori Mustahik deleted successfully.');
        // Redirect or return a response
    }
}
