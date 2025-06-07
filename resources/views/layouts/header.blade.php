<!-- resources/views/layouts/header.blade.php -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">BookStore</a>
        <div class="d-flex">
            <!-- Logout Form -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf <!-- CSRF token -->
                <button type="submit" class="nav-link btn btn-link">Logout</button>
            </form>
        </div>
    </div>
</nav>
