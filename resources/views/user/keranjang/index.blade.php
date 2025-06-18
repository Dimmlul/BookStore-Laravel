@extends('layouts.app')

@section('content')
    <div class="flex flex-col md:flex-row py-16 max-w-7xl w-full px-6 mx-auto">
        <!-- Shopping Cart Items Section -->
        <div class="flex-1 max-w-4xl">
            <h1 class="text-3xl font-medium mb-6">
                Keranjang Belanja <span class="text-sm text-indigo-500">{{ count($keranjang->isiKeranjang) }} Barang</span>
            </h1>

            <!-- Product details header -->
            <div class="grid grid-cols-[2fr_1fr_1fr] text-gray-500 text-base font-medium pb-3">
                <p class="text-left">Detail Produk</p>
                <p class="text-center">Subtotal</p>
                <p class="text-center">Aksi</p>
            </div>

            <!-- Loop through cart items -->
            @foreach ($keranjang->isiKeranjang as $item)
                <div class="grid grid-cols-[2fr_1fr_1fr] text-gray-500 items-center text-sm md:text-base font-medium pt-3">
                    <!-- Product Image and Details -->
                    <div class="flex items-center md:gap-6 gap-3">
                        <div
                            class="cursor-pointer w-24 h-24 flex items-center justify-center border border-gray-300 rounded">
                            <img class="max-w-full h-full object-cover" src="{{ asset('storage/' . $item->buku->gambar) }}"
                                alt="{{ $item->buku->judul }}" />
                        </div>
                        <div>
                            <p class="hidden md:block font-semibold">{{ $item->buku->judul }}</p>
                            <div class="font-normal text-gray-500/70">
                                <p>Ukuran: <span>{{ $item->buku->kategori->kategori_buku ?? 'N/A' }}</span></p>
                                <div class="flex items-center">
                                    <p>Jumlah:</p>
                                    <form action="{{ route('user.keranjang.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="number" name="jumlah" value="{{ $item->jumlah }}" min="1"
                                            class="border px-2 py-1 w-16">
                                        <button type="submit"
                                            class="bg-blue-800 text-white px-4 py-2 hover:bg-blue-700">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Price -->
                    <p class="text-center">Rp. {{ number_format($item->buku->harga * $item->jumlah, 0, ',', '.') }}</p>

                    <!-- Remove Button -->
                    <div class="flex justify-center">
                        <form action="{{ route('user.keranjang.hapus', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 hover:bg-red-600">Hapus</button>
                        </form>
                    </div>
                </div>
            @endforeach

            <!-- Total Price Section -->
            <div class="flex justify-between mt-6 border-t pt-4 mr-4">
                <p class="text-xl font-semibold ml-100">Total :</p>
                <p class="text-xl font-semibold mr-60">Rp. {{ number_format($totalPrice, 0, ',', '.') }}</p>
            </div>

            <!-- Continue Shopping Button -->
            <a href="{{ route('user.home') }}"
                class="group cursor-pointer flex items-center mt-8 gap-2 text-indigo-500 font-medium">
                <svg width="15" height="11" viewBox="0 0 15 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.09 5.5H1M6.143 10 1 5.5 6.143 1" stroke="#193cb8" strokeWidth="1.5" strokeLinecap="round"
                        strokeLinejoin="round" />
                </svg>
                Lanjut Belanja
            </a>
        </div>

        <!-- Order Summary Section -->
        <div class="max-w-[360px] w-full bg-gray-100/40 p-5 max-md:mt-16 border border-gray-300/70">
            <h2 class="text-xl md:text-xl font-medium">Ringkasan Pesanan</h2>
            <hr class="border-gray-300 my-5" />

            <div class="mb-6">
                <p class="text-sm font-medium uppercase">Alamat Pengiriman</p>
                <div class="relative flex justify-between items-start mt-2">
                    <p class="text-gray-500">
                        {{ $alamat ?? 'Alamat tidak ditemukan' }}
                    </p>
                </div>

                <p class="text-sm font-medium uppercase mt-6">Metode Pembayaran</p>
                <select class="w-full border border-gray-300 bg-white px-3 py-2 mt-2 outline-none">
                    <option value="Online">Transfer Bank</option>
                    <option value="QRIS">QRIS</option>
                </select>
            </div>

            <hr class="border-gray-300" />

            <!-- Checkout Button -->
            <button class="w-full py-3 mt-6 cursor-pointer bg-blue-800 text-white font-medium hover:bg-blue-700 transition">
                Checkout
            </button>
        </div>
    </div>
@endsection
