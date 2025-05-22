@extends('layouts.app')

@section('title', 'Tambah Distribusi Zakat Fitrah Warga')
@section('content')
    <div class="col-mb-6">
        <div class="card">
            <h5 class="card-header">Distribusi Zakat Fitrah Warga</h5>
            
            @if ($errors->any())
                <div class="alert alert-danger m-3">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-danger m-3">
                    {{ session('error') }}
                </div>
            @endif
            
            <form action="{{ route('distribusi-warga.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="mb-4">
                        <label for="nama_mustahik" class="form-label">Nama Mustahik Warga</label>
                        <select name="nama_mustahik" id="nama_mustahik" class="form-control" required>
                            <option value="" disabled selected>-- Pilih Mustahik --</option>
                            @foreach ($mustahikList as $mustahik)
                                <option value="{{ $mustahik->nama_mustahik }}" data-hak="{{ $mustahik->jumlah_hak }}">
                                    {{ $mustahik->nama_mustahik }} ({{ $mustahik->kategori_mustahik }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Jumlah Hak</label>
                        <input type="text" id="jumlah_hak" class="form-control" readonly />
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Jenis Bayar</label>
                        <select name="jenis_bayar" id="jenis_bayar" class="form-control" required>
                            <option value="" disabled selected>-- Pilih Jenis Bayar --</option>
                            <option value="beras">Beras</option>
                            <option value="uang">Uang</option>
                        </select>
                    </div>

                    <div class="mb-4" id="beras-field" style="display: none;">
                        <label class="form-label">Jumlah Beras (kg)</label>
                        <input type="number" name="jumlah_beras" id="jumlah_beras" class="form-control"
                            placeholder="Contoh: 2.5" step="0.1" min="2.5" />
                        <small class="text-muted">Standar zakat fitrah 2.5 kg per orang</small>
                    </div>

                    <div class="mb-4" id="uang-field" style="display: none;">
                        <label class="form-label">Jumlah Uang (Rp)</label>
                        <input type="number" name="jumlah_uang" id="jumlah_uang" class="form-control"
                            placeholder="Contoh: 35000" step="1000" min="35000" />
                        <small class="text-muted">Standar zakat fitrah Rp35,000 per orang</small>
                    </div>

                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary">Simpan Distribusi</button>
                        <a href="{{ route('distribusi-warga.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Isi jumlah hak saat memilih mustahik
            $('#nama_mustahik').change(function() {
                var jumlahHak = $(this).find(':selected').data('hak');
                $('#jumlah_hak').val(jumlahHak);
                
                // Update jumlah beras/uang
                updateDistribusiAmount(jumlahHak);
            });

            // Toggle field beras/uang
            $('#jenis_bayar').change(function() {
                if ($(this).val() === 'beras') {
                    $('#beras-field').show();
                    $('#jumlah_beras').prop('required', true);
                    $('#uang-field').hide();
                    $('#jumlah_uang').prop('required', false).val('');
                } else if ($(this).val() === 'uang') {
                    $('#uang-field').show();
                    $('#jumlah_uang').prop('required', true);
                    $('#beras-field').hide();
                    $('#jumlah_beras').prop('required', false).val('');
                }
                
                // Update jumlah distribusi
                var jumlahHak = $('#jumlah_hak').val();
                updateDistribusiAmount(jumlahHak);
            });
            
            // Fungsi untuk update jumlah beras/uang berdasarkan jumlah hak
            function updateDistribusiAmount(jumlahHak) {
                var jenisBayar = $('#jenis_bayar').val();
                if (!jumlahHak || isNaN(jumlahHak)) {
                    jumlahHak = 0;
                }
                
                if (jenisBayar === 'beras' && jumlahHak > 0) {
                    var totalBeras = parseFloat(jumlahHak) * 2.5;
                    $('#jumlah_beras').val(totalBeras.toFixed(1));
                } else if (jenisBayar === 'uang' && jumlahHak > 0) {
                    var totalUang = parseInt(jumlahHak) * 35000;
                    $('#jumlah_uang').val(totalUang);
                }
            }
        });
    </script>
@endsection