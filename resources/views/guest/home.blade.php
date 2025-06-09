@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="text-center py-10">
            <h1 class="text-3xl font-semibold">Selamat datang di Toko Buku</h1>
            <p>Kami menyediakan berbagai buku untuk memenuhi kebutuhan bacaan Anda.</p>
        </div>

        <!-- Daftar Buku -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            {{-- @foreach ($buku as $buku)
                <!-- Menampilkan setiap buku menggunakan komponen card -->
                <x-book-card :buku="$buku" /> <!-- Passing each buku to the book-card component -->
            @endforeach --}}
        </div>
    </div>
@endsection
