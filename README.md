# Algoora - Toko Top-Up Game dan E-Money

**Algoora** adalah toko online untuk top-up game dan layanan e-money yang menyediakan pengisian saldo cepat dan mudah untuk berbagai game populer dan layanan e-money. Dengan interface yang minimalis dan fokus pada fungsi, Algoora memberikan pengalaman transaksi yang nyaman dan cepat untuk pelanggan.

## Fitur Utama

-   **Top-Up Game**: Pengisian saldo instan untuk berbagai game populer seperti Mobile Legends, Free Fire, dan Honor of Kings.
-   **Top-Up E-Money**: Isi ulang saldo e-money dengan cepat untuk layanan Dana, OVO, ShopeePay, dan Grab.
-   **Transaksi Mudah dan Aman**: Menggunakan teknologi terbaru untuk keamanan dan kemudahan dalam setiap transaksi.

## Teknologi dan Integrasi

-   **Laravel**: Framework PHP untuk pengembangan backend dan frontend.
-   **Google OAuth**: Autentikasi sosial dengan Google untuk kemudahan login pengguna.
-   **EmailJS**: Mengirimkan notifikasi email langsung dari frontend.
-   **Mailtrap**: Notifikasi Email admin.
-   **Fonnte**: Notifikasi WhatsApp otomatis ke pelanggan.
-   **Tawk.to**: Layanan live chat untuk komunikasi langsung.
-   **Digiflazz**: Marketplace produk digital untuk top-up game dan e-money.
-   **Tripay**: Payment gateway untuk berbagai metode pembayaran.
-   **Flowbite**: Komponen UI berbasis Tailwind CSS untuk mempercepat pengembangan frontend dan desain responsif.

## Persyaratan Sistem

-   **PHP**: Versi 8.0 atau lebih tinggi
-   **MySQL**: Database
-   **Composer**: Pengelola dependensi PHP
-   **Node.js dan NPM**: Untuk dependensi frontend (jika menggunakan Vite)

## Cara Instalasi

Ikuti langkah-langkah di bawah ini untuk menginstal proyek di lokal Anda.

### Clone Repository

git clone https://github.com/razorzero0/topup-laravel

### Masuk ke Direktori

cd topup-laravel

### Instal Dependensi

composer install

### Buat File Environment

cp .env.example .env

### Konfigurasi Environment

Sesuaikan pengaturan database (nama database, username, password, dll) di file .env

### Generate App Key

php artisan key:generate

### Jalankan Migrasi Database

php artisan migrate

### Menjalankan Database Seeder

php artisan db:seed

### Link Storage

php artisan storage:link

### Menjalankan Server

php artisan serve
