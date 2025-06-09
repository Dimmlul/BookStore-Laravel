@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="text-center py-10">
            <h1 class="text-3xl font-semibold">Profil Anda</h1>
            <p>Update informasi akun Anda.</p>
        </div>

        @if (session('success'))
            <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('user.profil.update') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Nama -->
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama', $user->nama) }}"
                        class="mt-1 block w-full p-2 border rounded-md" required>
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                        class="mt-1 block w-full p-2 border rounded-md" required>
                </div>

                <!-- Alamat -->
                <div class="mb-4">
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <textarea name="alamat" id="alamat" class="mt-1 block w-full p-2 border rounded-md">{{ old('alamat', $user->alamat) }}</textarea>
                </div>

                <!-- No Telp -->
                <div class="mb-4">
                    <label for="no_telp" class="block text-sm font-medium text-gray-700">No. Telp</label>
                    <input type="text" name="no_telp" id="no_telp" value="{{ old('no_telp', $user->no_telp) }}"
                        class="mt-1 block w-full p-2 border rounded-md">
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" class="mt-1 block w-full p-2 border rounded-md">
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi
                        Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="mt-1 block w-full p-2 border rounded-md">
                </div>

                <!-- Submit Button -->
                <div class="col-span-2 text-center">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
                        Update Profile
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
