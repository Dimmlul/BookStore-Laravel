<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Keranjang;
use App\Models\Pesanan;
use App\Models\IsiKeranjang;
use App\Models\IsiPesanan;
use App\Models\Pesan;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Seeder untuk User
        User::create([
            'nama' => 'Admin User',
            'email' => 'admin@bookstore.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'alamat' => 'Admin Address',
            'no_telp' => '081234567890',
        ]);

        User::create([
            'nama' => 'Customer User',
            'email' => 'customer@bookstore.com',
            'password' => Hash::make('customer123'),
            'role' => 'user',
            'alamat' => 'Customer Address',
            'no_telp' => '082345678901',
        ]);

        // Seeder untuk Kategori
        $kategori1 = Kategori::create([
            'kategori_buku' => 'Fiksi',
        ]);

        $kategori2 = Kategori::create([
            'kategori_buku' => 'Non-fiksi',
        ]);

        // Seeder untuk Buku dengan gambar (Total 10 Books)
        Buku::create([
            'judul' => 'Novel Pertama',
            'penulis' => 'Penulis A',
            'harga' => 100000,
            'bahasa' => 'Indonesia',
            'deskripsi' => 'Deskripsi buku fiksi pertama.',
            'stok' => 10,
            'ISBN' => '123-4567890123',
            'kategori_id' => $kategori1->id,
            'gambar' => 'https://i.pinimg.com/736x/d8/43/c1/d843c1b0e2a1f79c43c43b53a8f01ec0.jpg',
        ]);

        Buku::create([
            'judul' => 'Buku Sejarah',
            'penulis' => 'Penulis B',
            'harga' => 150000,
            'bahasa' => 'Indonesia',
            'deskripsi' => 'Deskripsi buku non-fiksi tentang sejarah.',
            'stok' => 5,
            'ISBN' => '987-6543210987',
            'kategori_id' => $kategori2->id,
            'gambar' => 'https://i.pinimg.com/736x/7e/87/c8/7e87c846727a7d9289acfd1f37b273bf.jpg',
        ]);

        Buku::create([
            'judul' => 'Petualangan Alam',
            'penulis' => 'Penulis C',
            'harga' => 120000,
            'bahasa' => 'Indonesia',
            'deskripsi' => 'Buku tentang petualangan alam yang luar biasa.',
            'stok' => 8,
            'ISBN' => '123-7896541230',
            'kategori_id' => $kategori1->id,
            'gambar' => 'https://i.pinimg.com/736x/77/cc/32/77cc32c3f036d97029088fa320d75980.jpg',
        ]);

        Buku::create([
            'judul' => 'Teknologi Masa Depan',
            'penulis' => 'Penulis D',
            'harga' => 200000,
            'bahasa' => 'Indonesia',
            'deskripsi' => 'Buku tentang teknologi masa depan dan perkembangan industri.',
            'stok' => 6,
            'ISBN' => '876-6549871230',
            'kategori_id' => $kategori2->id,
            'gambar' => 'https://i.pinimg.com/736x/72/4c/f3/724cf30b3fc5e2fa9d03341f8f9844a3.jpg',
        ]);

        Buku::create([
            'judul' => 'Misteri Laut Dalam',
            'penulis' => 'Penulis E',
            'harga' => 110000,
            'bahasa' => 'Indonesia',
            'deskripsi' => 'Buku tentang misteri yang ada di laut dalam.',
            'stok' => 15,
            'ISBN' => '333-8769012345',
            'kategori_id' => $kategori1->id,
            'gambar' => 'https://i.pinimg.com/736x/1d/79/2e/1d792e68ca7399e168c8eb46cd9d73c4.jpg',
        ]);

        Buku::create([
            'judul' => 'Kisah Sejarah Indonesia',
            'penulis' => 'Penulis F',
            'harga' => 180000,
            'bahasa' => 'Indonesia',
            'deskripsi' => 'Kisah sejarah Indonesia yang menginspirasi.',
            'stok' => 12,
            'ISBN' => '222-3334445556',
            'kategori_id' => $kategori2->id,
            'gambar' => 'https://i.pinimg.com/736x/52/94/76/529476b482ef57db8a194fc8393ec22d.jpg',
        ]);

        Buku::create([
            'judul' => 'Filosofi Kehidupan',
            'penulis' => 'Penulis G',
            'harga' => 130000,
            'bahasa' => 'Indonesia',
            'deskripsi' => 'Buku tentang filosofi kehidupan dan pemikiran.',
            'stok' => 10,
            'ISBN' => '987-1122334455',
            'kategori_id' => $kategori1->id,
            'gambar' => 'https://i.pinimg.com/736x/ff/36/58/ff3658fe16d2098f14de56dba767f5ae.jpg',
        ]);

        Buku::create([
            'judul' => 'Pendidikan Anak',
            'penulis' => 'Penulis H',
            'harga' => 160000,
            'bahasa' => 'Indonesia',
            'deskripsi' => 'Buku untuk membimbing pendidikan anak dengan cara yang baik.',
            'stok' => 5,
            'ISBN' => '654-9873210123',
            'kategori_id' => $kategori2->id,
            'gambar' => 'https://i.pinimg.com/736x/ff/ea/c0/ffeac03d5b190c6f5a17a2f8f9c2a20d.jpg',
        ]);

        Buku::create([
            'judul' => 'Panduan Bisnis',
            'penulis' => 'Penulis I',
            'harga' => 250000,
            'bahasa' => 'Indonesia',
            'deskripsi' => 'Buku panduan untuk sukses dalam dunia bisnis.',
            'stok' => 7,
            'ISBN' => '543-2188765432',
            'kategori_id' => $kategori2->id,
            'gambar' => 'https://i.pinimg.com/736x/a0/a7/44/a0a744a4ea9c79f1701900e07aafed49.jpg',
        ]);

        Buku::create([
            'judul' => 'Buku Inspirasi',
            'penulis' => 'Penulis J',
            'harga' => 90000,
            'bahasa' => 'Indonesia',
            'deskripsi' => 'Buku yang memberikan inspirasi untuk kehidupan.',
            'stok' => 20,
            'ISBN' => '111-0005559999',
            'kategori_id' => $kategori1->id,
            'gambar' => 'https://i.pinimg.com/736x/5a/f7/39/5af739d48d50c8cc89d1a397fc5a3028.jpg',
        ]);

        // Seeder untuk Keranjang
        $keranjang = Keranjang::create([
            'user_id' => 2, // Assuming customer user has ID 2
            'status' => 'Draft',
        ]);

        // Seeder untuk Isi Keranjang
        IsiKeranjang::create([
            'keranjang_id' => $keranjang->id,
            'buku_id' => 1, // Assuming the first book has ID 1
            'jumlah' => 2,
            'harga' => 100000,
        ]);

        // Seeder untuk Pesanan
        $pesanan = Pesanan::create([
            'user_id' => 2,
            'total_harga' => 200000,
            'metode_pembayaran' => 'Transfer',
            'bukti_pembayaran' => 'path/to/bukti.jpg',
            'status' => 'pending',
        ]);

        // Seeder untuk Isi Pesanan
        IsiPesanan::create([
            'pesanan_id' => $pesanan->id,
            'buku_id' => 1,
            'jumlah' => 2,
            'harga' => 100000,
        ]);

        // Seeder untuk Pesan (Pesan dari User ke Admin)
        Pesan::create([
            'user_id' => 2, // ID user customer
            'subjek' => 'Pertanyaan tentang buku "Novel Pertama"',
            'isi' => 'Apakah buku "Novel Pertama" masih tersedia di stok?',
            'status' => 'belum', // Status pesan
            'dikirim_pada' => now(), // Waktu pesan dikirim
            'dibalas_pada' => null, // Belum dibalas
        ]);

        Pesan::create([
            'user_id' => 2, // ID user customer
            'subjek' => 'Pertanyaan tentang metode pembayaran',
            'isi' => 'Bagaimana cara pembayaran untuk buku "Buku Sejarah"?',
            'status' => 'belum', // Status pesan
            'dikirim_pada' => now(), // Waktu pesan dikirim
            'dibalas_pada' => null, // Belum dibalas
        ]);
    }
}
