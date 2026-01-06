<header class="antialiased fixed top-0 left-0 w-full z-50">
  <nav class="bg-white border-gray-200 px-4 lg:px-6 py-3 dark:bg-gray-800">
    <div class="max-w-7xl mx-auto">

      <!-- Wrapper desktop & mobile -->
      <div class="flex items-center justify-between h-12">

        <!-- Logo -->
        <div class="flex items-center">
          <a href="/" class="flex mr-4">
            <img src="https://flowbite.s3.amazonaws.com/logo.svg" class="mr-3 h-8" alt="FlowBite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">JoyFinory</span>
          </a>
        </div>

        <!-- Desktop Menu -->
        @auth
        <div class="hidden lg:flex flex-1 justify-center">
          <ol class="inline-flex items-center mb-0">

            <!-- ================= KEUANGAN ================= -->
            <li class="relative">
              <button
                type="button"
                data-dropdown="keuangan"
                class="dropdown-btn inline-flex items-center text-white font-semibold rounded-md text-sm px-3 py-2 hover:bg-gray-300 hover:text-gray-800 transition"
              >
                <i class="ri-wallet-3-fill"></i>
                <span class="ml-1">Keuangan</span>
                <svg class="w-3.5 h-3.5 ms-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path d="m19 9-7 7-7-7" />
                </svg>
              </button>

              <ul
                data-menu="keuangan"
                class="absolute left-0 mt-1 hidden bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-48 text-sm text-body font-medium z-50"
              >
                <li>
                  <a href="{{ route('finance.category') }}" class="block p-2 hover:bg-neutral-tertiary-medium rounded-md">
                    <i class="ri-checkbox-multiple-blank-fill"></i> Kategori Keuangan
                  </a>
                </li>
                <li>
                  <a href="{{ route('finance.index') }}" class="block p-2 hover:bg-neutral-tertiary-medium rounded-md">
                    <i class="ri-edit-box-fill"></i> Catatan Keuangan
                  </a>
                </li>
                <li>
                  <a href="{{ route('finance.mutasi') }}" class="block p-2 hover:bg-neutral-tertiary-medium rounded-md">
                    <i class="ri-exchange-box-fill"></i> Mutasi Keuangan
                  </a>
                </li>
              </ul>
            </li>

            <!-- ================= PERSEDIAAN ================= -->
            <li class="relative ml-4">
              <button
                type="button"
                data-dropdown="persediaan"
                class="dropdown-btn inline-flex items-center text-white font-semibold rounded-md text-sm px-3 py-2 hover:bg-gray-300 hover:text-gray-800 transition"
              >
                <i class="ri-token-swap-fill"></i>
                <span class="ml-1">Persediaan</span>
                <svg class="w-3.5 h-3.5 ms-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path d="m19 9-7 7-7-7" />
                </svg>
              </button>

              <ul
                data-menu="persediaan"
                class="absolute left-0 mt-1 hidden bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-52 text-sm text-body font-medium z-50"
              >
                <li>
                  <a href="{{ route('item.index') }}" class="block p-2 hover:bg-neutral-tertiary-medium rounded-md">
                    <i class="ri-gradienter-fill"></i> Daftar Persediaan
                  </a>
                </li>
                <li>
                  <a href="{{ route('item.category') }}" class="block p-2 hover:bg-neutral-tertiary-medium rounded-md">
                    <i class="ri-global-fill"></i> Kategori Persediaan
                  </a>
                </li>
                <li>
                  <a href="{{ route('item.source') }}" class="block p-2 hover:bg-neutral-tertiary-medium rounded-md">
                    <i class="ri-app-store-fill"></i> Mitra Persediaan
                  </a>
                </li>
                <li>
                  <a href="{{ route('inventory.index') }}" class="block p-2 hover:bg-neutral-tertiary-medium rounded-md">
                    <i class="ri-edit-circle-fill"></i> Catatan Persediaan
                  </a>
                </li>
                <li>
                  <a href="{{ route('inventory.mutasi') }}" class="block p-2 hover:bg-neutral-tertiary-medium rounded-md">
                    <i class="ri-exchange-fill"></i> Mutasi Persediaan
                  </a>
                </li>
              </ul>
            </li>

            <!-- ================= GALERI ================= -->
            @if(auth()->user()->id != 1)
            <li class="relative ml-4">
              <button
                type="button"
                data-dropdown="galeri"
                class="dropdown-btn inline-flex items-center text-white font-semibold rounded-md text-sm px-3 py-2 hover:bg-gray-300 hover:text-gray-800 transition"
              >
                <i class="ri-gallery-fill"></i>
                <span class="ml-1">Galeri</span>
                <svg class="w-3.5 h-3.5 ms-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path d="m19 9-7 7-7-7" />
                </svg>
              </button>

              <ul
                data-menu="galeri"
                class="absolute left-0 mt-1 hidden bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-48 text-sm text-body font-medium z-50"
              >
                <li>
                  <a href="{{ route('gallery.index') }}" class="block p-2 hover:bg-neutral-tertiary-medium rounded-md">
                    <i class="ri-gradienter-fill"></i> Daftar Galeri
                  </a>
                </li>
                <li>
                  <a href="{{ route('laughtale.index') }}" class="block p-2 hover:bg-neutral-tertiary-medium rounded-md">
                    <i class="ri-hearts-fill"></i> Our Laughtales
                  </a>
                </li>
              </ul>
            </li>
            @endif

          </ol>

        </div>

        <!-- User & Logout -->
        <div class="hidden lg:flex justify-end items-center space-x-2">
          <form action="{{ route('logout') }}" method="post" class="flex items-center space-x-2">
            @csrf
            <span class="text-sm text-white font-semibold border-r-2 pr-4">{{ auth()->user()->name ?? 'Belum Masuk' }}</span>
            <button
              type="submit"
              class="inline-flex items-center justify-center text-white font-medium rounded-md text-sm px-3 py-1.5 hover:bg-gray-300 hover:text-gray-800"
            >
              <i class="ri-logout-box-r-fill"></i> Keluar
            </button>
          </form>
        </div>
        @endauth

        <!-- Mobile Hamburger -->
        <button
          id="mobile-menu-button"
          aria-label="Toggle menu"
          class="lg:hidden text-gray-700 dark:text-gray-200"
        >
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
            stroke-linecap="round" stroke-linejoin="round">
            <line x1="3" y1="12" x2="21" y2="12" />
            <line x1="3" y1="6" x2="21" y2="6" />
            <line x1="3" y1="18" x2="21" y2="18" />
          </svg>
        </button>
      </div>

      <!-- Mobile menu -->
      @auth
      <div id="mobile-menu" class="hidden lg:hidden bg-gray-800 border-t border-default-medium">
        <nav class="px-4 py-3">
          <ul class="space-y-2 text-white">
            <li>
              <details class="group">
                <summary
                  class="flex items-center justify-between cursor-pointer py-2 px-3 font-semibold hover:bg-gray-600 rounded-md"
                >
                  <span><i class="ri-wallet-3-fill"></i> Keuangan</span>
                  <svg class="w-4 h-4 group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 9l-7 7-7-7" />
                  </svg>
                </summary>
                <ul class="mt-1 space-y-1 pl-5 text-sm">
                  <li>
                    <a href="{{ route('finance.category') }}" class="block p-2 hover:bg-gray-600 rounded-md">
                      <i class="ri-checkbox-multiple-blank-fill"></i> Kategori Keuangan
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('finance.index') }}" class="block p-2 hover:bg-gray-600 rounded-md">
                      <i class="ri-edit-box-fill"></i> Catatan Keuangan
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('finance.mutasi') }}" class="block p-2 hover:bg-gray-600 rounded-md">
                      <i class="ri-exchange-box-fill"></i> Mutasi Keuangan
                    </a>
                  </li>
                </ul>
              </details>
            </li>

            <li>
              <details class="group">
                <summary
                  class="flex items-center justify-between cursor-pointer py-2 px-3 font-semibold hover:bg-gray-600 rounded-md"
                >
                  <span><i class="ri-token-swap-fill"></i> Persediaan</span>
                  <svg class="w-4 h-4 group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 9l-7 7-7-7" />
                  </svg>
                </summary>
                <ul class="mt-1 space-y-1 pl-5 text-sm">
                  <li>
                    <a href="{{ route('item.index') }}" class="block p-2 hover:bg-gray-600 rounded-md">
                      <i class="ri-gradienter-fill"></i> Daftar Persediaan
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('item.category') }}" class="block p-2 hover:bg-gray-600 rounded-md">
                      <i class="ri-global-fill"></i> Kategori Persediaan
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('item.source') }}" class="block p-2 hover:bg-gray-600 rounded-md">
                      <i class="ri-app-store-fill"></i> Mitra Persediaan
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('inventory.index') }}" class="block p-2 hover:bg-gray-600 rounded-md">
                      <i class="ri-edit-circle-fill"></i> Catatan Persediaan
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('inventory.mutasi') }}" class="block p-2 hover:bg-gray-600 rounded-md">
                      <i class="ri-exchange-fill"></i> Mutasi Persediaan
                    </a>
                  </li>
                </ul>
              </details>
            </li>
            @if(auth()->user()->id != 1)
            <li>
              <details class="group">
                <summary
                  class="flex items-center justify-between cursor-pointer py-2 px-3 font-semibold hover:bg-gray-600 rounded-md"
                >
                  <span><i class="ri-gallery-fill"></i> Galeri</span>
                  <svg class="w-4 h-4 group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 9l-7 7-7-7" />
                  </svg>
                </summary>
                <ul class="mt-1 space-y-1 pl-5 text-sm">
                  <li>
                    <a href="{{ route('gallery.index') }}" class="block p-2 hover:bg-gray-600 rounded-md">
                      <i class="ri-gradienter-fill"></i> Daftar Galeri
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('laughtale.index') }}" class="block p-2 hover:bg-gray-600 rounded-md">
                      <i class="ri-hearts-fill"></i> Our Laughtales
                    </a>
                  </li>
                </ul>
              </details>
            </li>
            @endif

            <li class="border-t border-default-medium mt-2 pt-2">
              <form action="{{ route('logout') }}" method="post" class="flex items-center space-x-2 px-3">
                @csrf
                <span class="text-sm font-semibold">{{ auth()->user()->name ?? 'Belum Masuk' }}</span>
                <button
                  type="submit"
                  class="inline-flex items-center justify-center font-medium rounded-md text-sm px-3 py-1.5 hover:bg-gray-300 hover:text-gray-800"
                >
                  <i class="ri-logout-box-r-fill"></i> Keluar
                </button>
              </form>
            </li>
          </ul>
        </nav>
      </div>
      @endauth

    </div>
  </nav>
  @auth
    <div class="flex flex-wrap items-center text-xs px-2 font-medium text-gray-800 justify-center bg-white">
      Built with Love, from <span class="font-bold">&nbsp;Hadi</span>, for <span class="font-bold">&nbsp;Dini</span>.
    </div>
  @endauth
  <script>
    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });

    // desktop
      document.addEventListener('DOMContentLoaded', () => {

        const buttons = document.querySelectorAll('.dropdown-btn');
        const menus = document.querySelectorAll('[data-menu]');

        buttons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.stopPropagation();

                const target = button.dataset.dropdown;
                const menu = document.querySelector(`[data-menu="${target}"]`);

                // Tutup dropdown lain
                menus.forEach(m => {
                    if (m !== menu) m.classList.add('hidden');
                });

                // Toggle dropdown aktif
                menu.classList.toggle('hidden');
            });
        });

        // Klik di luar dropdown → tutup semua
        document.addEventListener('click', () => {
            menus.forEach(menu => menu.classList.add('hidden'));
        });

    });
  </script>
</header>
