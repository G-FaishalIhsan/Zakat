@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')
    <h6 class="mt-2 text-body-secondary"><a href="{{ route('muzakki.index') }}" class="">< List Muzakki</a></h6>
    <div class="card mb-6">
        <div class="card-body">
            <h5 class="card-title mb-1">Detail Muzakki</h5>
            <div class="card-subtitle mb-4">Muzakki</div>
            <p class="card-text">
                Nama Muzakki : {{ $muzakki->nama_muzakki }} <br>
                Jumlah Tanggungan : {{ $muzakki->jumlah_tanggungan }} <br>
                Alamat : {{ $muzakki->alamat }} <br>
                Nomor KK : {{ $muzakki->nomor_kk }} <br>
                No HP : {{ $muzakki->handphone }} <br>
                Tanggal Daftar : {{ $muzakki->created_at }} <br>
                Keterangan : {{ $muzakki->keterangan }}  <br>
            </p>
        </div>
    </div>
@endsection
