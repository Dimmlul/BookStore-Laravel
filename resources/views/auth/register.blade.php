<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    <!-- Flex container for the page -->
    <div class="flex h-screen w-full">
        <!-- Right side content (Register form) -->
        <div class="flex flex-col items-center justify-center w-full px-4 md:px-0">
            <form method="POST" action="/register"
                class="md:w-96 w-full flex flex-col items-center justify-center bg-white shadow-lg rounded-lg p-8">
                @csrf
                <h2 class="text-4xl text-blue-800 font-medium mb-6">Register</h2>

                <!-- Error message display -->
                @if ($errors->any())
                    <div class="text-red-500 my-2">{{ $errors->first() }}</div>
                @endif

                <!-- Name input -->
                <div
                    class="flex items-center w-full bg-transparent border border-gray-300/60 h-12 rounded-full overflow-hidden gap-2 pl-6 mt-6">
                    <input type="text" name="nama" placeholder="Nama"
                        class="bg-transparent text-gray-500/80 placeholder-gray-500/80 outline-none text-sm w-full h-full"
                        required>
                </div>

                <!-- Email input -->
                <div
                    class="flex items-center w-full bg-transparent border border-gray-300/60 h-12 rounded-full overflow-hidden gap-2 pl-6 mt-4">
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

                <!-- Password confirmation input -->
                <div
                    class="flex items-center w-full bg-transparent border border-gray-300/60 h-12 rounded-full overflow-hidden gap-2 pl-6 mt-4">
                    <input type="password" name="password_confirmation" placeholder="Konfirmasi Password"
                        class="bg-transparent text-gray-500/80 placeholder-gray-500/80 outline-none text-sm w-full h-full"
                        required>
                </div>

                <!-- Address input -->
                <div
                    class="flex items-center w-full bg-transparent border border-gray-300/60 h-12 rounded-full overflow-hidden gap-2 pl-6 mt-4">
                    <input type="text" name="alamat" placeholder="Alamat"
                        class="bg-transparent text-gray-500/80 placeholder-gray-500/80 outline-none text-sm w-full h-full"
                        required>
                </div>

                <!-- Phone number input -->
                <div
                    class="flex items-center w-full bg-transparent border border-gray-300/60 h-12 rounded-full overflow-hidden gap-2 pl-6 mt-4">
                    <input type="text" name="no_telp" placeholder="No. Telepon"
                        class="bg-transparent text-gray-500/80 placeholder-gray-500/80 outline-none text-sm w-full h-full"
                        required>
                </div>

                <!-- Submit button -->
                <button type="submit"
                    class="mt-6 w-full h-11 rounded-full text-white bg-blue-800 hover:bg-blue-700 transition duration-300">
                    Daftar
                </button>

                <!-- Login link -->
                <p class="text-gray-500/90 text-sm mt-4">Sudah punya akun? <a class="text-blue-500 hover:underline"
                        href="/login">Login</a></p>
            </form>
        </div>
    </div>

</body>

</html>
