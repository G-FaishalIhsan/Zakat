@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')
<!-- Bordered Table -->
<div class="card">
    <h5 class="card-header">List Kategori Mustahik</h5>
    <div class="card-body">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('kategori_mustahik.create') }}" class="btn btn-primary">Tambah Kategori</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Jumlah Hak</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allKategoriMustahik as $allKategori)
                    <tr>
                        <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $loop->iteration }}</td>
                        <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $allKategori->nama_kategori }}</td>
                        <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $allKategori->jumlah_hak }}</td>
                        <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item" href="javascript;"><a
                                            class="icon-base bx bx-edit-alt me-1 text-dark" href="{{ route('kategori_mustahik.edit', $allKategori->id) }}"></a> Edit</button>
                                    <button class="dropdown-item" href="javascript;"><a
                                            class="icon-base bx bx-show me-1 text-dark" href="{{ route('kategori_mustahik.show', $allKategori->id) }}"></a> Detail</button>
                                    <form action="{{ route('kategori_mustahik.destroy', $allKategori->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item" href="javascript:void(0);"><i
                                            class="icon-base bx bx-trash me-1"></i> Delete</button>
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
