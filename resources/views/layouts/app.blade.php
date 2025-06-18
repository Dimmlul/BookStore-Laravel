<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Toko Buku')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">

    <!-- Navbar -->
    @include('user.header') <!-- Menyertakan file header -->

    <!-- Main Content -->
    <main class="flex-1 py-16">
        @yield('content') <!-- Menyertakan konten halaman -->
    </main>

    <!-- Footer -->
    @include('user.footer') <!-- Menyertakan file footer -->

</body>

</html>
