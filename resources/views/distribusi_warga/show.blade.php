@extends('layouts.app')

@section('title', 'Detail Mustahik')
@section('content')
    <h6 class="mt-2 text-body-secondary"><a href="{{ route('mustahik.index') }}" class="">< Kembali ke Daftar Mustahik</a></h6>
    
    <div class="card mb-6">
        <div class="card-body">
            <h5 class="card-title mb-1">Detail Mustahik</h5>
            <div class="card-subtitle mb-4">{{ $mustahik->kategori_mustahik }}</div>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <p class="card-text">
                        <strong>Nama Mustahik:</strong><br>
                        {{ $mustahik->nama_mustahik }}
                    </p>
                </div>
                <div class="col-md-6">
                    <p class="card-text">
                        <strong>Kategori:</strong><br>
                        {{ ucfirst($mustahik->kategori_mustahik) }}
                    </p>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <p class="card-text">
                        <strong>Jumlah Hak (Beras):</strong><br>
                        {{ $mustahik->jumlah_hak }} kg
                    </p>
                </div>
                <div class="col-md-6">
                    <p class="card-text">
                        <strong>Nomor KK:</strong><br>
                        {{ $mustahik->nomor_kk }}
                    </p>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <p class="card-text">
                        <strong>Alamat:</strong><br>
                        {{ $mustahik->alamat }}
                    </p>
                </div>
                <div class="col-md-6">
                    <p class="card-text">
                        <strong>Nomor Handphone:</strong><br>
                        {{ $mustahik->handphone }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection