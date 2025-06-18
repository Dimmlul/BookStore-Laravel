<!-- resources/views/layouts/admin.blade.php -->

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>
    @vite('resources/css/app.css')

</head>

<body class="bg-gray-100 text-gray-900">

    <!-- Sidebar -->
    @include('admin.sidebar')

    <div class="flex flex-col flex-1 ml-64">

        <!-- Content -->
        <main class="p-6 overflow-hidden">
            @yield('content')
        </main>


    </div>

</body>

</html>
