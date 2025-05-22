@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')
    <h6 class="mt-2 text-body-secondary"><a href="{{ route('kategori_mustahik.index') }}" class="">< Detail Kategori</a></h6>
    <div class="card mb-6">
        <div class="card-body">
            <h5 class="card-title mb-1">Detail Kategori</h5>
            <div class="card-subtitle mb-4">Kategori</div>
            <p class="card-text">
                <strong>Nama Kategori :</strong> {{ $kategoriMustahik->nama_kategori }} <br>
                <strong>Jumlah Hak : </strong>{{ $kategoriMustahik->jumlah_hak }} <br>
            </p>
        </div>
    </div>
@endsection
