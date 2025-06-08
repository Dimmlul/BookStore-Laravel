<!-- resources/views/admin/pesan/index.blade.php -->

@extends('layouts.admin')

@section('title', 'Daftar Pesan')

@section('sidebar')
    @include('admin.sidebar') <!-- Sidebar dengan Tailwind CSS -->
@endsection

@section('content')
    <div class="container mt-6">
        <h1 class="text-2xl font-semibold mb-4">Daftar Pesan</h1>

        <!-- Menampilkan pesan sukses -->
        @if (session('success'))
            <div class="bg-green-600 text-white p-3 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- UI Chat -->
        <div class="bg-white p-6 rounded-md shadow-md">
            @foreach ($pesan as $pesanItem)
                <div class="flex items-start space-x-4 mb-4">
                    <!-- Avatar pengguna -->
                    <div class="flex-shrink-0">
                        <img src="https://via.placeholder.com/40" alt="User Avatar" class="w-10 h-10 rounded-full">
                    </div>

                    <!-- Pesan -->
                    <div class="flex-1 bg-gray-100 p-4 rounded-lg">
                        <div class="text-sm text-gray-600">{{ $pesanItem->user->nama }}</div>
                        <div class="text-md mt-1">{{ $pesanItem->isi }}</div>
                    </div>

                    <!-- Tombol Lihat Detail -->
                    <div class="ml-4 flex items-center">
                        <a href="{{ route('admin.pesan.show', $pesanItem->id) }}"
                            class="text-blue-600 hover:text-blue-800">Lihat Detail</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
