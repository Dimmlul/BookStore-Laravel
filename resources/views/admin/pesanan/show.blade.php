<!-- resources/views/admin/pesanan/show.blade.php -->

@extends('layouts.admin')

@section('title', 'Detail Pesanan')

@section('sidebar')
    @include('admin.sidebar') <!-- Sidebar khusus admin -->
@endsection

@section('content')
    <div class="container mt-6">
        <h1 class="text-2xl font-semibold mb-4">Detail Pesanan #{{ $pesanan->id }}</h1>
        <p class="text-lg"><strong>Nama Pengguna:</strong> {{ $pesanan->user->nama }}</p>
        <p class="text-lg"><strong>Total Harga:</strong> {{ number_format($pesanan->total_harga, 0, ',', '.') }}</p>
        <p class="text-lg"><strong>Status:</strong> {{ $pesanan->status }}</p>
        <p class="text-lg"><strong>Metode Pembayaran:</strong> {{ $pesanan->metode_pembayaran }}</p>

        <h3 class="text-xl font-medium mt-6">Detail Barang Pesanan</h3>
        <table class="table-auto min-w-full bg-white p-6 rounded-lg shadow-md mt-4">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-6 py-4">Judul Buku</th>
                    <th class="px-6 py-4">Jumlah</th>
                    <th class="px-6 py-4">Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesanan->isiPesanan as $item)
                    <tr class="border-t">
                        <td class="px-6 py-4">{{ $item->buku->judul }}</td>
                        <td class="px-6 py-4">{{ $item->jumlah }}</td>
                        <td class="px-6 py-4">{{ number_format($item->harga, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Form untuk mengubah status pesanan -->
        <h4 class="text-lg font-semibold mt-6">Ubah Status Pesanan</h4>
        <form action="{{ route('admin.pesanan.editStatus', $pesanan->id) }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-3">
                <label for="status" class="form-label text-sm font-medium">Pilih Status</label>
                <select class="form-control mt-1 p-2 border rounded w-full" id="status" name="status" required>
                    <option value="pending" {{ $pesanan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="dibayar" {{ $pesanan->status == 'dibayar' ? 'selected' : '' }}>Dibayar</option>
                    <option value="dibatalkan" {{ $pesanan->status == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-600 text-white p-3 rounded-md hover:bg-blue-700">Perbarui Status</button>
        </form>

        <!-- Kembali ke Daftar Pesanan -->
        <a href="{{ route('admin.pesanan.index') }}" class="mt-4 inline-block text-blue-600 hover:text-blue-800">Kembali ke
            Daftar Pesanan</a>
    </div>
@endsection
