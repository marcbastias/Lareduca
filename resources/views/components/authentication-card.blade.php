<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-blue-200">
    <!-- Logo Section -->
    <div class="mb-8">
        {{ $logo }}
    </div>

    <!-- Card Section -->
    <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white shadow-lg transform transition-all hover:scale-105 hover:shadow-2xl sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
