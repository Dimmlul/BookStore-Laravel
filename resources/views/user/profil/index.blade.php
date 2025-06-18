@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="text-center py-10">
            <h1 class="text-3xl font-semibold">Profil Anda</h1>
            <p class="text-lg text-gray-600">Update informasi akun Anda.</p>
        </div>

        @if (session('success'))
            <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('user.profil.update') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Nama -->
                <div class="mb-6">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama', $user->nama) }}"
                        class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                </div>

                <!-- Email -->
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                        class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                </div>

                <!-- Alamat -->
                <div class="mb-6">
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="4"
                        class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('alamat', $user->alamat) }}</textarea>
                </div>

                <!-- No Telp -->
                <div class="mb-6">
                    <label for="no_telp" class="block text-sm font-medium text-gray-700">No. Telp</label>
                    <input type="text" name="no_telp" id="no_telp" value="{{ old('no_telp', $user->no_telp) }}"
                        class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password"
                        class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi
                        Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Submit Button -->
                <div class="col-span-2 text-center">
                    <button type="submit"
                        class="bg-blue-800 text-white py-3 px-6 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                        Update Profil
                    </button>
                </div>
            </div>
        </form>

        <!-- Tombol Logout -->
        <div class="text-center mt-8">
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit"
                    class="bg-red-500 text-white py-3 px-6 rounded-lg hover:bg-red-600 focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                    Logout
                </button>
            </form>
        </div>
    </div>
@endsection
