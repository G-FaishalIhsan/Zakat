@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')
    <div class="col-mb-6">
        <div class="card">
            <h5 class="card-header">Mustahik</h5>
            <form action="{{ route('mustahik.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label">Nama Mustahik</label>
                        <input type="text" name="nama_mustahik" class="form-control" id="exampleFormControlInput1" placeholder="John DOe"
                            required />
                    </div>
                    <div class="mb-4">
                        <label for="defaultSelect" class="form-label">Kategori Mustahik</label>
                        <select id="defaultSelect" class="form-select" name="kategori_mustahik">Select Kategori
                            <option value="">Pilih Kategori</option>
                            @foreach ($allKategori as $items)
                                <option value="{{ $items->nama_kategori }}" {{ old('kategori_mustahik', $mustahik->kategori_mustahik ?? '') == $items->nama_kategori ? 'selected' : '' }}>{{ $items->nama_kategori }} ({{ $items->jumlah_hak }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="jumlahHak" class="form-label">Jumlah Hak (otomatis terisi)</label>
                        <input type="number" name="jumlah_hak" class="form-control" id="jumlahHak" 
                            placeholder="Akan terisi otomatis" readonly required />
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="exampleFormControlInput1" placeholder="Alamat"
                            required />
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label">Nomor Handphone</label>
                        <input type="number" name="handphone" class="form-control" id="exampleFormControlInput1" placeholder="0899...."
                            required />
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label">Nomor KK</label>
                        <input type="number" name="nomor_kk" class="form-control" id="exampleFormControlInput1" placeholder="12345678"
                            required />
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('kategoriSelect').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const jumlahHak = selectedOption.getAttribute('data-jumlah-hak');
            document.getElementById('jumlahHak').value = jumlahHak;
        });

        // Inisialisasi nilai jumlah_hak jika ada old input
        window.addEventListener('DOMContentLoaded', function() {
            const kategoriSelect = document.getElementById('kategoriSelect');
            if (kategoriSelect.value) {
                const selectedOption = kategoriSelect.options[kategoriSelect.selectedIndex];
                const jumlahHak = selectedOption.getAttribute('data-jumlah-hak');
                document.getElementById('jumlahHak').value = jumlahHak;
            }
        });
    </script>
@endsection
