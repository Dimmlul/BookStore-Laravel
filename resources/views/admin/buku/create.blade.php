@extends('layouts.admin')

@section('title', 'Tambah Buku')

@section('sidebar')
    @include('admin.sidebar') <!-- Sidebar dengan Tailwind CSS -->
@endsection

@section('content')
    <div class="container mt-6">
        <h1 class="text-2xl font-semibold mb-4">Tambah Buku</h1>

        <form action="{{ route('admin.buku.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 gap-6">
                <!-- Input untuk judul -->
                <div class="mb-3">
                    <label for="judul" class="block text-sm font-semibold">Judul</label>
                    <input type="text" id="judul" name="judul" class="mt-1 p-2 border rounded w-full" required>
                </div>

                <!-- Input untuk penulis -->
                <div class="mb-3">
                    <label for="penulis" class="block text-sm font-semibold">Penulis</label>
                    <input type="text" id="penulis" name="penulis" class="mt-1 p-2 border rounded w-full" required>
                </div>

                <!-- Input untuk harga -->
                <div class="mb-3">
                    <label for="harga" class="block text-sm font-semibold">Harga</label>
                    <input type="number" id="harga" name="harga" class="mt-1 p-2 border rounded w-full" required>
                </div>

                <!-- Input untuk kategori -->
                <div class="mb-3">
                    <label for="kategori_id" class="block text-sm font-semibold">Kategori</label>
                    <select id="kategori_id" name="kategori_id" class="mt-1 p-2 border rounded w-full" required>
                        @foreach ($kategori as $kategoriItem)
                            <option value="{{ $kategoriItem->id }}">{{ $kategoriItem->kategori_buku }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Input untuk deskripsi -->
                <div class="mb-3">
                    <label for="deskripsi" class="block text-sm font-semibold">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" class="mt-1 p-2 border rounded w-full" required></textarea>
                </div>

                <!-- Input untuk stok -->
                <div class="mb-3">
                    <label for="stok" class="block text-sm font-semibold">Stok</label>
                    <input type="number" id="stok" name="stok" class="mt-1 p-2 border rounded w-full" required>
                </div>

                <!-- Input untuk ISBN -->
                <div class="mb-3">
                    <label for="ISBN" class="block text-sm font-semibold">ISBN</label>
                    <input type="text" id="ISBN" name="ISBN" class="mt-1 p-2 border rounded w-full" required>
                </div>

                <!-- Input untuk gambar -->
                <div class="mb-3">
                    <label for="gambar" class="block text-sm font-semibold">Gambar</label>
                    <input type="file" id="gambar" name="gambar" class="mt-1 p-2 border rounded w-full">
                </div>

                <button type="submit" class="mt-4 bg-blue-600 text-white p-2 rounded w-full hover:bg-blue-700">Tambah
                    Buku</button>
            </div>
        </form>
    </div>
@endsection
