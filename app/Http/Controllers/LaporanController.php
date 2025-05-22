<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bayarZakat;
use App\Models\kategoriMustahik;
use App\Models\mustahik;
use App\Models\mustahikLainnya;
use App\Models\LaporanPengumpulan;
use App\Models\LaporanDistribusi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Response;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Shared\Converter;

class LaporanController extends Controller
{
    /**
     * Show the pengumpulan zakat report
     */
    public function pengumpulan()
    {
        $data = LaporanDistribusi::getLaporanPengumpulan();
        
        return view('laporan_pengumpulan.pengumpulan', [
            'totalMuzakki' => $data['total_muzakki'],
            'totalJiwa' => $data['total_jiwa'],
            'totalBeras' => $data['total_beras'],
            'totalUang' => $data['total_uang'],
        ]);
    }
    
    /**
     * Export pengumpulan zakat report to PDF
     */
    public function pengumpulanPdf()
    {
        $data = LaporanDistribusi::getLaporanPengumpulan();
        
        $pdf = PDF::loadView('laporan_pengumpulan.pengumpulan_pdf', [
            'totalMuzakki' => $data['total_muzakki'],
            'totalJiwa' => $data['total_jiwa'],
            'totalBeras' => $data['total_beras'],
            'totalUang' => $data['total_uang'],
        ]);
        
        return $pdf->download('laporan-pengumpulan-zakat.pdf');
    }
    
    /**
     * Export pengumpulan zakat report to DOC
     */
    public function pengumpulanDoc()
    {
        $data = LaporanDistribusi::getLaporanPengumpulan();
        
        // Create new Word document
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        
        // Add title
        $section->addText('Laporan Pengumpulan Zakat Fitrah', ['bold' => true, 'size' => 16]);
        $section->addText('Tanggal: ' . date('d-m-Y'), ['size' => 10]);
        $section->addTextBreak(1);
        
        // Create table
        $table = $section->addTable(['borderSize' => 1, 'borderColor' => '000000', 'width' => 100 * 50]);
        
        // Add header row
        $table->addRow();
        $table->addCell(Converter::cmToTwip(5))->addText('Keterangan', ['bold' => true]);
        $table->addCell(Converter::cmToTwip(5))->addText('Nilai', ['bold' => true]);
        
        // Add data rows
        $table->addRow();
        $table->addCell(Converter::cmToTwip(5))->addText('Total Muzakki');
        $table->addCell(Converter::cmToTwip(5))->addText($data['total_muzakki']);
        
        $table->addRow();
        $table->addCell(Converter::cmToTwip(5))->addText('Total Jiwa');
        $table->addCell(Converter::cmToTwip(5))->addText($data['total_jiwa']);
        
        $table->addRow();
        $table->addCell(Converter::cmToTwip(5))->addText('Total Beras');
        $table->addCell(Converter::cmToTwip(5))->addText($data['total_beras'] . ' Kg');
        
        $table->addRow();
        $table->addCell(Converter::cmToTwip(5))->addText('Total Uang');
        $table->addCell(Converter::cmToTwip(5))->addText('Rp ' . number_format($data['total_uang'], 0, ',', '.'));
        
        // Generate doc file
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $fileName = 'laporan-pengumpulan-zakat.docx';
        $tempFile = tempnam(sys_get_temp_dir(), 'PHPWord');
        $objWriter->save($tempFile);
        
        return Response::download($tempFile, $fileName)->deleteFileAfterSend(true);
    }
    
    /**
     * Show the distribusi zakat report
     */
    public function distribusi()
    {
        $distribusiWarga = LaporanDistribusi::getDistribusiWarga();
        $distribusiLainnya = LaporanDistribusi::getDistribusiLainnya();
        $totalDistribusiPerCategory = LaporanDistribusi::getTotalDistribusiPerCategory();
        $sisaZakat = LaporanDistribusi::getSisaZakat();
        $jumlahZakat = LaporanDistribusi::getJumlahZakat();
        
        return view('laporan_distribusi.distribusi', [
            'distribusiWarga' => $distribusiWarga,
            'distribusiLainnya' => $distribusiLainnya,
            'totalDistribusiPerCategory' => $totalDistribusiPerCategory,
            'sisaZakat' => $sisaZakat,
            'jumlahZakat' => $jumlahZakat
        ]);
    }
    
