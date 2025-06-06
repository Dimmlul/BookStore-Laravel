<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Keranjang;
use App\Models\Pesanan;
use App\Models\IsiKeranjang;
use App\Models\IsiPesanan;

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

        // Seeder untuk Buku
        Buku::create([
            'judul' => 'Novel Pertama',
            'penulis' => 'Penulis A',
            'harga' => 100000,
            'bahasa' => 'Indonesia',
            'deskripsi' => 'Deskripsi buku fiksi pertama.',
            'stok' => 10,
            'ISBN' => '123-4567890123',
            'kategori_id' => $kategori1->id,
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
    }
}
