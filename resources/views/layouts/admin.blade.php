@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('sidebar')
    @include('admin.sidebar') <!-- Sidebar khusus admin -->
@endsection

@section('content')
    <div class="container mt-4">
        <h1>Selamat datang, Admin!</h1>
        <p>Ini adalah dashboard admin, Anda dapat mengelola buku, kategori, dan pesanan di sini.</p>
    </div>
@endsection
