@extends('layouts.app')

@section('title', 'Laporan Pengumpulan Zakat Fitrah')

@section('content')
<div class="card">
    <h5 class="card-header">Laporan Pengumpulan Zakat Fitrah</h5>
    
    <div class="card-body">
        <div class="d-flex justify-content-between mb-3">
            <div>
                <h6>Rekapitulasi Pengumpulan Zakat Fitrah</h6>
                <p class="text-muted small">Data diambil per tanggal {{ date('d-m-Y') }}</p>
            </div>
            <div class="text-end">
                <div class="btn-group" role="group">
                    <a href="{{ route('laporan.pengumpulan.pdf') }}" class="btn btn-outline-danger" target="_blank">
                        <i class="bx bxs-file-pdf me-1"></i> Export PDF
                    </a>
                    <a href="{{ route('laporan.pengumpulan.doc') }}" class="btn btn-outline-primary">
                        <i class="bx bxs-file-doc me-1"></i> Export Word
                    </a>
                </div>
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th class="text-center" width="50%">Isi</th>
                        <th class="text-center" width="50%">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <strong>Total Muzakki:</strong> {{ $totalMuzakki }} Keluarga
                        </td>
                        <td>
                            Total Muzakki merupakan jumlah total Muzakki yang mengumpulkan zakat fitrah
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Total Jiwa:</strong> {{ $totalJiwa }} Orang
                        </td>
                        <td>
                            Total Jiwa merupakan jumlah orang/jiwa yang mengumpulkan zakat (diambil dari atribut jumlah_tanggungan pada tabel muzakki)
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Total Beras:</strong> {{ $totalBeras }} Kg
                        </td>
                        <td>
                            Total beras merupakan jumlah total beras yang terkumpul
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Total Uang:</strong> Rp{{ number_format($totalUang, 0, ',', '.') }}
                        </td>
                        <td>
                            Total uang merupakan jumlah total beras yang terkumpul
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection