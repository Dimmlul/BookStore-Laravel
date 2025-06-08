<!-- resources/views/admin/buku/index.blade.php -->
@extends('layouts.admin')

@section('title', 'Daftar Buku')

@section('content')
    <div class="container mt-6">
        <h1 class="text-2xl font-semibold mb-4">Daftar Buku</h1>
        <a href="{{ route('admin.buku.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 mb-4 inline-block">Tambah Buku</a>

        <!-- Tabel Daftar Buku -->
        <div class="overflow-x-auto bg-white p-6 rounded-lg shadow-md">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="px-6 py-4">Gambar</th>
                        <th class="px-6 py-4">Judul</th>
                        <th class="px-6 py-4">Penulis</th>
                        <th class="px-6 py-4">Harga</th>
                        <th class="px-6 py-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buku as $bukuItem)
                        <tr class="border-t">
                            <td class="px-6 py-4">
                                @if ($bukuItem->gambar)
                                    <img src="{{ asset('storage/' . $bukuItem->gambar) }}"
                                        class="w-20 h-20 object-cover rounded-md" />
                                @else
                                    <span>No Image</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">{{ $bukuItem->judul }}</td>
                            <td class="px-6 py-4">{{ $bukuItem->penulis }}</td>
                            <td class="px-6 py-4">{{ number_format($bukuItem->harga, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 flex space-x-2">
                                <a href="{{ route('admin.buku.edit', $bukuItem->id) }}"
                                    class="text-blue-600 hover:text-blue-800">Edit</a>
                                |
                                <form action="{{ route('admin.buku.destroy', $bukuItem->id) }}" method="POST"
                                    style="display:inline;">
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
