@extends('layouts.app')

@section('title', 'Edit Mustahik')
@section('content')
    <div class="col-mb-6">
        <div class="card">
            <h5 class="card-header">Edit Data Mustahik</h5>
            <form action="{{ route('mustahik.update', $mustahik->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="mb-4">
                        <label for="nama_mustahik" class="form-label">Nama Mustahik</label>
                        <input type="text" name="nama_mustahik" class="form-control" id="nama_mustahik"
                            value="{{ old('nama_mustahik', $mustahik->nama_mustahik) }}" required />
                    </div>

                    <div class="mb-4">
                        <label for="kategori_mustahik" class="form-label">Kategori Mustahik</label>
                        <select name="kategori_mustahik" id="kategoriSelect" class="form-select" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($allKategori as $item)
                                <option value="{{ $item->nama_kategori }}" data-jumlah-hak="{{ $item->jumlah_hak }}"
                                    {{ old('kategori_mustahik', $mustahik->kategori_mustahik) == $item->nama_kategori ? 'selected' : '' }}>
                                    {{ $item->nama_kategori }} ({{ $item->jumlah_hak }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="jumlah_hak" class="form-label">Jumlah Hak</label>
                        <input type="number" name="jumlah_hak" class="form-control" id="jumlahHak"
                            value="{{ old('jumlah_hak', $mustahik->jumlah_hak) }}" readonly required />
                    </div>

                    <div class="mb-4">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat"
                            value="{{ old('alamat', $mustahik->alamat) }}" required />
                    </div>

                    <div class="mb-4">
                        <label for="handphone" class="form-label">Nomor Handphone</label>
                        <input type="text" name="handphone" class="form-control" id="handphone"
                            value="{{ old('handphone', $mustahik->handphone) }}" required />
                    </div>

                    <div class="mb-4">
                        <label for="nomor_kk" class="form-label">Nomor KK</label>
                        <input type="text" name="nomor_kk" class="form-control" id="nomor_kk"
                            value="{{ old('nomor_kk', $mustahik->nomor_kk) }}" required />
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('mustahik.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Fungsi untuk mengisi jumlah_hak berdasarkan kategori yang dipilih
        function updateJumlahHak() {
            const select = document.getElementById('kategoriSelect');
            const selectedOption = select.options[select.selectedIndex];
            document.getElementById('jumlahHak').value = selectedOption.getAttribute('data-jumlah-hak');
        }

        // Inisialisasi saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            // Isi nilai awal
            updateJumlahHak();

            // Tambahkan event listener untuk perubahan
            document.getElementById('kategoriSelect').addEventListener('change', updateJumlahHak);
        });
    </script>
@endsection
