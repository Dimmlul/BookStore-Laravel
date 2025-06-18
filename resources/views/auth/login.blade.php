<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    <!-- Flex container for the page -->
    <div class="flex h-screen w-full">
        <!-- Left side image (hidden on mobile) -->
        <div class="w-full hidden md:inline-block">
            <img class="h-full w-full object-cover"
                src="https://i.pinimg.com/736x/4e/4f/91/4e4f91ef429bfaa1ceac044c786b98b4.jpg" alt="leftSideImage">
        </div>

        <!-- Right side content (Login form) -->
        <div class="flex flex-col items-center justify-center w-full px-4 md:px-0">
            <form method="POST" action="{{ route('login') }}"
                class="md:w-96 w-full flex flex-col items-center justify-center bg-white shadow-lg rounded-lg p-8">
                @csrf
                <h2 class="text-4xl text-blue-800 font-medium mb-6">Login</h2>

                <!-- Error message display -->
                @if ($errors->any())
                    <div class="text-red-500 my-2">{{ $errors->first() }}</div>
                @endif

                <!-- Email input -->
                <div
                    class="flex items-center w-full bg-transparent border border-gray-300/60 h-12 rounded-full overflow-hidden gap-2 pl-6 mt-6">
                    <input type="email" name="email" placeholder="Email"
                        class="bg-transparent text-gray-500/80 placeholder-gray-500/80 outline-none text-sm w-full h-full"
                        required>
                </div>

                <!-- Password input -->
                <div
                    class="flex items-center w-full bg-transparent border border-gray-300/60 h-12 rounded-full overflow-hidden gap-2 pl-6 mt-4">
                    <input type="password" name="password" placeholder="Password"
                        class="bg-transparent text-gray-500/80 placeholder-gray-500/80 outline-none text-sm w-full h-full"
                        required>
                </div>

                <!-- Login Button -->
                <button type="submit"
                    class="mt-6 w-full h-11 rounded-full text-white bg-blue-800 hover:bg-blue-700 transition duration-300">
                    Login
                </button>

                <!-- Register link -->
                <p class="text-gray-500/90 text-sm mt-4">Belum punya akun? <a class="text-blue-500 hover:underline"
                        href="/register">Daftar</a></p>
            </form>
        </div>
    </div>

</body>

</html>
