<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zakat Fitrah - Sucikan Harta dan Bersihkan Jiwa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #0c8e6f;
            --secondary: #f8b500;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(12, 142, 111, 0.2);
        }

        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.pexels.com/photos/1537086/pexels-photo-1537086.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');
            background-size: cover;
            background-position: center;
            color: white;
            min-height: 100vh;
        }

        .navbar-custom {
            background-color: transparent;
            transition: background-color 0.3s ease;
        }

        .navbar-custom.scrolled {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-custom.scrolled .navbar-brand,
        .navbar-custom.scrolled .nav-link {
            color: #343a40;
        }

        .nav-link {
            font-weight: 500;
            transition: color 0.3s ease;
            position: relative;
            color: white;
        }

        .nav-link:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--secondary);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover:after {
            width: 80%;
        }

        .about-section {
            background-color: #f8f9fa;
            position: relative;
        }

        .about-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(to right, var(--primary), var(--secondary));
        }

        .category-card {
            transition: all 0.3s ease;
            height: 100%;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .zakat-category-icon {
            width: 60px;
            height: 60px;
            background-color: rgba(12, 142, 111, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: var(--primary);
            transition: all 0.3s ease;
        }

        .zakat-category-icon:hover {
            background-color: var(--primary);
            color: white;
            transform: scale(1.1);
        }

        .cta-section {
            background-color: var(--primary);
            color: white;
        }

        .testimonial-card {
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
        }

        .footer {
            background-color: #1a1a1a;
            color: #f8f9fa;
        }

        .divider {
            height: 4px;
            width: 60px;
            background: linear-gradient(to right, var(--primary), var(--secondary));
            margin: 0 auto 1.5rem;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-custom navbar-dark">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#home">
                <!-- Logo Masjid Islami -->
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 100 100"
                    fill="none" class="me-2">
                    <!-- Base Masjid -->
                    <rect x="20" y="60" width="60" height="30" fill="currentColor" opacity="0.8" />

                    <!-- Kubah Utama -->
                    <ellipse cx="50" cy="60" rx="20" ry="12" fill="currentColor" />

                    <!-- Kubah Kecil Kiri -->
                    <ellipse cx="30" cy="65" rx="8" ry="5" fill="currentColor"
                        opacity="0.9" />

                    <!-- Kubah Kecil Kanan -->
                    <ellipse cx="70" cy="65" rx="8" ry="5" fill="currentColor"
                        opacity="0.9" />

                    <!-- Menara Kiri -->
                    <rect x="15" y="30" width="8" height="35" fill="currentColor" />
                    <ellipse cx="19" cy="30" rx="4" ry="3" fill="currentColor" />

                    <!-- Menara Kanan -->
                    <rect x="77" y="30" width="8" height="35" fill="currentColor" />
                    <ellipse cx="81" cy="30" rx="4" ry="3" fill="currentColor" />

                    <!-- Bulan Sabit di Kubah Utama -->
                    <g transform="translate(50,50)">
                        <path d="M-2,-8 C-4,-6 -4,-2 -2,0 C0,-2 0,-6 -2,-8 Z" fill="currentColor" />
                    </g>

                    <!-- Bulan Sabit di Menara Kiri -->
                    <g transform="translate(19,25)">
                        <path d="M-1,-3 C-2,-2 -2,-1 -1,0 C0,-1 0,-2 -1,-3 Z" fill="currentColor" />
                    </g>

                    <!-- Bulan Sabit di Menara Kanan -->
                    <g transform="translate(81,25)">
                        <path d="M-1,-3 C-2,-2 -2,-1 -1,0 C0,-1 0,-2 -1,-3 Z" fill="currentColor" />
                    </g>

                    <!-- Pintu Masjid -->
                    <path d="M45 75 Q45 70 50 70 Q55 70 55 75 L55 85 L45 85 Z" fill="rgba(255,255,255,0.3)" />

                    <!-- Jendela Kiri -->
                    <rect x="25" y="72" width="6" height="8" rx="3" fill="rgba(255,255,255,0.3)" />

                    <!-- Jendela Kanan -->
                    <rect x="69" y="72" width="6" height="8" rx="3" fill="rgba(255,255,255,0.3)" />
                </svg>
                <span class="fw-bold">Zakat Fitrah</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="#about">Tentang Zakat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="#categories">Penerima</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="{{ route('login') }}">Bayar Zakat Anda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ms-2 btn btn-primary text-white px-3" href="{{ route('login') }}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center py-5">
                <div class="col-lg-7">
                    <h1 class="display-4 fw-bold mb-3">Mengenal Zakat</h1>
                    <h2 class="h3 mb-4 text-white-50">Sucikan Harta dan Bersihkan Jiwa</h2>
                    <p class="lead mb-5">
                        Zakat merupakan salah satu rukun Islam yang menjadi kewajiban setiap muslim.
                        Dengan memberikan zakat, kita membantu mereka yang membutuhkan dan membersihkan
                        harta kita dari hal yang tidak berkah.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#calculator" class="btn btn-primary btn-lg d-inline-flex align-items-center">
                            Bayar Zakat Anda
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="ms-2">
                                <path d="M5 12h14M12 5l7 7-7 7" />
                            </svg>
                        </a>
                        <a href="#about" class="btn btn-outline-light btn-lg">Pelajari Lebih Lanjut</a>
                    </div>
                </div>
                <div class="col-lg-5 mt-5 mt-lg-0">
                    <div class="position-relative">
                        <div class="bg-white p-4 p-md-5 rounded-3 shadow-lg">
                            <h3 class="h4 text-primary mb-4">Mulai Bayar Zakat</h3>
                            <p class="text-muted mb-4">
                                Bayar zakat Anda secara online dengan mudah dan aman. Dana Anda akan disalurkan kepada
                                yang berhak menerimanya.
                            </p>
                            <button class="btn btn-primary w-100">
                                <a href="{{ route('login') }}" class="text-white text-decoration-none">Bayar
                                    Sekarang</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section py-6">
        <br>
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="display-5 mb-3">Apa itu <span class="text-primary">Zakat</span>?</h2>
                    <div class="divider"></div>
                    <p class="lead mb-0">
                        Zakat merupakan rukun Islam ketiga, yang merupakan kewajiban untuk memberikan sebagian
                        harta seseorang untuk amal. Zakat merupakan bentuk ibadah dan penyucian diri.
                    </p>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-7">
                    <p class="mb-4">
                        Dalam bahasa Arab, Zakat berarti "pemurnian" dan "pertumbuhan." Dengan memberikan Zakat,
                        umat Islam memurnikan dosa kekayaan mereka dan memfasilitasi pertumbuhannya secara spiritual.
                        Zakat dihitung sebesar 2,5% dari total tabungan dan kekayaan umat Islam yang telah mereka miliki
                        selama satu tahun penuh.
                    </p>
                    <p>
                        Tujuan Zakat adalah untuk mengurangi ketimpangan dan menumbuhkan rasa persaudaraan dan
                        solidaritas di antara umat Islam, sekaligus mengingatkan individu bahwa kekayaan mereka adalah
                        berkah dari Allah yang harus dibagikan kepada mereka yang kurang beruntung.
                    </p>
                </div>
                <div class="col-md-5">
                    <div class="ratio ratio-16x9 rounded-3 overflow-hidden shadow-sm">
                        <img src="{{ asset('assets/img/foto1.jpg') }}" alt="Muslim people praying"
                            class="img-fluid object-fit-cover" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card border-0 h-100 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <div class="zakat-category-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20" />
                                </svg>
                            </div>
                            <h3 class="h5 mb-3">Rukun Islam</h3>
                            <p class="text-muted mb-0">Zakat merupakan rukun Islam ketiga, yang menjadi kewajiban bagi
                                setiap muslim yang memenuhi syarat.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card border-0 h-100 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <div class="zakat-category-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                                </svg>
                            </div>
                            <h3 class="h5 mb-3">2.5% dari Harta</h3>
                            <p class="text-muted mb-0">Zakat dihitung sebesar 2,5% dari total tabungan dan kekayaan
                                umat Islam yang telah mereka miliki selama satu tahun penuh.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card border-0 h-100 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <div class="zakat-category-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" />
                                </svg>
                            </div>
                            <h3 class="h5 mb-3">Pembersihan Harta</h3>
                            <p class="text-muted mb-0">Dengan memberikan Zakat, umat Islam menyucikan harta mereka dan
                                membersihkan jiwa dari sifat kikir dan cinta dunia.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card border-0 h-100 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <div class="zakat-category-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" />
                                </svg>
                            </div>
                            <h3 class="h5 mb-3">Solidaritas Sosial</h3>
                            <p class="text-muted mb-0">Tujuan Zakat adalah untuk mengurangi ketimpangan dan menumbuhkan
                                rasa persaudaraan dan solidaritas di antara umat Islam.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </section>

    <!-- Categories Section -->
    <section id="categories" class="py-6 bg-light">
        <br>
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="display-5 mb-3">Delapan <span class="text-primary">Kategori</span> yang Berhak Menerima
                        Zakat</h2>
                    <div class="divider"></div>
                    <p class="lead mb-0">
                        Berdasarkan Firman Allah (Surah At-Taubah 9:60)
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card category-card border-0 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <div class="zakat-category-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 12V7H5a2 2 0 0 1 0-4h14v4" />
                                    <path d="M3 5v14a2 2 0 0 0 2 2h16v-5" />
                                    <path d="M18 12a2 2 0 0 0 0 4h4v-4Z" />
                                </svg>
                            </div>
                            <h3 class="h5 mb-3">Fakir</h3>
                            <p class="text-muted mb-0 small">Seseorang yang tidak memiliki sumber penghasilan apapun
                                yang disebabkan oleh masalah berat, seperti sakit dan tertimpa musibah</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card category-card border-0 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <div class="zakat-category-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M22 17h-1l-2-3h-1l2 3h-1l-2-3h-1l2 3h-1l-2-3h-1l2 3h-1l-2-3h-1l2 3h-1l-2-3H7l2 3H8l-2-3H5l2 3H6l-2-3H3l2 3H2" />
                                    <path d="M19 17V5c0-1.1-.9-2-2-2H7c-1.1 0-2 .9-2 2v12" />
                                </svg>
                            </div>
                            <h3 class="h5 mb-3">Miskin</h3>
                            <p class="text-muted mb-0 small">Seseorang yang memiliki sumber penghasilan, namun tidak
                                cukup untuk memenuhi kebutuhan sehari-hari</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card category-card border-0 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <div class="zakat-category-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <rect width="20" height="14" x="2" y="3" rx="2" />
                                    <line x1="8" x2="16" y1="21" y2="21" />
                                    <line x1="12" x2="12" y1="17" y2="21" />
                                </svg>
                            </div>
                            <h3 class="h5 mb-3">Amil</h3>
                            <p class="text-muted mb-0 small">Orang yang menguruskan zakat dari penerimaan zakat hingga
                                pembagian zakat</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card category-card border-0 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <div class="zakat-category-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                    <circle cx="9" cy="7" r="4" />
                                    <line x1="19" x2="19" y1="8" y2="14" />
                                    <line x1="22" x2="16" y1="11" y2="11" />
                                </svg>
                            </div>
                            <h3 class="h5 mb-3">Muallaf</h3>
                            <p class="text-muted mb-0 small">Orang yang baru memeluk agama Islam untuk menopang
                                solidaritas sesama umat muslim</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card category-card border-0 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <div class="zakat-category-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10" />
                                    <path d="M8 11h8" />
                                    <path d="M12 15V7" />
                                </svg>
                            </div>
                            <h3 class="h5 mb-3">Riqab</h3>
                            <p class="text-muted mb-0 small">Biasanya disebut dengan hamba sahaya atau budak
                                melarikannya</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card category-card border-0 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <div class="zakat-category-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" />
                                </svg>
                            </div>
                            <h3 class="h5 mb-3">Gharim</h3>
                            <p class="text-muted mb-0 small">Orang yang memiliki utang tetapi kesulitan untuk
                                melunasinya</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card category-card border-0 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <div class="zakat-category-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20" />
                                    <path d="M2 12h20" />
                                </svg>
                            </div>
                            <h3 class="h5 mb-3">Fii Sabilillah</h3>
                            <p class="text-muted mb-0 small">Orang yang berjuang di jalan Allah atau pejuang agama
                                Islam</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card category-card border-0 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <div class="zakat-category-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="m9 12 2 2 4-4" />
                                </svg>
                            </div>
                            <h3 class="h5 mb-3">Ibnu Sabil</h3>
                            <p class="text-muted mb-0 small">Orang yang kehabisan bekal ketika melakukan perjalanan
                                jauh</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </section>


    <!-- CTA Section -->
    <section id="calculator" class="cta-section py-6">
        <br>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-8 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="text-white opacity-25 mb-4">
                        <rect x="4" y="2" width="16" height="20" rx="2" />
                        <line x1="8" x2="16" y1="6" y2="6" />
                        <line x1="8" x2="16" y1="10" y2="10" />
                        <line x1="8" x2="12" y1="14" y2="14" />
                    </svg>
                    <h2 class="display-5 mb-4 text-white">Siap Menunaikan Kewajiban Zakat Anda?</h2>
                    <p class="lead text-white opacity-75 mb-5">
                        Bayar zakat Anda dengan mudah dan cepat melalui aplikasi kami.
                    </p>
                    <button class="btn btn-light btn-lg d-inline-flex align-items-center text-primary fw-bold">
                        <a href="{{ route('login') }}" class="text-blue text-decoration-none">Bayar Zakat Anda Sekarang</a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="ms-2">
                            <path d="M5 12h14M12 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <br>
    </section>

    <!-- Footer -->
    <footer id="contact" class="footer pt-6 pb-4">
        <br>
        <br>
        <div class="container">
            <div class="row justify-content-center mb-5">
                <!-- Brand Section -->
                <div class="col-lg-5 col-md-8 text-center mb-4 mb-lg-0">
                    <div class="d-flex align-items-center justify-content-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 100 100"
                            fill="none" class="me-2">
                            <!-- Base Masjid -->
                            <rect x="20" y="60" width="60" height="30" fill="currentColor" opacity="0.8" />

                            <!-- Kubah Utama -->
                            <ellipse cx="50" cy="60" rx="20" ry="12"
                                fill="currentColor" />

                            <!-- Kubah Kecil Kiri -->
                            <ellipse cx="30" cy="65" rx="8" ry="5"
                                fill="currentColor" opacity="0.9" />

                            <!-- Kubah Kecil Kanan -->
                            <ellipse cx="70" cy="65" rx="8" ry="5"
                                fill="currentColor" opacity="0.9" />

                            <!-- Menara Kiri -->
                            <rect x="15" y="30" width="8" height="35" fill="currentColor" />
                            <ellipse cx="19" cy="30" rx="4" ry="3"
                                fill="currentColor" />

                            <!-- Menara Kanan -->
                            <rect x="77" y="30" width="8" height="35" fill="currentColor" />
                            <ellipse cx="81" cy="30" rx="4" ry="3"
                                fill="currentColor" />

                            <!-- Bulan Sabit di Kubah Utama -->
                            <g transform="translate(50,50)">
                                <path d="M-2,-8 C-4,-6 -4,-2 -2,0 C0,-2 0,-6 -2,-8 Z" fill="currentColor" />
                            </g>

                            <!-- Bulan Sabit di Menara Kiri -->
                            <g transform="translate(19,25)">
                                <path d="M-1,-3 C-2,-2 -2,-1 -1,0 C0,-1 0,-2 -1,-3 Z" fill="currentColor" />
                            </g>

                            <!-- Bulan Sabit di Menara Kanan -->
                            <g transform="translate(81,25)">
                                <path d="M-1,-3 C-2,-2 -2,-1 -1,0 C0,-1 0,-2 -1,-3 Z" fill="currentColor" />
                            </g>

                            <!-- Pintu Masjid -->
                            <path d="M45 75 Q45 70 50 70 Q55 70 55 75 L55 85 L45 85 Z" fill="rgba(255,255,255,0.3)" />

                            <!-- Jendela Kiri -->
                            <rect x="25" y="72" width="6" height="8" rx="3"
                                fill="rgba(255,255,255,0.3)" />

                            <!-- Jendela Kanan -->
                            <rect x="69" y="72" width="6" height="8" rx="3"
                                fill="rgba(255,255,255,0.3)" />
                        </svg>
                        <h4 class="mb-0 text-white">Zakat Fitrah</h4>
                    </div>
                    <p class="text-white-50 mb-4 mx-auto" style="max-width: 400px;">
                        Web aplikasi Zakat Fitrah untuk membantu Anda dalam proses pengelolaan zakat fitrah yang amanah.
                    </p>
                    <div class="d-flex gap-3 justify-content-center">
                        <a href="#" class="text-white-50 hover-text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                            </svg>
                        </a>
                        <a href="#" class="text-white-50 hover-text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z" />
                            </svg>
                        </a>
                        <a href="#" class="text-white-50 hover-text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Links Section -->
                <div class="col-lg-3 col-md-6 text-center text-lg-start">
                    <h5 class="text-white mb-4">Link</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a href="#home" class="text-white-50 text-decoration-none hover-text-white">Beranda</a>
                        </li>
                        <li class="mb-2">
                            <a href="#about" class="text-white-50 text-decoration-none hover-text-white">Tentang
                                Zakat</a>
                        </li>
                        <li class="mb-2">
                            <a href="#categories" class="text-white-50 text-decoration-none hover-text-white">Penerima
                                Zakat</a>
                        </li>
                        <li class="mb-2">
                            <a href="#calculator" class="text-white-50 text-decoration-none hover-text-white">Bayar
                                Zakat</a>
                        </li>
                    </ul>
                </div>
            </div>

            <hr class="border-secondary">

            <div class="row">
                <div class="col">
                    <p class="text-center text-white-50 small mb-0">
                        © {{ date('Y') }} Zakat Fitrah. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar-custom');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (!targetId) return;

                const targetElement = document.querySelector(targetId);
                if (!targetElement) return;

                window.scrollTo({
                    top: targetElement.getBoundingClientRect().top + window.scrollY - 80,
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>

</html>
