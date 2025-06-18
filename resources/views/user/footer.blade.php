<footer class="px-6 md:px-16 lg:px-24 xl:px-32 pt-8 w-full text-gray-500">
    <div class="flex flex-col md:flex-row justify-between w-full gap-10 border-b border-gray-500/30 pb-6">
        <div class="md:max-w-96">
            <img class="h-9"
                src="https://raw.githubusercontent.com/prebuiltui/prebuiltui/main/assets/dummyLogo/dummyLogoDark.svg"
                alt="dummyLogoDark">
            <p class="mt-6 text-sm">
                Toko Buku adalah tempat terbaik untuk menemukan berbagai koleksi buku berkualitas tinggi yang dapat
                memenuhi setiap kebutuhan bacaan Anda.
                Kami percaya bahwa membaca adalah jendela dunia, dan melalui Toko Buku, kami ingin memberikan pengalaman
                membaca yang menyenangkan dan bermanfaat.
            </p>
        </div>
        <div class="flex-1 flex items-start md:justify-end gap-20">
            <div>
                <h2 class="font-semibold mb-5 text-gray-800">Perusahaan</h2>
                <ul class="text-sm space-y-2">
                    <li><a href="{{ route('guest.home') }}" class="hover:text-blue-600">Beranda</a></li>
                    <li><a href="{{ route('guest.tentang') }}" class="hover:text-blue-600">Tentang Kami</a></li>
                    <li><a href="{{ route('guest.kontak') }}" class="hover:text-blue-600">Kontak Kami</a></li>

                </ul>
            </div>
            <div>
                <h2 class="font-semibold mb-5 text-gray-800">Hubungi Kami</h2>
                <div class="text-sm space-y-2">
                    <p>+62 21-1234-5678</p>
                    <p>contact@tokobuku.com</p>
                </div>
            </div>
        </div>
    </div>
    <p class="pt-4 text-center text-xs md:text-sm pb-5">
        &copy; {{ date('Y') }} BukuStore. All rights reserved.
    </p>
</footer>
