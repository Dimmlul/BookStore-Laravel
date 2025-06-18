@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-16">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-blue-800">Kontak Admin</h1>
            <p class="mt-4 text-gray-700">Jika Anda memiliki pertanyaan atau masalah terkait layanan kami, kirimkan pesan
                Anda di sini.</p>
        </div>

        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('guest.kontak.store') }}" method="POST" class="bg-white p-8 rounded-lg shadow-lg">
            @csrf
            <div class="mb-4">
                <label for="subjek" class="block text-lg font-semibold text-gray-700">Subjek</label>
                <input type="text" name="subjek" id="subjek" class="w-full p-3 border border-gray-300 rounded"
                    value="{{ old('subjek') }}" required>
                @error('subjek')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="isi" class="block text-lg font-semibold text-gray-700">Isi Pesan</label>
                <textarea name="isi" id="isi" rows="6" class="w-full p-3 border border-gray-300 rounded" required>{{ old('isi') }}</textarea>
                @error('isi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full bg-blue-800 text-white p-3 rounded-lg">Kirim Pesan</button>
        </form>
    </div>
@endsection
