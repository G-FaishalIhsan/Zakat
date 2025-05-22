@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')
<!-- Bordered Table -->
<div class="card">
    <h5 class="card-header">List Muzakki</h5>
    <div class="card-body">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('muzakki.create') }}" class="btn btn-primary">Tambah Muzakki</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jumlah Tanggungan</th>
                        <th>Alamat</th>
                        <th>No Handphone</th>
                        <th>Nomor KK</th>
                        <th>Keterangan</th> 
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allMuzakki as $allMuzakki)
                        <tr>
                            <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $allMuzakki->nama_muzakki }}</td>
                            <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $allMuzakki->jumlah_tanggungan }}</td>
                            <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $allMuzakki->alamat }}</td>
                            <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $allMuzakki->handphone }}</td>
                            <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $allMuzakki->nomor_kk }}</td>
                            <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $allMuzakki->keterangan }}</td>
                            <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <button t class="dropdown-item" href="javascript;"><a
                                                class="icon-base bx bx-edit-alt me-1 text-dark" href="{{ route('muzakki.edit', $allMuzakki->id) }}"></a> Edit</button>
                                        <button class="dropdown-item" href="javascript;"><a
                                                class="icon-base bx bx-show me-1 text-dark" href="{{ route('muzakki.show', $allMuzakki->id) }}"></a> Detail</button>
                                        <form action="{{ route('muzakki.destroy', $allMuzakki->id) }}" method="POST">
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
