<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="container mt-4">
        <h1 class="text-3xl font-semibold mb-4">Selamat datang, Admin!</h1>
        <p class="text-lg">Ini adalah dashboard admin, Anda dapat mengelola buku, kategori, dan pesanan di sini.</p>

        <div class="mt-6 grid grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-medium">Jumlah Buku</h2>
                <p class="text-2xl font-bold">{{ $jumlahBuku }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-medium">Jumlah Kategori</h2>
                <p class="text-2xl font-bold">{{ $jumlahKategori }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-medium">Pesanan Pending</h2>
                <p class="text-2xl font-bold">{{ $jumlahPesanan }}</p>
            </div>
        </div>
    </div>
@endsection
