<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '404 Error | Not Found')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <div class="container mx-auto text-center py-20">
        <h1 class="text-6xl font-bold text-red-600">404</h1>
        <h2 class="text-2xl font-semibold mt-4">Page Not Found</h2>
        <p class="mt-4">Sorry, the page you are looking for doesn't exist.</p>
        <a href="{{ url('/') }}" class="mt-6 text-blue-600">Back to Home</a>
    </div>
</body>

</html>
