<!-- resources/views/layouts/header.blade.php -->

<div class="bg-white shadow p-4 flex justify-between items-center">
    <div class="flex items-center space-x-3">
        <!-- Logo or Brand -->
        <i class="fas fa-star text-3xl text-blue-600"></i>
        <span class="text-xl font-semibold">Star Events</span>
    </div>

    <!-- User Info and Logout Button -->
    <div class="flex items-center space-x-4">
        <span>{{ Auth::user()->name }}</span>


    </div>
</div>
