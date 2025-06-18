<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\{
    AdminController,
    BukuController as AdminBukuController,
    KategoriController,
    PesananController as AdminPesananController,
    PesanController as AdminPesanController,
    PenggunaController
};
use App\Http\Controllers\User\{
    UserController,
    KeranjangController,
    PesananController as UserPesananController,
    PesanController as UserPesanController,
    ProfileController
};
use App\Http\Controllers\Guest\GuestController;

// =============================
// 🔓 RUTE AUTENTIKASI
// =============================
// Menangani rute untuk login dan registrasi, hanya untuk pengunjung yang belum login
Route::middleware('guest')->group(function () {
    // Login & Register
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    // Guest Home Page
    Route::get('/', [GuestController::class, 'home'])->name('guest.home');

    Route::get('/tentang', [GuestController::class, 'tentang'])->name('guest.tentang');
    Route::get('/kontak', [GuestController::class, 'kontak'])->name('guest.kontak');
});

// Logout route (for authenticated users)
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// =============================
// 🌐 RUTE PUBLIK / Guest
// =============================
// Route untuk halaman publik yang bisa diakses oleh semua orang (guest)
// Route::get('/', function () {
//     if (Auth::check()) {
//         $role = Auth::user()->role;
//         if ($role === 'admin') {
//             return redirect()->route('admin.dashboard');
//         } elseif ($role === 'user') {
//             return redirect()->route('user.home');
//         }
//     }
//     return view('guest.home');  // Default page for guests
// })->name('guest.home');

// =============================
// 🧑‍💼 RUTE ADMIN
// =============================
// Route admin yang hanya dapat diakses oleh admin yang sudah login
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard Admin
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');

    // Manage Buku, Kategori, Pesanan, Pesan, Pengguna
    Route::resource('buku', AdminBukuController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('pesanan', AdminPesananController::class)->only(['index', 'show']);
    Route::post('pesanan/{id}/status', [AdminPesananController::class, 'editStatus'])->name('pesanan.editStatus');
    Route::get('pesan', [AdminPesanController::class, 'index'])->name('pesan.index');
    Route::get('pesan/{id}', [AdminPesanController::class, 'show'])->name('pesan.show');
    Route::post('pesan/{id}/balas', [AdminPesanController::class, 'reply'])->name('pesan.reply');
    Route::resource('pengguna', PenggunaController::class)->only(['index', 'show']);
});

// =============================
// 👤 RUTE USER
// =============================
// Route untuk user yang sudah login
Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
    // Dashboard User
    Route::get('home', [UserController::class, 'index'])->name('home');

    // Profil User
    Route::get('profil', [ProfileController::class, 'profil'])->name('profil');
    Route::post('profil/update', [ProfileController::class, 'update'])->name('profil.update');

    // Keranjang User
    Route::get('keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
    Route::post('keranjang/tambah', [KeranjangController::class, 'tambah'])->name('keranjang.tambah');
    Route::delete('keranjang/{id}/hapus', [KeranjangController::class, 'hapus'])->name('keranjang.hapus');
    Route::put('keranjang/{id}/update', [KeranjangController::class, 'update'])->name('keranjang.update');

    // Checkout User
    Route::get('checkout', [UserPesananController::class, 'checkout'])->name('checkout');
    Route::post('checkout', [UserPesananController::class, 'prosesCheckout'])->name('checkout.proses');

    // Pesanan User
    Route::resource('pesanan', UserPesananController::class)->only(['index', 'show']);

    // Pesan User
    Route::resource('pesan', UserPesanController::class)->only(['index', 'create', 'store', 'show']);
});
