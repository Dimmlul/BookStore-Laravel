<!-- resources/views/user/home.blade.php -->
@extends('layouts.user')

@section('title', 'User Dashboard')

@section('content')
    <div class="container mt-4">
        <h1>Selamat datang, {{ $user->name }}!</h1>
        <p>Ini adalah dashboard pengguna, Anda dapat melihat daftar buku, pesanan, dan lainnya.</p>
    </div>
@endsection
