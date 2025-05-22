@extends('layouts.app')

@section('title', 'Distribusi Zakat Fitrah Mustahik')

@section('content')
    <!-- Bordered Table -->
    <div class="card">
        <h5 class="card-header">Distribusi Zakat Fitrah Mustahik</h5>
        <div class="card-body">
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('distribusi-mustahik.create') }}" class="btn btn-primary">Tambah Distribusi</a>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Mustahik</th>
                            <th>Warga / Mustahik</th>
                            <th>Jumlah Beras</th>
                            <th>Jumlah Uang</th>
                            <th>Waktu Distribusi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($distribusiList as $distribusi)
                            <tr>
                                <td>{{ $distribusi->nama_mustahik }}</td>
                                <td>{{ ucfirst($distribusi->jenis_zakat) }}</td>
                                <td>{{ $distribusi->jumlah_beras ? $distribusi->jumlah_beras . ' Kg' : '-' }}</td>
                                <td>{{ $distribusi->jumlah_uang ? 'Rp ' . number_format($distribusi->jumlah_uang, 0, ',', '.') : '-' }}</td>
                                <td>{{ $distribusi->created_at->format('d-m-Y H:i') }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ route('distribusi-mustahik.show', $distribusi->id) }}">
                                                <i class="icon-base bx bx-detail me-1"></i> Detail
                                            </a>
                                            <a class="dropdown-item"
                                                href="{{ route('distribusi-mustahik.edit', $distribusi->id) }}">
                                                <i class="icon-base bx bx-edit-alt me-1 text-dark"></i> Edit
                                            </a>
                                            <form action="{{ route('distribusi-mustahik.destroy', $distribusi->id) }}"
                                                method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
                        
                        @if(count($distribusiList) == 0)
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data distribusi</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Bordered Table -->
@endsection