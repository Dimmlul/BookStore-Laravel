@extends('layouts.app')

@section('content')
    <div class="flex flex-col md:flex-row py-16 max-w-6xl w-full px-6 mx-auto">
        <div class='flex-1 max-w-4xl'>
            <h1 class="text-3xl font-medium mb-6">
                Shopping Cart <span class="text-sm text-indigo-500">{{ count($keranjang->isiKeranjang) }} Items</span>
            </h1>

            <div class="grid grid-cols-[2fr_1fr_1fr] text-gray-500 text-base font-medium pb-3">
                <p class="text-left">Product Details</p>
                <p class="text-center">Subtotal</p>
                <p class="text-center">Action</p>
            </div>

            @foreach ($keranjang->isiKeranjang as $item)
                <div class="grid grid-cols-[2fr_1fr_1fr] text-gray-500 items-center text-sm md:text-base font-medium pt-3">
                    <div class="flex items-center md:gap-6 gap-3">
                        <div
                            class="cursor-pointer w-24 h-24 flex items-center justify-center border border-gray-300 rounded">
                            <img class="max-w-full h-full object-cover" src="{{ asset('storage/' . $item->buku->gambar) }}"
                                alt="{{ $item->buku->judul }}" />
                        </div>
                        <div>
                            <p class="hidden md:block font-semibold">{{ $item->buku->judul }}</p>
                            <div class="font-normal text-gray-500/70">
                                <p>Size: <span>{{ $item->buku->kategori->kategori_buku ?? 'N/A' }}</span></p>
                                <div class='flex items-center'>
                                    <p>Qty:</p>
                                    <form action="{{ route('user.keranjang.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="number" name="jumlah" value="{{ $item->jumlah }}" min="1"
                                            class="border px-2 py-1 w-16">
                                        <button type="submit" class="bg-blue-500 text-white px-4 py-2">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="text-center">Rp. {{ number_format($item->buku->harga * $item->jumlah, 0, ',', '.') }}</p>
                    <form action="{{ route('user.keranjang.hapus', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2">Remove</button>
                    </form>
                </div>
            @endforeach

            <button class="group cursor-pointer flex items-center mt-8 gap-2 text-indigo-500 font-medium">
                <svg width="15" height="11" viewBox="0 0 15 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.09 5.5H1M6.143 10 1 5.5 6.143 1" stroke="#615fff" strokeWidth="1.5" strokeLinecap="round"
                        strokeLinejoin="round" />
                </svg>
                Continue Shopping
            </button>
        </div>

        <div class="max-w-[360px] w-full bg-gray-100/40 p-5 max-md:mt-16 border border-gray-300/70">
            <h2 class="text-xl md:text-xl font-medium">Order Summary</h2>
            <hr class="border-gray-300 my-5" />

            <div class="mb-6">
                <p class="text-sm font-medium uppercase">Delivery Address</p>
                <div class="relative flex justify-between items-start mt-2">
                    <p class="text-gray-500">No address found</p>
                    <button onClick="setShowAddress(!showAddress)" class="text-indigo-500 hover:underline cursor-pointer">
                        Change
                    </button>
                    {{-- @if ($showAddress)
                        <div class="absolute top-12 py-1 bg-white border border-gray-300 text-sm w-full">
                            <p onClick="setShowAddress(false)" class="text-gray-500 p-2 hover:bg-gray-100">
                                New York, USA
                            </p>
                            <p onClick="setShowAddress(false)"
                                class="text-indigo-500 text-center cursor-pointer p-2 hover:bg-indigo-500/10">
                                Add address
                            </p>
                        </div>
                    @endif --}}
                </div>

                <p class="text-sm font-medium uppercase mt-6">Payment Method</p>

                <select class="w-full border border-gray-300 bg-white px-3 py-2 mt-2 outline-none">
                    <option value="COD">Cash On Delivery</option>
                    <option value="Online">Online Payment</option>
                </select>
            </div>

            <hr class="border-gray-300" />
            {{--
            <div class="text-gray-500 mt-4 space-y-2">
                <p class="flex justify-between">
                    <span>Price</span><span>Rp. {{ number_format($totalPrice, 0, ',', '.') }}</span>
                </p>
                <p class="flex justify-between">
                    <span>Shipping Fee</span><span class="text-green-600">Free</span>
                </p>
                <p class="flex justify-between">
                    <span>Tax (2%)</span><span>Rp. {{ number_format($totalPrice * 0.02, 0, ',', '.') }}</span>
                </p>
                <p class="flex justify-between text-lg font-medium mt-3">
                    <span>Total Amount:</span><span>Rp. {{ number_format($totalPrice * 1.02, 0, ',', '.') }}</span>
                </p>
            </div> --}}

            <button
                class="w-full py-3 mt-6 cursor-pointer bg-indigo-500 text-white font-medium hover:bg-indigo-600 transition">
                Place Order
            </button>
        </div>
    </div>
@endsection
