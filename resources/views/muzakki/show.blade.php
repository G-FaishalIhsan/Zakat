@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')
    <h6 class="mt-2 text-body-secondary"><a href="{{ route('muzakki.index') }}" class="">< List Muzakki</a></h6>
    <div class="card mb-6">
        <div class="card-body">
            <h5 class="card-title mb-1">Detail Muzakki</h5>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <p class="card-text">
                        <strong>Nama Muzakki :</strong><br>
                        {{ $muzakki->nama_muzakki }}
                    </p>
                </div>
                <div class="col-md-6">
                    <p class="card-text">
                        <strong>Jumlah Tanggungan :</strong><br>
                        {{ ucfirst($muzakki->jumlah_tanggungan) }}
                    </p>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <p class="card-text">
                        <strong>Alamat :</strong><br>
                        {{ $muzakki->alamat }}
                    </p>
                </div>
                <div class="col-md-6">
                    <p class="card-text">
                        <strong>Nomor KK:</strong><br>
                        {{ $muzakki->nomor_kk }}
                    </p>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <p class="card-text">
                        <strong>No HP :</strong><br>
                        {{ $muzakki->handphone }}
                    </p>
                </div>
                <div class="col-md-6">
                    <p class="card-text">
                        <strong>Tanggal Daftar :</strong><br>
                        {{ $muzakki->created_at }}
                    </p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <p class="card-text">
                        <strong>Keterangan :</strong><br>
                        {{ $muzakki->keterangan }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection