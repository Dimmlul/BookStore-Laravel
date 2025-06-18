# Dokumentasi Proyek

Proyek ini adalah aplikasi toko buku yang dibangun dengan Laravel dan menggunakan database MySQL. Berikut adalah petunjuk untuk menyiapkan aplikasi, menginstal dependensi, dan menjalankan aplikasi dengan data baru.

## Changelog

* **6/5/2025** - Setup awal.
* **18/6/2025** - Work in Progress (WIP).

---

## Petunjuk Setup

Ikuti langkah-langkah di bawah ini untuk menyiapkan lingkungan lokal Anda dan menjalankan aplikasi.

### 1. Clone Repository

Jika Anda belum meng-clone repository, Anda bisa melakukannya dengan menggunakan perintah:

```bash
git clone https://github.com/Dimmlul/BookStore-Laravel.git
```

### 2. Install Dependensi Composer

Jalankan perintah berikut untuk menginstal dependensi PHP yang dibutuhkan:

```bash
composer install
```

### 3. Install Dependensi NPM

Untuk dependensi frontend, jalankan perintah:

```bash
npm install
```

### 4. Siapkan File Environment

Buat file `.env` dengan menyalin file `.env.example`:

```bash
cp .env.example .env
```

### 5. Generate Application Key

Generate application key dengan perintah:

```bash
php artisan key:generate
```

### 6. Jalankan Migrasi dan Seed Database

Untuk mereset database, menghapus semua tabel, dan mengisi dengan data baru, jalankan perintah:

```bash
php artisan migrate:fresh --seed
```

Perintah ini akan:

* Menghapus semua tabel di database.
* Menjalankan kembali semua migrasi.
* Mengisi database dengan data yang didefinisikan dalam `DatabaseSeeder`.

### 7. Jalankan Server Pengembangan Vite

Untuk menjalankan Vite untuk aset frontend dengan Tailwind CSS, gunakan perintah berikut:

```bash
npm run dev
```

Perintah ini akan:

* Mengompilasi dan memantau perubahan pada aset frontend.
* Secara otomatis memperbarui halaman tanpa perlu memuat ulang sepenuhnya saat pengembangan.

### 8. Jalankan Aplikasi

Terakhir, mulai server pengembangan Laravel:

```bash
php artisan serve
```

Secara default, aplikasi akan tersedia di `http://127.0.0.1:8000`.

---

## Fitur

* **Autentikasi Pengguna**: Pendaftaran, Login, dan Pengelolaan Profil.
* **Pengelolaan Buku**: Admin dapat mengelola buku, kategori, dan pesanan.
* **Keranjang Belanja**: Pengguna dapat menambahkan buku ke keranjang, memperbarui jumlah, dan melanjutkan ke proses checkout.

---

## Catatan

* Pastikan file `.env` Anda dikonfigurasi dengan benar untuk database.
* Aplikasi ini menggunakan **Tailwind CSS** untuk styling dan **Vite** untuk kompilasi aset frontend.
* Proyek ini sedang dalam pengembangan aktif, jadi fitur baru dan perbaikan akan ditambahkan.

---
