<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;
use App\Models\Book;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderDetail;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Seeder untuk Users
        User::create([
            'username' => 'Admin User',
            'email' => 'admin@bookstore.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'username' => 'Customer User',
            'email' => 'customer@bookstore.com',
            'password' => Hash::make('customer123'),
            'role' => 'user',
        ]);

        // Seeder untuk Categories
        Category::create(['nama_kategori' => 'Fiction']);
        Category::create(['nama_kategori' => 'Non-Fiction']);
        Category::create(['nama_kategori' => 'Science']);
        Category::create(['nama_kategori' => 'Fantasy']);
        Category::create(['nama_kategori' => 'Biography']);

        // Seeder untuk Books
        Book::create([
            'judul' => 'The Great Adventure',
            'penulis' => 'John Doe',
            'harga' => 10000,
            'stok' => 50,
            'deskripsi' => 'A thrilling adventure book.',
            'kategori_id' => 1,
            'gambar' => 'book1.jpg',
        ]);

        Book::create([
            'judul' => 'Science and You',
            'penulis' => 'Jane Smith',
            'harga' => 15000,
            'stok' => 30,
            'deskripsi' => 'A scientific approach to everyday life.',
            'kategori_id' => 3,
            'gambar' => 'book2.jpg',
        ]);

        Book::create([
            'judul' => 'Fantasy World',
            'penulis' => 'Mark Twain',
            'harga' => 20000,
            'stok' => 10,
            'deskripsi' => 'An epic fantasy journey.',
            'kategori_id' => 4,
            'gambar' => 'book3.jpg',
        ]);

        // Seeder untuk Carts
        Cart::create([
            'user_id' => 1, // Admin
            'status' => 'draft',
        ]);

        Cart::create([
            'user_id' => 2, // Customer
            'status' => 'checkout',
        ]);

        // Seeder untuk CartItems
        CartItem::create([
            'cart_id' => 1, // Cart untuk admin
            'book_id' => 1, // Buku dengan ID 1
            'quantity' => 2,
            'subtotal' => 20000,
        ]);

        CartItem::create([
            'cart_id' => 2, // Cart untuk customer
            'book_id' => 2, // Buku dengan ID 2
            'quantity' => 1,
            'subtotal' => 15000,
        ]);

        // Seeder untuk Orders
        Order::create([
            'cart_id' => 1,
            'user_id' => 1,
            'alamat_pengiriman' => 'Jl. Admin No. 1',
            'status' => 'pending',
            'metode_pembayaran' => 'COD', // Payment method
        ]);

        Order::create([
            'cart_id' => 2,
            'user_id' => 2,
            'alamat_pengiriman' => 'Jl. Customer No. 2',
            'status' => 'delivered',
            'metode_pembayaran' => 'Cashless', // Payment method
        ]);

        // Seeder untuk OrderDetails
        OrderDetail::create([
            'order_id' => 1, // Order dengan ID 1
            'book_id' => 1,  // Buku dengan ID 1
            'quantity' => 2,
            'price' => 10000,
            'subtotal' => 20000,
        ]);

        OrderDetail::create([
            'order_id' => 2, // Order dengan ID 2
            'book_id' => 2,  // Buku dengan ID 2
            'quantity' => 1,
            'price' => 15000,
            'subtotal' => 15000,
        ]);
    }
}
