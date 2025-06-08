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
    BukuController as UserBukuController,
    KeranjangController,
    PesananController as UserPesananController,
    PesanController as UserPesanController
};

// =============================
// 🔓 RUTE AUTENTIKASI
// =============================
// Menangani rute untuk login dan registrasi, hanya untuk pengunjung yang belum login
Route::middleware('guest')->group(function () {
    // Menampilkan form login
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    // Proses login menggunakan POST
    Route::post('/login', [AuthController::class, 'login']);
    // Menampilkan form registrasi
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    // Proses registrasi menggunakan POST
    Route::post('/register', [AuthController::class, 'register']);
});

// Logout route, hanya bisa diakses jika pengguna sudah login
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// =============================
// 🧑‍💼 RUTE ADMIN
// =============================
// Menangani rute untuk admin, hanya dapat diakses oleh admin yang sudah login
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Rute untuk menampilkan dashboard admin
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');

    // Rute untuk mengelola buku, kategori, pesanan, pesan, dan pengguna
    Route::resource('buku', AdminBukuController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('pesanan', AdminPesananController::class)->only(['index', 'show']);
    // Rute untuk mengubah status pesanan
    Route::post('pesanan/{id}/status', [AdminPesananController::class, 'editStatus'])->name('pesanan.editStatus');
    // Menampilkan daftar pesan
    Route::get('pesan', [AdminPesanController::class, 'index'])->name('pesan.index');

    // Menampilkan detail pesan
    Route::get('pesan/{id}', [AdminPesanController::class, 'show'])->name('pesan.show');
    // Menyimpan balasan pesan
    Route::post('pesan/{id}/balas', [AdminPesanController::class, 'reply'])->name('pesan.reply');
    Route::resource('pengguna', PenggunaController::class)->only(['index', 'show']);
});

// =============================
// 👤 RUTE USER
// =============================
// Menangani rute untuk user, hanya dapat diakses oleh pengguna biasa yang sudah login
Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
    // Rute untuk menampilkan dashboard user
    Route::get('home', [UserController::class, 'index'])->name('home');
    // Rute untuk melihat dan mengedit profil user
    Route::get('profile', [UserController::class, 'profile'])->name('profile');

    // Rute untuk melihat daftar buku dan detail buku
    Route::resource('buku', UserBukuController::class)->only(['index', 'show']);
    // Rute untuk melihat keranjang user
    Route::resource('keranjang', KeranjangController::class)->only(['index']);
    // Rute untuk melihat dan mengelola pesanan user
    Route::resource('pesanan', UserPesananController::class)->only(['index', 'create', 'store', 'show']);
    // Rute untuk mengirim pesan dari user
    Route::resource('pesan', UserPesanController::class)->only(['index', 'create', 'store', 'show']);
});

// =============================
// 🌐 RUTE PUBLIK / Guest
// =============================
// Menangani rute untuk halaman publik yang bisa diakses oleh semua
Route::get('/', function () {
    if (Auth::check()) {
        // Jika user sudah login, periksa peran (role) user
        $role = Auth::user()->role;

        if ($role === 'admin') {
            // Redirect ke dashboard admin jika user adalah admin
            return redirect()->route('admin.dashboard');
        } elseif ($role === 'user') {
            // Redirect ke dashboard user jika user adalah pengguna biasa
            return redirect()->route('user.dashboard');
        }
    }

    // Jika tidak ada user yang login, redirect ke halaman login
    return redirect()->route('login');
});

// Halaman statis tentang dan kontak yang bisa diakses oleh siapa aja
Route::view('/tentang', 'static.tentang')->name('tentang');
Route::view('/kontak', 'static.kontak')->name('kontak');
