@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')
    <div class="col-mb-6">
        <div class="card">
            <h5 class="card-header">Tambah Kategori Mustahik</h5>
            <form action="{{ route('kategori_mustahik.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label">Nama Kategori</label>
                        <input type="text" name="nama_kategori" class="form-control" id="exampleFormControlInput1" placeholder="Nama Kategori"
                            required />
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label">Jumlah Hak</label>
                        <input type="number" name="jumlah_hak" class="form-control" id="exampleFormControlInput1" placeholder="4" required />
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
@endsection
