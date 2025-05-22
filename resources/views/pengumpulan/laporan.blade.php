php
@extends('layouts.app')

@section('title', 'Laporan Pengumpulan Zakat')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Laporan Pengumpulan Zakat Fitrah</h5>
            <div class="btn-group">
                <a href="{{ route('pengumpulan.export.pdf') }}" class="btn btn-danger">
                    <i class="bx bxs-file-pdf"></i> Export PDF
                </a>
                <a href="{{ route('pengumpulan.export.word') }}" class="btn btn-primary ms-2">
                    <i class="bx bxs-file-doc"></i> Export Word
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th width="30%">Total Muzakki</th>
                            <td>{{ $totalMuzakki }} orang</td>
                        </tr>
                        <tr>
                            <th>Total Jiwa</th>
                            <td>{{ $totalJiwa }} jiwa</td>
                        </tr>
                        <tr>
                            <th>Total Beras</th>
                            <td>{{ $totalBeras }} kg</td>
                        </tr>
                        <tr>
                            <th>Total Uang</th>
                            <td>Rp {{ number_format($totalUang, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
