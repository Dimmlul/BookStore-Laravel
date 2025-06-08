<!-- resources/views/admin/pesanan/index.blade.php -->

@extends('layouts.admin')

@section('title', 'Daftar Pesanan')

@section('sidebar')
    @include('admin.sidebar') <!-- Sidebar khusus admin -->
@endsection

@section('content')
    <div class="container mt-6">
        <h1 class="text-2xl font-semibold mb-4">Daftar Pesanan</h1>

        <!-- Menampilkan pesan sukses -->
        @if (session('success'))
            <div class="bg-green-600 text-white p-3 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabel Daftar Pesanan -->
        <div class="overflow-x-auto bg-white p-6 rounded-lg shadow-md">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="px-6 py-4">ID Pesanan</th>
                        <th class="px-6 py-4">Nama Pengguna</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesanan as $pesananItem)
                        <tr class="border-t">
                            <td class="px-6 py-4">{{ $pesananItem->id }}</td>
                            <td class="px-6 py-4">{{ $pesananItem->user->nama }}</td>
                            <td class="px-6 py-4">{{ $pesananItem->status }}</td>
                            <td class="px-6 py-4 flex space-x-2">
                                <!-- Lihat Detail Button -->
                                <a href="{{ route('admin.pesanan.show', $pesananItem->id) }}"
                                    class="text-blue-600 hover:text-blue-800">Lihat Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
