<!-- resources/views/layouts/admin.blade.php -->

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-gray-100 text-gray-900">

    <!-- Sidebar -->
    @include('admin.sidebar')

    <div class="flex flex-col flex-1">
        <!-- Navbar -->
        @include('layouts.header')

        <!-- Content -->
        <main class="p-6">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="text-center text-sm text-gray-500 py-4">
            &copy; {{ date('Y') }} BukuStore. All rights reserved.
        </footer>
    </div>
