<!-- resources/views/admin/pesan/show.blade.php -->

@extends('layouts.admin')

@section('title', 'Detail Pesan')

@section('sidebar')
    @include('admin.sidebar') <!-- Sidebar dengan Tailwind CSS -->
@endsection

@section('content')
    <div class="container mt-6">
        <h1 class="text-2xl font-semibold mb-4">Detail Pesan #{{ $pesan->id }}</h1>
        <p class="text-sm text-gray-500">Dari: {{ $pesan->user->nama }}</p>

        <!-- UI Chat -->
        <div class="bg-white p-6 rounded-md shadow-md mt-4">
            <div class="flex items-start space-x-4 mb-4">
                <!-- Avatar pengguna -->
                <div class="flex-shrink-0">
                    <img src="https://via.placeholder.com/40" alt="User Avatar" class="w-10 h-10 rounded-full">
                </div>

                <!-- Pesan -->
                <div class="flex-1 bg-gray-100 p-4 rounded-lg">
                    <div class="text-sm text-gray-600">{{ $pesan->user->nama }}</div>
                    <div class="text-md mt-1">{{ $pesan->isi }}</div>
                </div>
            </div>

            <!-- Admin Response (optional) -->
            @if ($pesan->admin_response)
                <div class="flex items-start space-x-4 mb-4 mt-4">
                    <!-- Avatar Admin -->
                    <div class="flex-shrink-0">
                        <img src="https://via.placeholder.com/40" alt="Admin Avatar" class="w-10 h-10 rounded-full">
                    </div>

                    <!-- Admin Response -->
                    <div class="flex-1 bg-blue-100 p-4 rounded-lg">
                        <div class="text-sm text-gray-600">Admin</div>
                        <div class="text-md mt-1">{{ $pesan->admin_response }}</div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Balas Pesan -->
        <form action="{{ route('admin.pesan.reply', $pesan->id) }}" method="POST" class="mt-6">
            @csrf
            <div class="mb-3">
                <label for="admin_response" class="text-sm font-medium">Balas Pesan</label>
                <textarea id="admin_response" name="admin_response" class="w-full p-4 border rounded-lg" rows="4" required></textarea>
            </div>
            <button type="submit" class="bg-blue-600 text-white p-3 rounded-md hover:bg-blue-700">Kirim Balasan</button>
        </form>

        <a href="{{ route('admin.pesan.index') }}" class="mt-4 inline-block text-blue-600 hover:text-blue-800">Kembali ke
            Daftar Pesan</a>
    </div>
@endsection
