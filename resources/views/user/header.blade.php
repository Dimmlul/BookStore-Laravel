<header class="bg-blue-800 text-white p-4">
    <nav class="flex justify-between items-center max-w-7xl mx-auto">
        <!-- Logo atau Nama Toko Buku -->
        <a href="{{ route('guest.home') }}" class="text-lg font-bold hover:text-gray-300">Toko Buku</a>

        <!-- Navigasi Menu -->
        <div class="space-x-6 hidden md:flex">
            @if (Auth::check())
                <!-- Jika user sudah login, tampilkan menu user -->
                <a href="{{ route('user.home') }}" class="text-white hover:text-gray-300">Home</a>
                <a href="{{ route('user.profil') }}" class="text-white hover:text-gray-300">Profil</a>
                <a href="{{ route('user.keranjang.index') }}" class="text-white hover:text-gray-300">Keranjang</a>
                <a href="{{ route('guest.tentang') }}" class="text-white hover:text-gray-300">Tentang Kami</a>
                <a href="{{ route('guest.kontak') }}" class="text-white hover:text-gray-300">Kontak Admin</a>
                {{-- <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-white hover:text-gray-300">Logout</button>
                </form> --}}
            @else
                <a href="{{ route('login') }}" class="text-white hover:text-gray-300">Login</a>
                <a href="{{ route('register') }}" class="text-white hover:text-gray-300">Register</a>
                <a href="{{ route('guest.tentang') }}" class="text-white hover:text-gray-300">Tentang Kami</a>
            @endif

        </div>

    </nav>


</header>
