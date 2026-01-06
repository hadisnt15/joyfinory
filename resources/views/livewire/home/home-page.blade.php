<div>
    <div class="p-4 mx-auto max-w-7xl">
        <section class="bg-white dark:bg-gray-900 rounded-lg">
            <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
                <div class="mr-auto place-self-center lg:col-span-7">
                    <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight md:text-5xl xl:text-6xl dark:text-white">Solusi Simpel untuk Pencatatan Bisnis Anda</h1>
                    <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Kelola pemasukan dan pengeluaran keuangan, serta persediaan barang dalam satu sistem yang praktis, efisien, dan mudah digunakan.</p>
                    @auth
                        @if (\Carbon\Carbon::today()->isSameDay('2026-01-10'))
                            <a href="{{ route('laughtale.index') }}" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                                Selamat Ulang Tahun Istrikuu, ini buat kamuu💖🎂
                                <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </a>
                        @else
                            <div class="mt-6 text-center text-white text-sm sm:text-base">

                                <!-- BARIS 1 -->
                                <div class="block md:inline">
                                    <span class="whitespace-nowrap">
                                        Hitung Mundur
                                    </span>

                                    <span id="countdown"
                                        class="font-bold text-pink-500 whitespace-nowrap mx-1 inline-block transition-all duration-300">
                                        
                                    </span>
                                </div>

                                <!-- BARIS 2 -->
                                <div class="block md:inline lg:inline">
                                    <span class="whitespace-nowrap">
                                        Menuju Ulang Tahun
                                    </span>

                                    <span class="font-bold text-pink-500 whitespace-nowrap ml-1">
                                        Dini 💖🎂
                                    </span>
                                </div>

                            </div>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                            Masuk
                            <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a>
                    @endauth
                </div>
                <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                    <img src="{{ asset('img/JoyFinory.png') }}" alt="JoyFinory">
                </div>                
            </div>
        </section>
    </div>
</div>
<script>
    const countdownEl = document.getElementById('countdown');

    // TARGET ULANG TAHUN (WITA)
    const targetDate = new Date('2026-01-10T00:00:00+08:00');

    function updateCountdown() {
        const now = new Date();
        const diff = targetDate - now;

        if (diff <= 0) {
            countdownEl.textContent = 'Hari ini 🎉';
            return;
        }

        const days = Math.floor(diff / (1000 * 60 * 60 * 24));
        const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
        const minutes = Math.floor((diff / (1000 * 60)) % 60);
        const seconds = Math.floor((diff / 1000) % 60);

        // animasi kecil (fade + scale)
        countdownEl.classList.add('scale-105', 'opacity-70');

        setTimeout(() => {
            countdownEl.textContent =
                `${days} hari ${hours} jam ${minutes} menit ${seconds} detik`;
            countdownEl.classList.remove('scale-105', 'opacity-70');
        }, 150);
    }

    updateCountdown();
    setInterval(updateCountdown, 1000);
</script>
