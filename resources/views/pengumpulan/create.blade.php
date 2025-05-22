@extends('layouts.app')

@section('title', 'Tambah Pembayaran Zakat')
@section('content')
    <div class="col-mb-6">
        <div class="card">
            <h5 class="card-header">Pembayaran Zakat Fitrah</h5>
            
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
            
            <form action="{{ route('pengumpulan.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="mb-4">
                        <label for="nama_kk" class="form-label">Nama KK / Muzakki</label>
                        <select name="nama_kk" id="nama_kk" class="form-control" required>
                            <option value="" disabled selected>-- Pilih Nama KK --</option>
                            @foreach ($muzakkiList as $muzakki)
                                <option value="{{ $muzakki->nama_muzakki }}" data-tanggungan="{{ $muzakki->jumlah_tanggungan }}">
                                    {{ $muzakki->nama_muzakki }} ({{ $muzakki->nama_kk }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Jumlah Tanggungan</label>
                        <input type="number" name="jumlah_tanggungan" id="jumlah_tanggungan" class="form-control"
                            placeholder="4" readonly />
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Jenis Bayar</label>
                        <select name="jenis_bayar" id="jenis_bayar" class="form-control" required>
                            <option value="" disabled selected>-- Pilih Jenis Bayar --</option>
                            <option value="beras">Beras</option>
                            <option value="uang">Uang</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Jumlah Tanggungan Yang Dibayar</label>
                        <input type="number" name="jumlah_tanggungan_dibayar" id="jumlah_tanggungan_dibayar"
                            class="form-control" placeholder="2" min="1" required />
                    </div>

                    <div class="mb-4" id="beras-field" style="display: none;">
                        <label class="form-label">Bayar Beras (kg)</label>
                        <input type="number" name="bayar_beras" id="bayar_beras" class="form-control"
                            placeholder="Contoh: 2.5" step="0.1" min="2.5" />
                        <small class="text-muted">Standar zakat fitrah 2.5 kg per orang</small>
                    </div>

                    <div class="mb-4" id="uang-field" style="display: none;">
                        <label class="form-label">Bayar Uang (Rp)</label>
                        <input type="number" name="bayar_uang" id="bayar_uang" class="form-control"
                            placeholder="Contoh: 35000" step="1000" min="35000" />
                        <small class="text-muted">Standar zakat fitrah Rp35,000 per orang</small>
                    </div>

                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary">Simpan Pembayaran</button>
                        <a href="{{ route('pengumpulan.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Cek route URL dan tambahkan token CSRF
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            // Debugging - log form elements
            console.log('Form elements:', {
                nama_kk_select: $('#nama_kk').length,
                csrf_token: $('meta[name="csrf-token"]').attr('content')
            });
            
            // Isi jumlah tanggungan saat memilih muzakki
            $('#nama_kk').change(function() {
                var namaKK = $(this).val();
                console.log('Selected nama_kk:', namaKK);
                
                // Opsi 1: Gunakan data attribute
                var jumlahTanggungan = $(this).find(':selected').data('tanggungan');
                console.log('Jumlah tanggungan:', jumlahTanggungan);
                $('#jumlah_tanggungan').val(jumlahTanggungan);
                $('#jumlah_tanggungan_dibayar').attr('max', jumlahTanggungan);
                // Atur default value sama dengan jumlah tanggungan
                $('#jumlah_tanggungan_dibayar').val(jumlahTanggungan);
                
                // Update jumlah beras/uang jika jenis bayar sudah dipilih
                updatePaymentAmount();
            });

            // Toggle field beras/uang
            $('#jenis_bayar').change(function() {
                if ($(this).val() === 'beras') {
                    $('#beras-field').show();
                    $('#bayar_beras').prop('required', true);
                    $('#uang-field').hide();
                    $('#bayar_uang').prop('required', false).val('');
                } else if ($(this).val() === 'uang') {
                    $('#uang-field').show();
                    $('#bayar_uang').prop('required', true);
                    $('#beras-field').hide();
                    $('#bayar_beras').prop('required', false).val('');
                }
                
                // Update jumlah pembayaran
                updatePaymentAmount();
            });
            
            // Update jumlah pembayaran saat jumlah tanggungan dibayar berubah
            $('#jumlah_tanggungan_dibayar').on('input', function() {
                updatePaymentAmount();
            });
            
            // Fungsi untuk update jumlah beras/uang berdasarkan jumlah tanggungan dibayar
            function updatePaymentAmount() {
                var jenisBayar = $('#jenis_bayar').val();
                var jumlahDibayar = parseInt($('#jumlah_tanggungan_dibayar').val()) || 0;
                
                if (jenisBayar === 'beras' && jumlahDibayar > 0) {
                    var totalBeras = jumlahDibayar * 2.5;
                    $('#bayar_beras').val(totalBeras.toFixed(1));
                } else if (jenisBayar === 'uang' && jumlahDibayar > 0) {
                    var totalUang = jumlahDibayar * 35000;
                    $('#bayar_uang').val(totalUang);
                }
            }
            
            // Validasi form sebelum submit
            $('form').submit(function(e) {
                // Pastikan nama_kk tidak kosong
                if (!$('#nama_kk').val()) {
                    alert('Silakan pilih Nama KK / Muzakki');
                    e.preventDefault();
                    return false;
                }
                
                var jenisBayar = $('#jenis_bayar').val();
                var jumlahTanggungan = parseInt($('#jumlah_tanggungan').val()) || 0;
                var jumlahDibayar = parseInt($('#jumlah_tanggungan_dibayar').val()) || 0;
                
                // Debug - tampilkan nilai form
                console.log('Form data:', {
                    nama_kk: $('#nama_kk').val(),
                    jumlah_tanggungan: jumlahTanggungan,
                    jenis_bayar: jenisBayar,
                    jumlah_tanggungan_dibayar: jumlahDibayar,
                    bayar_beras: $('#bayar_beras').val(),
                    bayar_uang: $('#bayar_uang').val()
                });
                
                // Validasi jumlah tanggungan dibayar
                if (jumlahDibayar <= 0) {
                    alert('Jumlah tanggungan yang dibayar harus lebih dari 0');
                    e.preventDefault();
                    return false;
                }
                
                if (jumlahDibayar > jumlahTanggungan) {
                    alert('Jumlah tanggungan yang dibayar tidak boleh melebihi jumlah tanggungan');
                    e.preventDefault();
                    return false;
                }
                
                // Validasi jenis bayar
                if (!jenisBayar) {
                    alert('Silakan pilih jenis pembayaran');
                    e.preventDefault();
                    return false;
                }
                
                // Validasi jumlah pembayaran
                if (jenisBayar === 'beras') {
                    var berasValue = parseFloat($('#bayar_beras').val()) || 0;
                    if (berasValue < 2.5) {
                        alert('Minimal pembayaran beras adalah 2.5 kg');
                        e.preventDefault();
                        return false;
                    }
                } else if (jenisBayar === 'uang') {
                    var uangValue = parseInt($('#bayar_uang').val()) || 0;
                    if (uangValue < 35000) {
                        alert('Minimal pembayaran uang adalah Rp35,000');
                        e.preventDefault();
                        return false;
                    }
                }
                
                return true;
            });
        });
    </script>
@endsection