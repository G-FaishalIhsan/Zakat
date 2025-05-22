@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')
<!-- Bordered Table -->
<div class="card">
    <h5 class="card-header">List Mustahik</h5>
    <div class="card-body">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('mustahik.create') }}" class="btn btn-primary">Tambah Mustahik</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Kategori Mustahik</th>
                        <th>Jumlah Hak</th>
                        <th>Alamat</th>
                        <th>Nomor HP</th>
                        <th>Nomor KK</th> 
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allMustahik as $items)
                        <tr>
                            <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $items->nama_mustahik }}</td>
                            <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $items->kategori_mustahik }}</td>
                            <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $items->jumlah_hak }}</td>
                            <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $items->alamat }}</td>
                            <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $items->handphone }}</td>
                            <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $items->nomor_kk }}</td>
                            <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item" href="javascript;"><a
                                                class="icon-base bx bx-edit-alt me-1 text-dark" href="{{ route('mustahik.edit', $items->id) }}"></a> Edit</button>
                                        <button class="dropdown-item" href="javascript;"><a
                                                class="icon-base bx bx-show me-1 text-dark" href="{{ route('mustahik.show', $items->id) }}"></a> Detail</button>
                                        <form action="{{ route('mustahik.destroy', $items->id) }}" method="POST">
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
<br>
<div class="card">
    <h5 class="card-header">List Mustahik Lainnya</h5>
    <div class="card-body">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('mustahik.create') }}" class="btn btn-primary">Tambah Mustahik</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Kategori Mustahik</th>
                        <th>Jumlah Hak</th>
                        <th>Alamat</th>
                        <th>Nomor HP</th>
                        <th>Nomor KK</th> 
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allMustahikLainnya as $items)
                        <tr>
                            <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $items->nama_mustahik }}</td>
                            <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $items->kategori_mustahik }}</td>
                            <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $items->jumlah_hak }}</td>
                            <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $items->alamat }}</td>
                            <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $items->handphone }}</td>
                            <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $items->nomor_kk }}</td>
                            <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item" href="javascript;"><a
                                                class="icon-base bx bx-edit-alt me-1 text-dark" href="{{ route('mustahik.edit', $items->id) }}"></a> Edit</button>
                                        <button class="dropdown-item" href="javascript;"><a
                                                class="icon-base bx bx-show me-1 text-dark" href="{{ route('mustahik.show', $items->id) }}"></a> Detail</button>
                                        <form action="{{ route('mustahik.destroy', $items->id) }}" method="POST">
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
