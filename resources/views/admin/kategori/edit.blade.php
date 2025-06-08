<!-- resources/views/admin/kategori/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('sidebar')
    @include('admin.sidebar') <!-- Sidebar khusus admin -->
@endsection

@section('content')
    <div class="container mt-4">
        <h1>Edit Kategori</h1>

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

        <!-- Form untuk mengedit kategori -->
        <form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Laravel menggunakan PUT untuk update -->

            <div class="mb-3">
                <label for="kategori_buku" class="form-label">Nama Kategori Buku</label>
                <input type="text" class="form-control" id="kategori_buku" name="kategori_buku"
                    value="{{ $kategori->kategori_buku }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Kategori</button>
        </form>

        <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Kategori</a>
    </div>
@endsection
