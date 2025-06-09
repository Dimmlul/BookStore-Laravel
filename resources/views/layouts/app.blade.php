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
        <nav class="flex justify-between">
            {{-- <a href="{{ route('guest.home') }}" class="text-lg font-bold">Toko Buku</a>
            <div class="space-x-6">
                <a href="{{ route('guest.home') }}" class="text-white">Home</a>
                <a href="{{ route('guest.tentang') }}" class="text-white">Tentang</a>
                <a href="{{ route('guest.kontak') }}" class="text-white">Kontak</a> --}}
            @if (Auth::check())
                <!-- Jika user sudah login, tampilkan menu user -->
                <a href="{{ route('user.home') }}" class="text-white">Dashboard</a>
                <a href="{{ route('user.profil') }}" class="text-white">Profil</a>
                <a href="{{ route('user.keranjang.index') }}" class="text-white">Keranjang</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-white">Logout</button>
                </form>
            @else
                <!-- Jika guest, tampilkan menu login dan register -->
                <a href="{{ route('login') }}" class="text-white">Login</a>
                <a href="{{ route('register') }}" class="text-white">Register</a>
            @endif
            </div>
        </nav>
    </header>

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
