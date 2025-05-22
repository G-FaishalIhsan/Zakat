<h2 id="tentang">🕌 Web Zakat Fitrah</h2>

Website ini berperan sebagai tempat pembayaran dan pendataaan zakat
fitrah di masing masing daerah DKM Indonesia. Disini Terdapat banyak sekali fitur yang membantu mendigitalisasi pembayaran zakat di daerah daerah Indonesia.

<p></p>

<h2 id="fitur">✨ Fitur Tersedia</h2>

- Landing Page dan Autentikasi
  - Halaman Awal
  - Autentikasi [daftar dan login]
- Pengelolaan Data Muzakki
  - Tambah Data Muzakki
  - Update dan Hapus data Muzakki
  - Data Laporan Muzakki
- Pengelolaan Data Mustahik
  - Tambah Data Mustahik
  - Update dan Hapus data Mustahik
  - Data Laporan Mustahik
- Pengelolaan Data Kategori Mustahik
  - Tambah Data Kategori
- Fitur Report
  - Laporan Pengumpulan
  - Laporan Distribusi
- Fitur Pembayaran dan Pendistribusian Zakat
  - Pengumpulan Zakat
  - Distribusi Zakat

<p></p>

<h2 id="demo">🏠 Halaman Demo</h2>

Halaman demo saat ini tidak ada, oleh karena itu baiknya anda coba di local dengan menutur tahapan dibawah instalasi dibawah ini

<p></p>

<h2 id="syarat">💾 Prasyarat yang Diperlukan</h2>

Berikut adalah daftar layanan dan aplikasi yang wajib dan diperlukan selama anda menjalankan aplikasi learnify jika anda belum menginstall nya maka disarankan untuk menginstall nya terlebih dahulu

- PHP 8 & Web Server [XAMPP, LAMPP, MAMP]
- Web Browser [Chrome, Firefox, Safari & Opera]
- Internet [Karena menggunakan banyak CDN]

<p></p>

<h2 id="download">🐱‍💻 Panduan Menjalankan & Install Aplikasi</h2>

Untuk menjalankan aplikasi atau web ini kamu harus install XAMPP atau web server lain dan mempunyai setidaknya satu web browser yang terinstall di komputer anda.

```bash
# Clone repository ini atau download di
$ git clone https://github.com/G-FaishalIhsan/Zakat.git

# Kemudian jalankan command composer install, ini akan menginstall resources yang laravel butuhkan
$ composer install

# Install Composer PDF 
$ composer require phpoffice/phpword 

# Install Composer PDF 
$ composer require barryvdh/laravel-dompdf 

# Lakukan copy .env dengan cara ketik command seperti dibawah 
$ cp .env.example .env

# Generate key juga jangan lupa dengan command dibawah
$ php artisan key:generate

# Jangan lupa migrate database dengan cara membuat database di phpmyadmin atau aplikasi lainnya yang kalian pakai,
# lalu jangan lupa untuk mengganti variable DB_DATABASE di file .env yang di folder project
$ php artisan migrate:fresh --seed

# Lalu jalankan aplikasi kalian dengan command dibawah
$ php artisan serve

# Selamat aplikasi dapat anda nikmati di local!
```

<h2 id="Login">🤝 Login & Register</h2>

Setelah melakukan migrate pada database, sekarang daftarkan akun Anda melalui halaman Register untuk mulai menjelajahi aplikasi ini!
Proses pendaftaran cepat dan mudah — cukup isi beberapa informasi dasar, dan akun Anda siap digunakan.

Sudah punya akun? Langsung saja menuju halaman Login untuk masuk dan mulai menggunakan semua fitur yang tersedia.

💡 Pastikan database Anda telah terhubung dengan benar agar proses autentikasi berjalan lancar.

<p></p>