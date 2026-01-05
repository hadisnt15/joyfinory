<header class="antialiased relative z-50">
    <nav class="bg-gray-900 px-4 lg:px-6 py-3">
        <div class="max-w-7xl mx-auto flex justify-between items-center">

            {{-- LOGO --}}
            <a href="/" class="flex items-center gap-2">
                <img src="https://flowbite.s3.amazonaws.com/logo.svg" class="h-8" alt="Logo">
                <span class="text-white font-bold text-lg">JoyFinory</span>
            </a>

            {{-- DESKTOP MENU --}}
            @auth
            <div class="hidden md:flex items-center gap-2">

                {{-- KEUANGAN --}}
                <div class="relative">
                    <button data-dropdown-toggle="dd-keuangan"
                        class="flex items-center gap-1 px-3 py-2 text-white hover:bg-gray-700 rounded-md">
                        <i class="ri-wallet-3-fill"></i> Keuangan
                        <i class="ri-arrow-down-s-line"></i>
                    </button>
                    <div id="dd-keuangan"
                        class="hidden absolute mt-2 w-48 bg-white rounded-md shadow-lg z-50">
                        <a href="{{ route('finance.category') }}" class="block px-4 py-2 hover:bg-gray-100">Kategori Keuangan</a>
                        <a href="{{ route('finance.index') }}" class="block px-4 py-2 hover:bg-gray-100">Catatan Keuangan</a>
                        <a href="{{ route('finance.mutasi') }}" class="block px-4 py-2 hover:bg-gray-100">Mutasi Keuangan</a>
                    </div>
                </div>

                {{-- PERSEDIAAN --}}
                <div class="relative">
                    <button data-dropdown-toggle="dd-persediaan"
                        class="flex items-center gap-1 px-3 py-2 text-white hover:bg-gray-700 rounded-md">
                        <i class="ri-token-swap-fill"></i> Persediaan
                        <i class="ri-arrow-down-s-line"></i>
                    </button>
                    <div id="dd-persediaan"
                        class="hidden absolute mt-2 w-52 bg-white rounded-md shadow-lg z-50">
                        <a href="{{ route('item.index') }}" class="block px-4 py-2 hover:bg-gray-100">Daftar Persediaan</a>
                        <a href="{{ route('item.category') }}" class="block px-4 py-2 hover:bg-gray-100">Kategori Persediaan</a>
                        <a href="{{ route('item.source') }}" class="block px-4 py-2 hover:bg-gray-100">Mitra Persediaan</a>
                        <a href="{{ route('inventory.index') }}" class="block px-4 py-2 hover:bg-gray-100">Catatan Persediaan</a>
                        <a href="{{ route('inventory.mutasi') }}" class="block px-4 py-2 hover:bg-gray-100">Mutasi Persediaan</a>
                    </div>
                </div>

                {{-- GALERI --}}
                <div class="relative">
                    <button data-dropdown-toggle="dd-galeri"
                        class="flex items-center gap-1 px-3 py-2 text-white hover:bg-gray-700 rounded-md">
                        <i class="ri-gallery-fill"></i> Galeri
                        <i class="ri-arrow-down-s-line"></i>
                    </button>
                    <div id="dd-galeri"
                        class="hidden absolute mt-2 w-44 bg-white rounded-md shadow-lg z-50">
                        <a href="{{ route('gallery.index') }}" class="block px-4 py-2 hover:bg-gray-100">Daftar Galeri</a>
                        <a href="{{ route('laughtale.index') }}" class="block px-4 py-2 hover:bg-gray-100">Our Laughtales</a>
                    </div>
                </div>

                {{-- USER --}}
                <div class="flex items-center gap-3 ml-4">
                    <span class="text-white text-sm font-semibold">{{ auth()->user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="text-white hover:text-red-400">
                            <i class="ri-logout-box-r-fill"></i>
                        </button>
                    </form>
                </div>
            </div>
            @endauth

            {{-- HAMBURGER --}}
            <button onclick="toggleMobileMenu()" class="md:hidden text-white">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        {{-- MOBILE MENU --}}
        @auth
        <div id="mobileMenu" class="hidden md:hidden mt-3 bg-gray-800 rounded-lg p-3 text-white space-y-2">

            {{-- KEUANGAN --}}
            <button onclick="toggleSub('m-keu')" class="w-full flex justify-between px-2 py-2 hover:bg-gray-700 rounded">
                <span><i class="ri-wallet-3-fill"></i> Keuangan</span>
                <i class="ri-arrow-down-s-line"></i>
            </button>
            <div id="m-keu" class="hidden pl-6 space-y-1 text-sm">
                <a href="{{ route('finance.category') }}" class="block p-2 hover:bg-gray-700 rounded-md">Kategori Keuangan</a>
                <a href="{{ route('finance.index') }}" class="block p-2 hover:bg-gray-700 rounded-md">Catatan Keuangan</a>
                <a href="{{ route('finance.mutasi') }}" class="block p-2 hover:bg-gray-700 rounded-md">Mutasi Keuangan</a>
            </div>

            {{-- PERSEDIAAN --}}
            <button onclick="toggleSub('m-pers')" class="w-full flex justify-between px-2 py-2 hover:bg-gray-700 rounded">
                <span><i class="ri-token-swap-fill"></i> Persediaan</span>
                <i class="ri-arrow-down-s-line"></i>
            </button>
            <div id="m-pers" class="hidden pl-6 space-y-1 text-sm">
                <a href="{{ route('item.index') }}" class="block p-2 hover:bg-gray-700 rounded-md">Daftar Persediaan</a>
                <a href="{{ route('item.category') }}" class="block p-2 hover:bg-gray-700 rounded-md">Kategori Persediaan</a>
                <a href="{{ route('item.source') }}" class="block p-2 hover:bg-gray-700 rounded-md">Mitra Persediaan</a>
                <a href="{{ route('inventory.index') }}" class="block p-2 hover:bg-gray-700 rounded-md">Catatan Persediaan</a>
                <a href="{{ route('inventory.mutasi') }}" class="block p-2 hover:bg-gray-700 rounded-md">Mutasi Persediaan</a>
            </div>

            {{-- GALERI --}}
            <button onclick="toggleSub('m-gal')" class="w-full flex justify-between px-2 py-2 hover:bg-gray-700 rounded">
                <span><i class="ri-gallery-fill"></i> Galeri</span>
                <i class="ri-arrow-down-s-line"></i>
            </button>
            <div id="m-gal" class="hidden pl-6 space-y-1 text-sm">
                <a href="{{ route('gallery.index') }}" class="block p-2 hover:bg-gray-700 rounded-md">Daftar Galeri</a>
                <a href="{{ route('laughtale.index') }}" class="block p-2 hover:bg-gray-700 rounded-md">Our Laughtales</a>
            </div>

            {{-- USER --}}
            <div class="border-t border-gray-600 pt-3 mt-3">
                <div class="font-semibold">{{ auth()->user()->name }}</div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="text-red-400 mt-2 hover:bg-gray-700 rounded-md p-2">
                        <i class="ri-logout-box-r-fill"></i> Logout
                    </button>
                </form>
            </div>
        </div>
        @endauth
    </nav>
</header>

{{-- JS --}}
<script>
function toggleMobileMenu() {
    document.getElementById('mobileMenu').classList.toggle('hidden');
}
function toggleSub(id) {
    document.getElementById(id).classList.toggle('hidden');
}
</script>
