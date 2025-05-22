@extends('layouts.app')

@section('title', 'Laporan Distribusi Zakat Fitrah')

@section('content')
<div class="card">
    <h5 class="card-header">Laporan Distribusi Zakat Fitrah</h5>
    
    <div class="card-body">
        <div class="d-flex justify-content-between mb-3">
            <div>
                <h6>Rekapitulasi Distribusi Zakat Fitrah</h6>
                <p class="text-muted small">Data diambil per tanggal {{ date('d-m-Y') }}</p>
            </div>
            <div class="text-end">
                <div class="btn-group" role="group">
                    <a href="{{ route('laporan.distribusi.pdf') }}" class="btn btn-outline-danger" target="_blank">
                        <i class="bx bxs-file-pdf me-1"></i> Export PDF
                    </a>
                    <a href="{{ route('laporan.distribusi.doc') }}" class="btn btn-outline-primary">
                        <i class="bx bxs-file-doc me-1"></i> Export Word
                    </a>
                </div>
            </div>
        </div>

        <!-- Summary Card -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card bg-light">
                    <div class="card-body">
                        <h6 class="card-title">Ringkasan Distribusi</h6>
                        <p class="mb-1"><strong>Total Beras Terdistribusi:</strong> {{ $sisaZakat['total_distribusi_beras'] }} Kg</p>
                        <p class="mb-1"><strong>Total Uang Terdistribusi:</strong> Rp {{ number_format($sisaZakat['total_distribusi_uang'], 0, ',', '.') }}</p>
                        <p class="mb-1"><strong>Sisa Beras:</strong> {{ $sisaZakat['sisa_beras'] }} Kg</p>
                        <p class="mb-0"><strong>Sisa Uang:</strong> Rp {{ number_format($sisaZakat['sisa_uang'], 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-light">
                    <div class="card-body">
                        <h6 class="card-title">Total Pengumpulan</h6>
                        <p class="mb-1"><strong>Total Beras Dikumpulkan:</strong> {{ $jumlahZakat['total_beras'] }} Kg</p>
                        <p class="mb-0"><strong>Total Uang Dikumpulkan:</strong> Rp {{ number_format($jumlahZakat['total_uang'], 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Section A: Distribusi Ke Mustahik Warga -->
        <h6 class="fw-bold mb-3">A. Distribusi Ke Mustahik Warga</h6>
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Kategori Mustahik</th>
                        <th>Hak Per KK</th>
                        <th>Jumlah KK Terdistribusi</th>
                        <th>Total Beras Terdistribusi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($distribusiWarga as $item)
                    <tr>
                        <td>{{ $item->nama_kategori ?? '-' }}</td>
                        <td>{{ $item->jumlah_hak ?? '2.5' }} Kg</td>
                        <td>{{ $item->jumlah_kk ?? '0' }}</td>
                        <td>{{ $item->total_beras ?? '0' }} Kg</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data distribusi</td>
                    </tr>
                    @endforelse
                    <tr class="table-secondary fw-bold">
                        <td colspan="2">Sub Total Warga</td>
                        <td>{{ $distribusiWarga->sum('jumlah_kk') }}</td>
                        <td>{{ $distribusiWarga->sum('total_beras') }} Kg</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Section B: Distribusi Ke Mustahik Lainnya -->
        <h6 class="fw-bold mb-3">B. Distribusi Ke Mustahik Lainnya</h6>
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Kategori Mustahik</th>
                        <th>Hak Per KK</th>
                        <th>Jumlah KK Terdistribusi</th>
                        <th>Total Beras Terdistribusi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($distribusiLainnya as $item)
                    <tr>
                        <td>{{ $item->nama_kategori ?? '-' }}</td>
                        <td>{{ $item->jumlah_hak ?? '2.5' }} Kg</td>
                        <td>{{ $item->jumlah_kk ?? '0' }}</td>
                        <td>{{ $item->total_beras ?? '0' }} Kg</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data distribusi</td>
                    </tr>
                    @endforelse
                    <tr class="table-secondary fw-bold">
                        <td colspan="2">Sub Total Lainnya</td>
                        <td>{{ $distribusiLainnya->sum('jumlah_kk') }}</td>
                        <td>{{ $distribusiLainnya->sum('total_beras') }} Kg</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Total Distribusi Per Kategori -->
        <h6 class="fw-bold mb-3">Total Distribusi Per Kategori (Gabungan)</h6>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Kategori Mustahik</th>
                        <th>Jumlah KK</th>
                        <th>Total Beras</th>
                        <th>Total Uang</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $grandTotalKK = 0;
                        $grandTotalBeras = 0;
                        $grandTotalUang = 0;
                    @endphp
                    
                    @forelse ($totalDistribusiPerCategory as $item)
                    @php
                        $grandTotalKK += $item['jumlah_kk'];
                        $grandTotalBeras += $item['total_beras'];
                        $grandTotalUang += $item['total_uang'];
                    @endphp
                    <tr>
                        <td>{{ $item['kategori'] ?? '-' }}</td>
                        <td>{{ $item['jumlah_kk'] ?? '0' }}</td>
                        <td>{{ $item['total_beras'] ?? '0' }} Kg</td>
                        <td>Rp {{ number_format($item['total_uang'] ?? 0, 0, ',', '.') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data distribusi</td>
                    </tr>
                    @endforelse
                    
                    @if(count($totalDistribusiPerCategory) > 0)
                    <tr class="table-primary fw-bold">
                        <td>GRAND TOTAL</td>
                        <td>{{ $grandTotalKK }}</td>
                        <td>{{ $grandTotalBeras }} Kg</td>
                        <td>Rp {{ number_format($grandTotalUang, 0, ',', '.') }}</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Additional Info -->
        <div class="mt-4">
            <div class="alert alert-info">
                <h6 class="alert-heading">Keterangan:</h6>
                <ul class="mb-0">
                    <li>Data di atas menampilkan distribusi zakat yang telah dilakukan secara aktual</li>
                    <li>Total beras dan uang dihitung berdasarkan catatan distribusi di tabel distribusi_zakat</li>
                    <li>Sisa zakat menunjukkan selisih antara total pengumpulan dan total distribusi</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection