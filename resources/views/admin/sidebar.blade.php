<!-- resources/views/admin/sidebar.blade.php -->

<ul class="flex flex-col p-6 space-y-6 bg-gray-900 text-white h-full w-64 fixed top-0 left-0">
    <!-- Star Events Logo -->
    <div class="flex items-center space-x-3 mb-6">
        <i class="fas fa-star text-3xl text-blue-600"></i>
        <div class="text-xl font-semibold">BookStore</div>
    </div>

    <!-- Dashboard -->
    <li class="nav-item">
        <a href="{{ route('admin.dashboard') }}"
            class="flex items-center space-x-4 p-3 rounded-lg hover:bg-blue-600 transition duration-300">
            <i class="fas fa-tachometer-alt text-xl"></i>
            <span class="font-medium">Dashboard</span>
        </a>
    </li>

    <!-- Buku -->
    <li class="nav-item">
        <a href="{{ route('admin.buku.index') }}"
            class="flex items-center space-x-4 p-3 rounded-lg hover:bg-green-600 transition duration-300">
            <i class="fas fa-book text-xl"></i>
            <span class="font-medium">Buku</span>
        </a>
    </li>

    <!-- Kategori Buku -->
    <li class="nav-item">
        <a href="{{ route('admin.kategori.index') }}"
            class="flex items-center space-x-4 p-3 rounded-lg hover:bg-yellow-600 transition duration-300">
            <i class="fas fa-list-alt text-xl"></i>
            <span class="font-medium">Kategori Buku</span>
        </a>
    </li>

    <!-- Pesanan -->
    <li class="nav-item">
        <a href="{{ route('admin.pesanan.index') }}"
            class="flex items-center space-x-4 p-3 rounded-lg hover:bg-purple-600 transition duration-300">
            <i class="fas fa-box text-xl"></i>
            <span class="font-medium">Pesanan</span>
        </a>
    </li>

    <!-- Pesan -->
    <li class="nav-item">
        <a href="{{ route('admin.pesan.index') }}"
            class="flex items-center space-x-4 p-3 rounded-lg hover:bg-teal-600 transition duration-300">
            <i class="fas fa-comment-dots text-xl"></i>
            <span class="font-medium">Pesan</span>
        </a>
    </li>

    <!-- Divider -->
    <div class="border-t border-gray-700 my-6"></div>

    <!-- Empty Space to Push SignOut and Profile to the Bottom -->
    <div class="flex-grow"></div>

    <!-- Logout Button -->
    <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit"
                class="flex items-center space-x-4 p-3 rounded-lg hover:bg-red-600 transition duration-300 text-red-600 hover:text-white">
                <i class="fas fa-sign-out-alt text-xl"></i>
                <span class="font-medium">Logout</span>
            </button>
        </form>
    </li>

    <!-- User Information -->
    <div class="flex items-center space-x-3 mt-6">
        <img src="https://www.shutterstock.com/image-vector/user-icon-vector-600nw-393536320.jpg" alt="Profile"
            class="w-10 h-10 rounded-full">
        <div class="text-sm">
            <div class="font-medium">{{ Auth::user()->name }}</div>
            <div class="text-gray-400">{{ Auth::user()->email }}</div>
        </div>
    </div>
</ul>
