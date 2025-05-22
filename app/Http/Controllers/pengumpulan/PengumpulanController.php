<?php

namespace App\Http\Controllers\pengumpulan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\muzakki; // Pastikan Anda memiliki model Muzakki
use App\Models\mustahik;
use App\Models\bayarZakat; // Pastikan Anda memiliki model BayarZakat
use Illuminate\Support\Facades\Log;

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use Barryvdh\DomPDF\Facade\Pdf;


class PengumpulanController extends Controller
{
    public function index()
    {
        $bayarZakatList = bayarZakat::all();
        return view('pengumpulan.index', compact('bayarZakatList'));
    }

    public function create()
    {
        $muzakkiList = muzakki::all();
        return view('pengumpulan.create', compact('muzakkiList'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama_kk' => 'required|string',
                'jenis_bayar' => 'required|in:beras,uang',
                'jumlah_tanggungan' => 'required|integer|min:1',
                'jumlah_tanggungan_dibayar' => 'required|integer|min:1|lte:jumlah_tanggungan',
                'bayar_beras' => 'required_if:jenis_bayar,beras|nullable|numeric|min:2.5',
                'bayar_uang' => 'required_if:jenis_bayar,uang|nullable|numeric|min:35000'
            ], [
                'jumlah_tanggungan_dibayar.lte' => 'Jumlah tanggungan yang dibayar tidak boleh melebihi jumlah tanggungan',
                'bayar_beras.min' => 'Minimal pembayaran beras adalah 2.5 kg',
                'bayar_uang.min' => 'Minimal pembayaran uang adalah Rp35,000'
            ]);

            // Konversi nilai decimal untuk beras
            $bayarBeras = null;
            $bayarUang = null;

            if ($request->jenis_bayar == 'beras') {
                // Konversi ke gram dan simpan sebagai integer
                $bayarBeras = (float)$request->bayar_beras;
            } else if ($request->jenis_bayar == 'uang') {
                $bayarUang = (int)$request->bayar_uang;
            }

            $bayarZakat = bayarZakat::create([
                'nama_kk' => $request->nama_kk,
                'jumlah_tanggungan' => (int)$request->jumlah_tanggungan,
                'jenis_bayar' => $request->jenis_bayar,
                'jumlah_tanggungan_dibayar' => (int)$request->jumlah_tanggungan_dibayar,
                'bayar_beras' => $bayarBeras,
                'bayar_uang' => $bayarUang
            ]);

            return redirect()->route('pengumpulan.index')
                ->with('success', 'Pembayaran zakat berhasil disimpan!');
        } catch (\Exception $e) {
            // Log error untuk debugging
            Log::error('Error saat menyimpan pembayaran zakat: ' . $e->getMessage());

            return back()->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $bayarZakat = bayarZakat::findOrFail($id);
        return view('pengumpulan.show', compact('bayarZakat'));
    }

