@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')
    <div class="col-mb-6">
        <div class="card">
            <h5 class="card-header">Muzakki</h5>
            <form action="{{ route('muzakki.update', $muzakki->id ) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label">Nama Muzakki</label>
                        <input type="text" value="{{ $muzakki->nama_muzakki}}" name="nama_muzakki" class="form-control" id="exampleFormControlInput1" placeholder="John DOe" required />
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label">Jumlah Tanggungan</label>
                        <input type="number" value="{{ $muzakki->jumlah_tanggungan}}" name="jumlah_tanggungan" class="form-control" id="exampleFormControlInput1" placeholder="4" required/>
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                        <input type="text" value="{{ $muzakki->alamat}}" name="alamat" class="form-control" id="exampleFormControlInput1" placeholder="Alamat" required/>
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label">Nomor Handphone</label>
                        <input type="number" value="{{ $muzakki->handphone}}" name="handphone" class="form-control" id="exampleFormControlInput1" placeholder="0899...." required/>
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label">Nomor KK</label>
                        <input type="number" value="{{ $muzakki->nomor_kk}}" name="nomor_kk" class="form-control" id="exampleFormControlInput1" placeholder="12345678" required/>
                    </div>
                    <div>
                        <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="exampleFormControlTextarea1" rows="3" required>{{ $muzakki->keterangan }}</textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
