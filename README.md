### Website Book Author App

#### Deskripsi Website

Website ini dibangun menggunakan Laravel 10 untuk mengelola data buku dan pengarang. Website ini memungkinkan pengguna untuk melakukan operasi CRUD (Create, Read, Update, Delete) terhadap data pengarang dan buku. Selain itu, menggunakan JavaScript untuk meningkatkan interaktivitas antarmuka pengguna.

#### Fitur Utama

1. **CRUD Pengarang**
   - Tambahkan, lihat, edit, dan hapus pengarang.
2. **CRUD Buku**

   - Tambahkan, lihat, edit, dan hapus buku. Setiap buku terkait dengan satu pengarang menggunakan relasi One-to-Many.

3. **Validasi Data**

   - Validasi data di sisi server untuk memastikan keakuratan informasi yang disimpan.

4. **Interaksi JavaScript**

   - Konfirmasi sebelum menghapus data.
   - Penghapusan data tanpa perlu me-refresh halaman.

5. **Desain Responsif**
   - Menggunakan Bootstrap untuk desain yang rapi dan responsif.

#### Instalasi dan Penggunaan

1. **Instalasi Laravel 10**

   - Clone repositori ini.
   - Jalankan `composer install` untuk menginstal dependensi Laravel.
   - Salin file `.env.example` menjadi `.env` dan atur koneksi database.

2. **Migrasi Database**

   - Jalankan `php artisan migrate:fresh --seed` untuk membuat struktur tabel di database.

3. **Menjalankan Aplikasi**
   - Jalankan `php artisan serve` untuk memulai server lokal.
   - Akses aplikasi melalui browser di `http://localhost:8000`.

Created By : Muhammad Zhafran Ammar

