<!-- resources/views/admin/kategori/index.blade.php -->

@extends('layouts.admin')

@section('title', 'Daftar Kategori')

@section('sidebar')
    @include('admin.sidebar') <!-- Sidebar khusus admin -->
@endsection

@section('content')
    <div class="container mt-6">
        <h1 class="text-2xl font-semibold mb-4">Daftar Kategori</h1>

        <!-- Menampilkan pesan sukses -->
        @if (session('success'))
            <div class="bg-green-600 text-white p-3 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tombol Tambah Kategori -->
        <a href="{{ route('admin.kategori.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 mb-4 inline-block">Tambah Kategori</a>

        <!-- Tabel Daftar Kategori -->
        <div class="overflow-x-auto bg-white p-6 rounded-lg shadow-md">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="px-6 py-4">ID</th>
                        <th class="px-6 py-4">Nama Kategori</th>
                        <th class="px-6 py-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategori as $item)
                        <tr class="border-t">
                            <td class="px-6 py-4">{{ $item->id }}</td>
                            <td class="px-6 py-4">{{ $item->kategori_buku }}</td>
                            <td class="px-6 py-4 flex space-x-2">
                                <!-- Edit Button -->
                                <a href="{{ route('admin.kategori.edit', $item->id) }}"
                                    class="text-blue-600 hover:text-blue-800">Edit</a>
                                |
                                <!-- Delete Form -->
                                <form action="{{ route('admin.kategori.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