    /**
     * Export distribusi zakat report to PDF
     */
    public function distribusiPdf()
    {
        $distribusiWarga = LaporanDistribusi::getDistribusiWarga();
        $distribusiLainnya = LaporanDistribusi::getDistribusiLainnya();
        $totalDistribusiPerCategory = LaporanDistribusi::getTotalDistribusiPerCategory();
        $sisaZakat = LaporanDistribusi::getSisaZakat();
        $jumlahZakat = LaporanDistribusi::getJumlahZakat();
        
        $pdf = PDF::loadView('laporan_distribusi.distribusi_pdf', [
            'distribusiWarga' => $distribusiWarga,
            'distribusiLainnya' => $distribusiLainnya,
            'totalDistribusiPerCategory' => $totalDistribusiPerCategory,
            'sisaZakat' => $sisaZakat,
            'jumlahZakat' => $jumlahZakat
        ]);
        
        return $pdf->download('laporan-distribusi-zakat.pdf');
    }
    
    /**
     * Export distribusi zakat report to DOC
     */
    public function distribusiDoc()
    {
        $distribusiWarga = LaporanDistribusi::getDistribusiWarga();
        $distribusiLainnya = LaporanDistribusi::getDistribusiLainnya();
        $totalDistribusiPerCategory = LaporanDistribusi::getTotalDistribusiPerCategory();
        $sisaZakat = LaporanDistribusi::getSisaZakat();
        
        // Create new Word document
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        
        // Add title
        $section->addText('Laporan Distribusi Zakat Fitrah', ['bold' => true, 'size' => 16]);
        $section->addText('Tanggal: ' . date('d-m-Y'), ['size' => 10]);
        $section->addTextBreak(1);
        
        // Add summary information
        $section->addText('Ringkasan Distribusi:', ['bold' => true, 'size' => 12]);
        $section->addText('Total Beras Terdistribusi: ' . $sisaZakat['total_distribusi_beras'] . ' Kg');
        $section->addText('Total Uang Terdistribusi: Rp ' . number_format($sisaZakat['total_distribusi_uang'], 0, ',', '.'));
        $section->addText('Sisa Beras: ' . $sisaZakat['sisa_beras'] . ' Kg');
        $section->addText('Sisa Uang: Rp ' . number_format($sisaZakat['sisa_uang'], 0, ',', '.'));
        $section->addTextBreak(1);
        
        // Create table for Warga Mustahik
        $section->addText('A. Distribusi Ke Mustahik Warga', ['bold' => true, 'size' => 14]);
        $table = $section->addTable(['borderSize' => 1, 'borderColor' => '000000', 'width' => 100 * 50]);
        
        // Add header row
        $table->addRow();
        $table->addCell(Converter::cmToTwip(5))->addText('Kategori Mustahik', ['bold' => true]);
        $table->addCell(Converter::cmToTwip(3))->addText('Hak Beras', ['bold' => true]);
        $table->addCell(Converter::cmToTwip(3))->addText('Jumlah KK', ['bold' => true]);
        $table->addCell(Converter::cmToTwip(3))->addText('Total Beras', ['bold' => true]);
        
        // Add data rows for Warga
        if ($distribusiWarga->count() > 0) {
            foreach ($distribusiWarga as $item) {
                $table->addRow();
                $table->addCell(Converter::cmToTwip(5))->addText($item->nama_kategori ?? '-');
                $table->addCell(Converter::cmToTwip(3))->addText(($item->jumlah_hak ?? '2.5') . ' Kg');
                $table->addCell(Converter::cmToTwip(3))->addText($item->jumlah_kk ?? '0');
                $table->addCell(Converter::cmToTwip(3))->addText(($item->total_beras ?? '0') . ' Kg');
            }
        } else {
            $table->addRow();
            $table->addCell(Converter::cmToTwip(14))->addText('Tidak ada data', ['align' => 'center']);
        }
        
        $section->addTextBreak(1);
        
        // Create table for Mustahik Lainnya
        $section->addText('B. Distribusi Ke Mustahik Lainnya', ['bold' => true, 'size' => 14]);
        $table = $section->addTable(['borderSize' => 1, 'borderColor' => '000000', 'width' => 100 * 50]);
        
        // Add header row
        $table->addRow();
        $table->addCell(Converter::cmToTwip(5))->addText('Kategori Mustahik', ['bold' => true]);
        $table->addCell(Converter::cmToTwip(3))->addText('Hak Beras', ['bold' => true]);
        $table->addCell(Converter::cmToTwip(3))->addText('Jumlah KK', ['bold' => true]);
        $table->addCell(Converter::cmToTwip(3))->addText('Total Beras', ['bold' => true]);
        
        // Add data rows for Lainnya
        if ($distribusiLainnya->count() > 0) {
            foreach ($distribusiLainnya as $item) {
                $table->addRow();
                $table->addCell(Converter::cmToTwip(5))->addText($item->nama_kategori ?? '-');
                $table->addCell(Converter::cmToTwip(3))->addText(($item->jumlah_hak ?? '2.5') . ' Kg');
                $table->addCell(Converter::cmToTwip(3))->addText($item->jumlah_kk ?? '0');
                $table->addCell(Converter::cmToTwip(3))->addText(($item->total_beras ?? '0') . ' Kg');
            }
        } else {
            $table->addRow();
            $table->addCell(Converter::cmToTwip(14))->addText('Tidak ada data', ['align' => 'center']);
        }
        
        $section->addTextBreak(1);
        
        // Create table for Total Distribution Per Category
        $section->addText('Total Distribusi Per Kategori', ['bold' => true, 'size' => 14]);
        $table = $section->addTable(['borderSize' => 1, 'borderColor' => '000000', 'width' => 100 * 50]);
        
        // Add header row
        $table->addRow();
        $table->addCell(Converter::cmToTwip(7))->addText('Kategori Mustahik', ['bold' => true]);
        $table->addCell(Converter::cmToTwip(3))->addText('Jumlah KK', ['bold' => true]);
        $table->addCell(Converter::cmToTwip(4))->addText('Total Beras', ['bold' => true]);
        
        // Add data rows for Total Distribution
        if (count($totalDistribusiPerCategory) > 0) {
            foreach ($totalDistribusiPerCategory as $item) {
                $table->addRow();
                $table->addCell(Converter::cmToTwip(7))->addText($item['kategori'] ?? '-');
                $table->addCell(Converter::cmToTwip(3))->addText($item['jumlah_kk'] ?? '0');
                $table->addCell(Converter::cmToTwip(4))->addText(($item['total_beras'] ?? '0') . ' Kg');
            }
        } else {
            $table->addRow();
            $table->addCell(Converter::cmToTwip(14))->addText('Tidak ada data', ['align' => 'center']);
        }
        
        // Generate doc file
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $fileName = 'laporan-distribusi-zakat.docx';
        $tempFile = tempnam(sys_get_temp_dir(), 'PHPWord');
        $objWriter->save($tempFile);
        
        return Response::download($tempFile, $fileName)->deleteFileAfterSend(true);
    }
    
    /**
     * Show detailed distribution records
     */
    public function detailDistribusi()
    {
        $distribusiZakat = LaporanDistribusi::getDistribusiZakat();
        $jumlahZakat = LaporanDistribusi::getJumlahZakat();
        
        return view('laporan_distribusi.detail', [
            'distribusiZakat' => $distribusiZakat,
            'jumlahZakat' => $jumlahZakat
        ]);
    }
}