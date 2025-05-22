@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <!-- Bordered Table -->
    <div class="card">
        <h5 class="card-header">List Pembayaran</h5>
        <div class="card-body">
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('pengumpulan.create') }}" class="btn btn-primary">Tambah Pembayaran</a>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama KK</th>
                            <th>Jumlah Tanggungan</th>
                            <th>Jenis Bayar</th>
                            <th>Jumlah Tanggungan Dibayar</th>
                            <th>Bayar Beras</th>
                            <th>Bayar Uang</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bayarZakatList as $bayar)
                            <tr>
                                <td>{{ $bayar->nama_kk }}</td>
                                <td>{{ $bayar->jumlah_tanggungan }}</td>
                                <td>{{ $bayar->jenis_bayar }}</td>
                                <td>{{ $bayar->jumlah_tanggungan_dibayar }}</td>
                                <td>{{ $bayar->bayar_beras }} Kg</td>
                                <td>Rp{{ number_format($bayar->bayar_uang, 0, ',', '.') }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ route('pengumpulan.edit', $bayar->id) }}">
                                                <i class="icon-base bx bx-edit-alt me-1 text-dark"></i> Edit
                                            </a>
                                            <form action="{{ route('pengumpulan.destroy', $bayar->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item">
                                                    <i class="icon-base bx bx-trash me-1"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Bordered Table -->
@endsection
