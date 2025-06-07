@extends('layouts.app')

@section('sidebar')
    @include('user.sidebar') <!-- Sidebar khusus user -->
@endsection

@section('content')
    <div class="container mt-4">
        @if (Auth::check())
            <!-- Check if the user is authenticated -->
            <h1>Selamat datang, {{ Auth::user()->nama }}!</h1>
        @else
            <h1>Selamat datang, pengunjung!</h1>
        @endif
        <p>Ini adalah dashboard Anda. Anda dapat melihat pesanan, menambah buku ke keranjang, dll.</p>
    </div>
@endsection
