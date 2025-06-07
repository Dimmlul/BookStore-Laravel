<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('sidebar')
    @include('admin.sidebar') <!-- Sidebar khusus admin -->
@endsection

@section('content')
    <div class="container mt-4">
        <h1>Selamat datang, Admin!</h1>
        <p>Ini adalah dashboard admin, Anda dapat mengelola buku, kategori, dan pesanan di sini.</p>

        <div class="row">
            <!-- Menampilkan jumlah buku -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Buku</h5>
                        <p class="card-text">{{ $jumlahBuku }} buku di dalam sistem.</p>
                    </div>
                </div>
            </div>

            <!-- Menampilkan jumlah kategori -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Kategori</h5>
                        <p class="card-text">{{ $jumlahKategori }} kategori buku yang tersedia.</p>
                    </div>
                </div>
            </div>

            <!-- Menampilkan jumlah pesanan yang perlu diproses -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Pesanan</h5>
                        <p class="card-text">{{ $jumlahPesanan }} pesanan yang perlu diproses.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
