<header class="antialiased">
  <nav class="bg-white border-gray-200 px-4 lg:px-6 py-3 dark:bg-gray-800">
    <div class="grid grid-cols-[1fr_3fr_1fr] h-12 items-center mx-auto max-w-7xl">
      
      <div class="flex items-center">
        <a href="/" class="flex mr-4">
          <img src="https://flowbite.s3.amazonaws.com/logo.svg" class="mr-3 h-8" alt="FlowBite Logo" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">JoyFinory</span>
        </a>
      </div>

      @auth
      <div class="flex justify-center">
        <ol class="inline-flex items-center mb-3 sm:mb-0">
          
          <!-- Dropdown Keuangan -->
          <li>
            <div class="flex items-center">
              <button
                id="dropdownKeuangan"
                data-dropdown-toggle="dropdown-keuangan"
                class="inline-flex items-center text-white box-border border border-transparent font-semibold leading-5 rounded-md text-sm px-3 py-2 hover:bg-gray-300 hover:text-gray-800"
              >
                <i class="ri-wallet-3-fill"></i>Keuangan
                <svg
                  class="w-3.5 h-3.5 ms-1.5"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  fill="none"
                  viewBox="0 0 24 24"
                >
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                </svg>
              </button>

              <div
                id="dropdown-keuangan"
                class="z-11 bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-46 hidden"
              >
                <ul class="p-2 text-sm text-body font-medium" aria-labelledby="dropdownDefault">
                  <li>
                    <a href="{{ route('finance.category') }}" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded-md">
                      <i class="ri-checkbox-multiple-blank-fill"></i>Kategori Keuangan
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('finance.index') }}" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded-md">
                      <i class="ri-edit-box-fill"></i>Catatan Keuangan
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('finance.mutasi') }}" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded-md">
                      <i class="ri-exchange-box-fill"></i>Mutasi Keuangan
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </li>

          <!-- Dropdown Persediaan -->
          <li aria-current="page">
            <div class="flex items-center">
              <button
                id="dropdownPersediaan"
                data-dropdown-toggle="dropdown-persediaan"
                class="inline-flex items-center text-white box-border border border-transparent font-semibold leading-5 rounded-md text-sm px-3 py-2 hover:bg-gray-300 hover:text-gray-800"
              >
                <i class="ri-token-swap-fill"></i>Persediaan
                <svg
                  class="w-3.5 h-3.5 ms-1.5"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  fill="none"
                  viewBox="0 0 24 24"
                >
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                </svg>
              </button>

              <div
                id="dropdown-persediaan"
                class="z-11 bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-46 hidden"
              >
                <ul class="p-2 text-sm text-body font-medium" aria-labelledby="dropdownDefault">
                  <li>
                    <a href="{{ route('item.index') }}" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded-md">
                      <i class="ri-gradienter-fill"></i>Daftar Persediaan
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('item.category') }}" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded-md">
                      <i class="ri-global-fill"></i>Kategori Persediaan
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('item.source') }}" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded-md">
                      <i class="ri-app-store-fill"></i>Mitra Persediaan
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('inventory.index') }}" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded-md">
                      <i class="ri-edit-circle-fill"></i>Catatan Persediaan
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('inventory.mutasi') }}" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded-md">
                      <i class="ri-exchange-fill"></i>Mutasi Persediaan
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </li>

          <!-- Dropdown Galeri -->
          <li aria-current="page">
            <div class="flex items-center">
              <button
                id="dropdownGaleri"
                data-dropdown-toggle="dropdown-galeri"
                class="inline-flex items-center text-white box-border border border-transparent font-semibold leading-5 rounded-md text-sm px-3 py-2 hover:bg-gray-300 hover:text-gray-800"
              >
                <i class="ri-gallery-fill"></i>Galeri
                <svg
                  class="w-3.5 h-3.5 ms-1.5"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  fill="none"
                  viewBox="0 0 24 24"
                >
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                </svg>
              </button>

              <div
                id="dropdown-galeri"
                class="z-11 bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-46 hidden"
              >
                <ul class="p-2 text-sm text-body font-medium" aria-labelledby="dropdownDefault">
                  <li>
                    <a href="{{ route('gallery.index') }}" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded-md">
                      <i class="ri-gradienter-fill"></i>Daftar Galeri
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('laughtale.index') }}" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded-md">
                      <i class="ri-hearts-fill"></i>Our Laughtales
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </li>

        </ol>
      </div>

      <div class="flex justify-end">
        <form action="{{ route('logout') }}" method="post">
          @csrf
          <span class="text-sm text-white font-semibold border-r-2 px-4">{{ auth()->user()->name ?? 'Belum Masuk' }}</span>
          <button
            type="submit"
            class="hidden sm:inline-flex items-center justify-center text-white font-medium rounded-md text-sm px-3 py-1.5 mr-2 hover:bg-gray-300 hover:text-gray-800"
          >
            <i class="ri-logout-box-r-fill"></i> Keluar
          </button>
        </form>
      </div>
      @endauth

    </div>
  </nav>
</header>
