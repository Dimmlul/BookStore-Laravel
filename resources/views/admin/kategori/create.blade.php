<!-- resources/views/admin/kategori/create.blade.php -->

@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('sidebar')
    @include('admin.sidebar') <!-- Sidebar khusus admin -->
@endsection

@section('content')
    <div class="container mt-4">
        <h1>Tambah Kategori</h1>

        <!-- Menampilkan pesan error jika ada -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form untuk menambah kategori -->
        <form action="{{ route('admin.kategori.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="kategori_buku" class="form-label">Nama Kategori Buku</label>
                <input type="text" class="form-control" id="kategori_buku" name="kategori_buku" required>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Kategori</button>
        </form>

        <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Kategori</a>
    </div>
@endsection
