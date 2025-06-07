<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">

</head>

<body>
    <div class="flex h-screen w-full">
        <div class="flex flex-col items-center justify-center w-full">
            <form method="POST" action="/register" class="md:w-96 w-80 flex flex-col items-center justify-center">
                @csrf
                <h2 class="text-4xl text-gray-900 font-medium">Register</h2>

                @if ($errors->any())
                    <div class="text-red-500 my-2">{{ $errors->first() }}</div>
                @endif

                <div
                    class="flex items-center w-full bg-transparent border border-gray-300/60 h-12 rounded-full overflow-hidden gap-2 pl-6 mt-6">
                    <input type="text" name="nama" placeholder="Nama"
                        class="bg-transparent text-gray-500/80 placeholder-gray-500/80 outline-none text-sm w-full h-full"
                        required>
                </div>

                <div
                    class="flex items-center w-full bg-transparent border border-gray-300/60 h-12 rounded-full overflow-hidden gap-2 pl-6 mt-4">
                    <input type="email" name="email" placeholder="Email"
                        class="bg-transparent text-gray-500/80 placeholder-gray-500/80 outline-none text-sm w-full h-full"
                        required>
                </div>

                <div
                    class="flex items-center w-full bg-transparent border border-gray-300/60 h-12 rounded-full overflow-hidden gap-2 pl-6 mt-4">
                    <input type="password" name="password" placeholder="Password"
                        class="bg-transparent text-gray-500/80 placeholder-gray-500/80 outline-none text-sm w-full h-full"
                        required>
                </div>

                <div
                    class="flex items-center w-full bg-transparent border border-gray-300/60 h-12 rounded-full overflow-hidden gap-2 pl-6 mt-4">
                    <input type="password" name="password_confirmation" placeholder="Konfirmasi Password"
                        class="bg-transparent text-gray-500/80 placeholder-gray-500/80 outline-none text-sm w-full h-full"
                        required>
                </div>

                <div
                    class="flex items-center w-full bg-transparent border border-gray-300/60 h-12 rounded-full overflow-hidden gap-2 pl-6 mt-4">
                    <input type="text" name="alamat" placeholder="Alamat"
                        class="bg-transparent text-gray-500/80 placeholder-gray-500/80 outline-none text-sm w-full h-full"
                        required>
                </div>

                <div
                    class="flex items-center w-full bg-transparent border border-gray-300/60 h-12 rounded-full overflow-hidden gap-2 pl-6 mt-4">
                    <input type="text" name="no_telp" placeholder="No. Telepon"
                        class="bg-transparent text-gray-500/80 placeholder-gray-500/80 outline-none text-sm w-full h-full"
                        required>
                </div>

                <button type="submit"
                    class="mt-6 w-full h-11 rounded-full text-white bg-indigo-500 hover:opacity-90 transition-opacity">
                    Daftar
                </button>

                <p class="text-gray-500/90 text-sm mt-4">Sudah punya akun? <a class="text-indigo-400 hover:underline"
                        href="/login">Login</a></p>
            </form>
        </div>
    </div>
</body>

</html>
