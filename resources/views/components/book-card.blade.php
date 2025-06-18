<div class="bg-white rounded-lg shadow-md p-4 py-8 flex flex-col h-full">
    <!-- Gambar Buku -->
    <img src="{{ asset('storage/' . $buku->gambar) }}" alt="{{ $buku->judul }}"
        class="w-full h-48 object-cover rounded-md mb-4">

    <!-- Judul Buku -->
    <h3 class="text-lg font-semibold mt-2">{{ $buku->judul }}</h3>

    <!-- Penulis Buku -->
    <p class="text-sm text-gray-500">{{ $buku->penulis }}</p>

    <!-- Deskripsi Singkat -->
    <p class="text-gray-600 mt-2 flex-grow">{{ Str::limit($buku->deskripsi, 100) }}</p>

    <!-- Harga Buku -->
    <p class="text-xl font-bold mt-2">Rp. {{ number_format($buku->harga, 0, ',', '.') }}</p>

    <!-- Tombol Add to Cart -->
    <form action="{{ route('user.keranjang.tambah') }}" method="POST" class="mt-4">
        @csrf
        <input type="hidden" name="buku_id" value="{{ $buku->id }}">
        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">
            Tambah ke Keranjang
        </button>
    </form>
</div>
