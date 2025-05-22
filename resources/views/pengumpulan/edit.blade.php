@extends('layouts.app')

@section('title', 'Edit Pembayaran Zakat')
@section('content')
    <div class="col-mb-6">
        <div class="card">
            <h5 class="card-header">Edit Pembayaran Zakat Fitrah</h5>

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

            <form action="{{ route('pengumpulan.update', $bayarZakat->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div class="mb-4">
                        <label for="nama_kk" class="form-label">Nama KK / Muzakki</label>
                        <select name="nama_kk" id="nama_kk" class="form-control" required>
                            <option value="" disabled>-- Pilih Nama KK --</option>
                            @foreach ($muzakkiList as $muzakki)
                                <option value="{{ $muzakki->nama_muzakki }}"
                                    data-tanggungan="{{ $muzakki->jumlah_tanggungan }}"
                                    {{ old('nama_kk', $bayarZakat->nama_kk) == $muzakki->nama_muzakki ? 'selected' : '' }}>
                                    {{ $muzakki->nama_muzakki }} ({{ $muzakki->nama_kk }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Jumlah Tanggungan</label>
                        <input type="number" name="jumlah_tanggungan" id="jumlah_tanggungan" class="form-control"
                            value="{{ old('jumlah_tanggungan', $bayarZakat->jumlah_tanggungan) }}" readonly />
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Jenis Bayar</label>
                        <select name="jenis_bayar" id="jenis_bayar" class="form-control" required>
                            <option value="" disabled>-- Pilih Jenis Bayar --</option>
                            <option value="beras" {{ old('jenis_bayar', $bayarZakat->jenis_bayar) == 'beras' ? 'selected' : '' }}>Beras</option>
                            <option value="uang" {{ old('jenis_bayar', $bayarZakat->jenis_bayar) == 'uang' ? 'selected' : '' }}>Uang</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Jumlah Tanggungan Yang Dibayar</label>
                        <input type="number" name="jumlah_tanggungan_dibayar" id="jumlah_tanggungan_dibayar"
                            class="form-control" value="{{ old('jumlah_tanggungan_dibayar', $bayarZakat->jumlah_tanggungan_dibayar) }}"
                            min="1" required />
                    </div>

                    <div class="mb-4" id="beras-field" style="display: none;">
                        <label class="form-label">Bayar Beras (kg)</label>
                        <input type="number" name="bayar_beras" id="bayar_beras" class="form-control"
                            value="{{ old('bayar_beras', $bayarZakat->bayar_beras) }}"
                            step="0.1" min="2.5" />
                        <small class="text-muted">Standar zakat fitrah 2.5 kg per orang</small>
                    </div>

                    <div class="mb-4" id="uang-field" style="display: none;">
                        <label class="form-label">Bayar Uang (Rp)</label>
                        <input type="number" name="bayar_uang" id="bayar_uang" class="form-control"
                            value="{{ old('bayar_uang', $bayarZakat->bayar_uang) }}"
                            step="1000" min="35000" />
                        <small class="text-muted">Standar zakat fitrah Rp35,000 per orang</small>
                    </div>

                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary">Update Pembayaran</button>
                        <a href="{{ route('pengumpulan.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Skrip sama seperti sebelumnya --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Set initial kondisi berdasarkan nilai saat ini
            let jenisBayarInit = $('#jenis_bayar').val();
            if (jenisBayarInit === 'beras') {
                $('#beras-field').show();
                $('#bayar_beras').prop('required', true);
            } else if (jenisBayarInit === 'uang') {
                $('#uang-field').show();
                $('#bayar_uang').prop('required', true);
            }

            $('#nama_kk').change(function() {
                let jumlahTanggungan = $(this).find(':selected').data('tanggungan');
                $('#jumlah_tanggungan').val(jumlahTanggungan);
                $('#jumlah_tanggungan_dibayar').attr('max', jumlahTanggungan);
                $('#jumlah_tanggungan_dibayar').val(jumlahTanggungan);
                updatePaymentAmount();
            });

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
                updatePaymentAmount();
            });

            $('#jumlah_tanggungan_dibayar').on('input', function() {
                updatePaymentAmount();
            });

            function updatePaymentAmount() {
                var jenisBayar = $('#jenis_bayar').val();
                var jumlahDibayar = parseInt($('#jumlah_tanggungan_dibayar').val()) || 0;
                if (jenisBayar === 'beras') {
                    var totalBeras = jumlahDibayar * 2.5;
                    $('#bayar_beras').val(totalBeras.toFixed(1));
                } else if (jenisBayar === 'uang') {
                    var totalUang = jumlahDibayar * 35000;
                    $('#bayar_uang').val(totalUang);
                }
            }

            $('form').submit(function(e) {
                if (!$('#nama_kk').val()) {
                    alert('Silakan pilih Nama KK / Muzakki');
                    e.preventDefault();
                    return false;
                }

                var jenisBayar = $('#jenis_bayar').val();
                var jumlahTanggungan = parseInt($('#jumlah_tanggungan').val()) || 0;
                var jumlahDibayar = parseInt($('#jumlah_tanggungan_dibayar').val()) || 0;

                if (jumlahDibayar <= 0 || jumlahDibayar > jumlahTanggungan) {
                    alert('Jumlah tanggungan yang dibayar harus valid');
                    e.preventDefault();
                    return false;
                }

                if (!jenisBayar) {
                    alert('Silakan pilih jenis pembayaran');
                    e.preventDefault();
                    return false;
                }

                if (jenisBayar === 'beras' && (parseFloat($('#bayar_beras').val()) || 0) < 2.5) {
                    alert('Minimal pembayaran beras adalah 2.5 kg');
                    e.preventDefault();
                    return false;
                }

                if (jenisBayar === 'uang' && (parseInt($('#bayar_uang').val()) || 0) < 35000) {
                    alert('Minimal pembayaran uang adalah Rp35,000');
                    e.preventDefault();
                    return false;
                }

                return true;
            });
        });
    </script>
@endsection
