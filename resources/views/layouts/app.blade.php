<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Buku</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
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
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-white hover:text-gray-300">Logout</button>
                    </form>
                @else
                    <!-- Jika guest, tampilkan menu login dan register -->
                    <a href="{{ route('login') }}" class="text-white hover:text-gray-300">Login</a>
                    <a href="{{ route('register') }}" class="text-white hover:text-gray-300">Register</a>
                @endif
                <!-- Menu untuk Kontak Admin dan Tentang Kami -->
                <a href="{{ route('guest.tentang') }}" class="text-white hover:text-gray-300">Tentang Kami</a>
                <a href="{{ route('guest.kontak') }}" class="text-white hover:text-gray-300">Kontak Admin</a>
            </div>

            <!-- Mobile Menu Toggle -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 12h18M3 6h18M3 18h18"></path>
                    </svg>
                </button>
            </div>
        </nav>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden bg-blue-800 p-4 space-y-4">
            @if (Auth::check())
                <a href="{{ route('user.home') }}" class="text-white hover:text-gray-300">Home</a>
                <a href="{{ route('user.profil') }}" class="text-white hover:text-gray-300">Profil</a>
                <a href="{{ route('user.keranjang.index') }}" class="text-white hover:text-gray-300">Keranjang</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-white hover:text-gray-300">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-white hover:text-gray-300">Login</a>
                <a href="{{ route('register') }}" class="text-white hover:text-gray-300">Register</a>
            @endif
            <!-- Menu untuk Kontak Admin dan Tentang Kami -->
            <a href="{{ route('guest.tentang') }}" class="text-white hover:text-gray-300">Tentang Kami</a>
            <a href="{{ route('guest.kontak') }}" class="text-white hover:text-gray-300">Kontak Admin</a>
        </div>
    </header>

    <!-- JavaScript untuk Toggle Menu Mobile -->
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>


    <!-- Main Content -->
    <main class="py-10">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-blue-800 text-white text-center p-4">
        <p>&copy; 2025 Toko Buku. Semua Hak Dilindungi.</p>
    </footer>

</body>

</html>