    public function edit($id)
    {
        $bayarZakat = bayarZakat::findOrFail($id);
        $muzakkiList = muzakki::all();
        return view('pengumpulan.edit', compact('bayarZakat', 'muzakkiList'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'nama_kk' => 'required|string',
                'jenis_bayar' => 'required|in:beras,uang',
                'jumlah_tanggungan' => 'required|integer|min:1',
                'jumlah_tanggungan_dibayar' => 'required|integer|min:1|lte:jumlah_tanggungan',
                'bayar_beras' => 'required_if:jenis_bayar,beras|nullable|numeric|min:2.5',
                'bayar_uang' => 'required_if:jenis_bayar,uang|nullable|numeric|min:35000'
            ], [
                'jumlah_tanggungan_dibayar.lte' => 'Jumlah tanggungan yang dibayar tidak boleh melebihi jumlah tanggungan',
                'bayar_beras.min' => 'Minimal pembayaran beras adalah 2.5 kg',
                'bayar_uang.min' => 'Minimal pembayaran uang adalah Rp35,000'
            ]);

            $bayarZakat = bayarZakat::findOrFail($id);

            $bayarBeras = null;
            $bayarUang = null;

            if ($request->jenis_bayar == 'beras') {
                // Konversi ke gram dan simpan sebagai integer
                $bayarBeras = (float)$request->bayar_beras;
            } else if ($request->jenis_bayar == 'uang') {
                $bayarUang = (int)$request->bayar_uang;
            }

            $bayarZakat->update([
                'nama_kk' => $request->nama_kk,
                'jumlah_tanggungan' => (int)$request->jumlah_tanggungan,
                'jenis_bayar' => $request->jenis_bayar,
                'jumlah_tanggungan_dibayar' => (int)$request->jumlah_tanggungan_dibayar,
                'bayar_beras' => $bayarBeras,
                'bayar_uang' => $bayarUang
            ]);

            return redirect()->route('pengumpulan.index')
                ->with('success', 'Pembayaran zakat berhasil diperbarui!');
        } catch (\Exception $e) {
            // Log error untuk debugging
            Log::error('Error saat memperbarui pembayaran zakat: ' . $e->getMessage());

            return back()->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $bayarZakat = bayarZakat::findOrFail($id);
            $bayarZakat->delete();

            return redirect()->route('pengumpulan.index')
                ->with('success', 'Pembayaran zakat berhasil dihapus!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    public function getMuzakki($nama_kk)
    {
        $muzakki = muzakki::where('nama_kk', $nama_kk)->first();

        if (!$muzakki) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        return response()->json([
            'jumlah_tanggungan' => $muzakki->jumlah_tanggungan
        ]);
    }

    public function laporan()
    {
        // Mengambil data untuk laporan
        $totalMuzakki = muzakki::count();
        $totalJiwa = muzakki::sum('jumlah_tanggungan');
        
        // Perbaikan: Memastikan nilai-nilai numerik
        $totalBeras = (float) bayarZakat::where('jenis_bayar', 'beras')->sum('bayar_beras');
        $totalUang = (int) bayarZakat::where('jenis_bayar', 'uang')->sum('bayar_uang');
        
        return view('pengumpulan.laporan', compact('totalMuzakki', 'totalJiwa', 'totalBeras', 'totalUang'));
    }

    public function exportPDF()
    {
        // Mengambil data untuk laporan
        $data = [
            'totalMuzakki' => muzakki::count(),
            'totalJiwa' => muzakki::sum('jumlah_tanggungan'),
            'totalBeras' => (float) bayarZakat::where('jenis_bayar', 'beras')->sum('bayar_beras'),
            'totalUang' => (int) bayarZakat::where('jenis_bayar', 'uang')->sum('bayar_uang'),
        ];

        $pdf = PDF::loadView('pengumpulan.export_pdf', $data);
        return $pdf->download('laporan_pengumpulan_zakat.pdf');
    }

    public function exportWord()
    {
        $totalMuzakki = muzakki::count();
        $totalJiwa = muzakki::sum('jumlah_tanggungan');
        $totalBeras = (float) bayarZakat::where('jenis_bayar', 'beras')->sum('bayar_beras');
        $totalUang = (int) bayarZakat::where('jenis_bayar', 'uang')->sum('bayar_uang');

        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        // Styling
        $titleStyle = ['bold' => true, 'size' => 16, 'name' => 'Arial'];
        $headerStyle = ['bold' => true, 'size' => 12, 'name' => 'Arial'];
        $contentStyle = ['size' => 12, 'name' => 'Arial'];

        // Judul
        $section->addText("Laporan Pengumpulan Zakat Fitrah", $titleStyle);
        $section->addTextBreak(1);

        // Tanggal
        $section->addText("Tanggal: " . date('d-m-Y'), $contentStyle);
        $section->addTextBreak(1);

        // Tabel data
        $table = $section->addTable(['borderSize' => 1, 'borderColor' => '000000', 'width' => 100 * 50]);
        
        // Row 1
        $table->addRow();
        $table->addCell(5000)->addText("Total Muzakki", $headerStyle);
        $table->addCell(5000)->addText($totalMuzakki . " orang", $contentStyle);
        
        // Row 2
        $table->addRow();
        $table->addCell(5000)->addText("Total Jiwa", $headerStyle);
        $table->addCell(5000)->addText($totalJiwa . " jiwa", $contentStyle);
        
        // Row 3
        $table->addRow();
        $table->addCell(5000)->addText("Total Beras", $headerStyle);
        $table->addCell(5000)->addText($totalBeras . " kg", $contentStyle);
        
        // Row 4
        $table->addRow();
        $table->addCell(5000)->addText("Total Uang", $headerStyle);
        $table->addCell(5000)->addText("Rp " . number_format($totalUang, 0, ',', '.'), $contentStyle);

        $section->addTextBreak(2);
        $section->addText("Dicetak pada: " . date('d-m-Y H:i:s'), $contentStyle);

        // Save file
        $fileName = 'laporan_pengumpulan_zakat.docx';
        $tempFile = storage_path($fileName);
        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($tempFile);

        return response()->download($tempFile)->deleteFileAfterSend(true);
    }
}