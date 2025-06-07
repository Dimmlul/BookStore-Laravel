<!-- resources/views/admin/sidebar.blade.php -->

<ul class="nav flex-column p-3">
    <li class="nav-item">
        <a class="nav-link text-white" href="{{ route('admin.dashboard') }}">
            Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-white" href="{{ route('admin.buku.index') }}">
            Buku
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-white" href="{{ route('admin.kategori.index') }}">
            Kategori Buku
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-white" href="{{ route('admin.pesanan.index') }}">
            Pesanan
        </a>
    </li>
</ul>
