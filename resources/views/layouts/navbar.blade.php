{{-- resources/views/layouts/navbar.blade.php --}}
<nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-6">
        <div class="flex justify-between items-center py-3">
            
            {{-- Logo atau Nama Website --}}
            <a href="{{ route('home') }}" class="flex items-center space-x-2">
                {{-- Anda bisa mengganti ini dengan file logo.svg atau .png --}}
                <svg class="h-10 w-10 text-green-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                </svg>
                <span class="text-xl font-bold text-gray-800">
                    JDIH KEMENAG SURABAYA
                </span>
            </a>

            {{-- Menu Navigasi --}}
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="py-2 border-b-2 font-medium
                    {{ request()->routeIs('home') ? 'border-green-600 text-green-600' : 'border-transparent text-gray-500 hover:text-green-600' }}">
                    Beranda
                </a>
                <a href="{{ route('about') }}" class="py-2 border-b-2 font-medium
                    {{ request()->routeIs('about') ? 'border-green-600 text-green-600' : 'border-transparent text-gray-500 hover:text-green-600' }}">
                    Tentang
                </a>
            </div>

        </div>
    </div>
</nav>