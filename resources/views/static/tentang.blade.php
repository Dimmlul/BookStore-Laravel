<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tentang Kami</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans antialiased">

    <!-- Menggunakan Header -->
    @include('user.header')

    <!-- Container -->
    <div class="container mx-auto px-6 py-16">

        <!-- Heading -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-blue-800">Tentang Kami</h1>
        </div>

        <!-- Content -->
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <p class="text-lg text-gray-700 mb-4">
                Selamat datang di <span class="font-semibold text-blue-600">Toko Buku</span>, tempat terbaik untuk
                menemukan berbagai koleksi buku berkualitas tinggi yang dapat memenuhi setiap kebutuhan bacaan Anda.
                Kami percaya
                bahwa membaca adalah jendela dunia, dan melalui <span class="font-semibold text-blue-600">Toko
                    Buku</span>,
                kami ingin memberikan pengalaman membaca yang menyenangkan dan bermanfaat.
            </p>
            <p class="text-lg text-gray-700 mb-4">
                Didirikan dengan visi untuk menyediakan akses mudah ke buku-buku terbaik dari berbagai genre, kami
                berkomitmen
                untuk memastikan setiap pelanggan menemukan buku yang mereka cari, baik untuk hiburan, pendidikan, atau
                pengembangan
                pribadi.
            </p>
            <p class="text-lg text-gray-700 mb-4">
                Di <span class="font-semibold text-blue-600">Toko Buku</span>, Anda tidak hanya membeli buku, tetapi
                juga menjadi
                bagian dari komunitas pembaca yang lebih besar. Dengan layanan pelanggan yang ramah dan pilihan buku
                yang terus diperbarui,
                kami berharap dapat terus melayani Anda dengan cara yang terbaik.
            </p>
            <p class="text-lg text-gray-700">
                Terima kasih telah memilih kami sebagai teman membaca Anda. Kami sangat menghargai setiap dukungan yang
                diberikan!
            </p>
        </div>

    </div>

    <!-- Menggunakan Footer -->
    @include('user.footer')

</body>

</html>
