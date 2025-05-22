@extends('layouts.app')

@section('title', 'Pengertian Zakat Fitrah')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Main Content -->
            <main role="main" class="col-md-12 px-md-4 py-4">
                <!-- Header Image -->
                <div class="text-center mb-4">
                    <img src="{{ asset('../assets/img/backgrounds/beras.jpg') }}" alt="Zakat Fitrah" class="img-fluid block"
                        style="max-height: 300px; width: 100%; object-fit: cover;">
                </div>

                <!-- Content about Zakat Fitrah -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title">Apa itu Zakat Fitrah?</h3>
                        <p class="card-text">
                            Zakat Fitrah adalah zakat yang wajib dikeluarkan oleh setiap Muslim menjelang Hari Raya Idul Fitri. Zakat ini berfungsi untuk mensucikan jiwa orang yang berpuasa dari perbuatan sia-sia dan dosa, serta membantu orang-orang yang membutuhkan agar dapat ikut merayakan Idul Fitri dengan bahagia.
                        </p>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <h4>Hukum Zakat Fitrah</h4>
                                <p>
                                    Hukum zakat fitrah adalah <strong>wajib (fardhu ain)</strong> bagi setiap Muslim yang mampu memenuhi kebutuhan pokok dirinya dan keluarganya pada malam dan hari raya Idul Fitri. Baik anak-anak maupun orang dewasa, laki-laki maupun perempuan, merdeka maupun budak (pada masa dulu).
                                </p>
                                <p>
                                    <em>“Rasulullah SAW mewajibkan zakat fitrah satu sha' dari kurma atau satu sha' dari gandum atas budak, orang merdeka, laki-laki, perempuan, anak kecil dan orang dewasa dari kaum Muslimin.”</em><br>
                                    <small>(HR. Bukhari dan Muslim)</small>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <h4>Waktu Pembayaran</h4>
                                <p>
                                    Waktu pembayaran zakat fitrah terbagi menjadi beberapa kategori:
                                </p>
                                <ul>
                                    <li><strong>Waktu yang dibolehkan:</strong> sejak awal Ramadan.</li>
                                    <li><strong>Waktu yang utama (afdhal):</strong> setelah salat Subuh pada hari Idul Fitri dan sebelum salat Id.</li>
                                    <li><strong>Waktu makruh:</strong> setelah salat Id hingga sebelum matahari terbenam.</li>
                                    <li><strong>Waktu haram (dosa):</strong> setelah hari raya berakhir tanpa alasan yang sah.</li>
                                </ul>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <h4>Kadar Zakat Fitrah</h4>
                                <p>
                                    Kadar zakat fitrah yang wajib dibayarkan adalah sebesar <strong>satu sha’</strong> atau setara dengan sekitar <strong>2,5–3 kg makanan pokok</strong> seperti beras, gandum, atau kurma yang biasa dikonsumsi di daerah tersebut.
                                </p>
                            </div>
                            <div class="col-md-6">
                                <h4>Penerima Zakat</h4>
                                <p>
                                    Zakat Fitrah dapat disalurkan kepada 8 golongan (asnaf) penerima zakat sebagaimana disebutkan dalam QS. At-Taubah: 60:
                                </p>
                                <ol>
                                    <li>Fakir (sangat miskin)</li>
                                    <li>Miskin</li>
                                    <li>Amil (pengelola zakat)</li>
                                    <li>Muallaf (yang baru masuk Islam)</li>
                                    <li>Riqab (budak yang ingin memerdekakan diri)</li>
                                    <li>Gharim (orang yang terlilit utang)</li>
                                    <li>Fi Sabilillah (berjuang di jalan Allah)</li>
                                    <li>Ibnu Sabil (musafir yang kehabisan bekal)</li>
                                </ol>
                                <p>
                                    Namun, yang paling utama menerima zakat fitrah adalah <strong>fakir dan miskin</strong>.
                                </p>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h4>Hikmah Zakat Fitrah</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul>
                                        <li>Membersihkan harta dan menyucikan jiwa.</li>
                                        <li>Membantu fakir miskin merayakan Idul Fitri.</li>
                                        <li>Menumbuhkan rasa syukur dan kepedulian.</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul>
                                        <li>Memupuk rasa solidaritas sosial antar umat Islam.</li>
                                        <li>Melatih ketaatan dan keikhlasan dalam beramal.</li>
                                        <li>Menjaga ukhuwah dan mempererat hubungan sosial.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <style>
        .block {
            display: block;
            margin: 0 auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card {
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h4 {
            color: #2c3e50;
            font-weight: 600;
        }

        ol,
        ul {
            padding-left: 20px;
        }

        li {
            margin-bottom: 8px;
        }

        .card-title {
            color: #1a5276;
            font-weight: 700;
        }
    </style>
@endsection
