<div class="p-4 mx-auto max-w-7xl md:p-10">
    <p class="p-4 reveal text-center">Developed and presented for my beloved, preciouss, gorgeouss, kyotteouss, pwincess and wifee, Dini Nadia Sahdiah.</p>
    <p class="p-4 reveal text-center">Selamat ulang tahun yang ke-25 Dini sayang, hwaa iyyy, semoga panjang umur, sehat terus, lancar rezeki, kabul segala hajat cita-cita buat kamu, dan kita sekeluarga. Iyy udah satu tahun kita LDR, banyak susah senangnya apalagi kangennya hahahh, bismillah ke depannya lancar terus jalan kita menuju halal yaa, dan ke depannya kita bisa hidup sama-sama teruss sebagai cami dan ici :3. Walopun emang not that eziehh tapi bismillah insyaAllah kita punya visi misi yang samaa nikah buat ibadah, dan dalam menjalaninya pakek mindset buat "grow bareng till jannah" iyy, dan emang perlu persiapan matang uga buat mencapainyaa. Semoga di fase LDR ini kita sama-sama makin matang dan makin siap di segala aspek di diri kita masing-masing buat menuju pernikahan, aamiin.</p>
    <p class="p-4 reveal text-center">Huwwaa kangennn karna LDR, tapi bismillah semoga fase ini emang jalan yang terbaik buat kita. Kita dipisah sama jarak dolo, fokus masing-masing, ngembangin diri dan belajar whahah keren banget kita dah sama-sama banyak berkembang dari waktu pertama dekat dulu iyy.</p>
    <p class="p-4 reveal text-center">Aku bangga banget sama kamuu, gak nyangka aku kamu ngide mau usaha tuu. Makasih sayang kamu dah merintisin usaha dan bisnis buat masa depan kita bareng. Bismillah sesudah halal nante kita sama-sama bisa kembangin usaha dan bisnisnya bareng, dan dari ide pinterr kamu buat usaha dan bisnis lahir jua ide dari aku buat kembangin aplikasi manajemen bisnisnya, yang diselipi unsur bucin hahah. Semoga kamu suka dan bermanfaat aplikasinya :).</p>
    <div class="columns-2 gap-5 md:columns-3 lg:columns-3 xl:columns-4">
        @foreach ($laughtales as $lt)
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-5 mb-8">

                <div
                    class="reveal group gallery-card cursor-pointer rounded-xl border border-white/10 bg-white/5 backdrop-blur shadow-lg transition-all duration-500"
                    onclick="
                    document.querySelectorAll('.gallery-card.active')
                        .forEach(el => el !== this && el.classList.remove('active'));
                    this.classList.toggle('active');
                    "
                >
                    <div class="relative overflow-hidden rounded-lg">

                    <!-- IMAGE -->
                    <img
                        src="{{ asset('storage/'.$lt->photo) }}"
                        alt="{{ $lt->title }}"
                        class="w-full scale-105 transition-all duration-700 ease-out
                        group-hover:scale-110 group-hover:rotate-1
                        group-[.active]:scale-110 group-[.active]:rotate-1"
                    >

                    <!-- OVERLAY -->
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent
                        opacity-0 transition-all duration-500 flex flex-col justify-end p-4 pointer-events-none
                        group-hover:opacity-100 group-[.active]:opacity-100"
                    >

                        <!-- TITLE -->
                        <h3
                        class="text-white text-xl font-bold translate-y-6 opacity-0
                            transition-all duration-500
                            group-hover:translate-y-0 group-hover:opacity-100
                            group-[.active]:translate-y-0 group-[.active]:opacity-100"
                        >
                        {{ $lt->title }}
                        </h3>

                        <!-- CAPTION (EXPANDABLE) -->
                        <p
                        class="caption text-gray-200 text-sm mt-1 translate-y-6 opacity-0
                            transition-all duration-700 delay-100
                            group-hover:translate-y-0 group-hover:opacity-100
                            group-[.active]:translate-y-0 group-[.active]:opacity-100"
                        >
                        {{ $lt->caption }}
                        </p>
                </div>

        @endforeach
    </div>
</div>


{{-- w-full h-full object-cover transition-transform duration-500 ease-in-out transform group-hover:scale-110 --}}