<div class="p-4 mx-auto max-w-7xl md:p-10">
    <p class="p-4 reveal text-center">Developed and presented for my beloved, preciouss, gorgeouss, kyotteouss, pwincess and wifee, Dini Nadia Sahdiah.</p>
    <p class="p-4 reveal text-center">Selamat ulang tahun yang ke-25 Dini sayang, hwaa iyyy, semoga panjang umur, sehat terus, lancar rezeki, kabul segala hajat cita-cita buat kamu, dan kita sekeluarga. Iyy udah satu tahun kita LDR, banyak susah senangnya apalagi kangennya hahahh, bismillah ke depannya lancar terus jalan kita menuju halal yaa, dan ke depannya kita bisa hidup sama-sama teruss sebagai cami dan ici :3. Walopun emang not that eziehh tapi bismillah insyaAllah kita punya visi misi yang samaa nikah buat ibadah, dan dalam menjalaninya pakek mindset buat "grow bareng till jannah" iyy, dan emang perlu persiapan matang uga buat mencapainyaa. Semoga di fase LDR ini kita sama-sama makin matang dan makin siap di segala aspek di diri kita masing-masing buat menuju pernikahan, aamiin.</p>
    <p class="p-4 reveal text-center">Huwwaa kangennn karna LDR, tapi bismillah semoga fase ini emang jalan yang terbaik buat kita. Kita dipisah sama jarak dolo, fokus masing-masing, ngembangin diri dan belajar whahah keren banget kita dah sama-sama banyak berkembang dari waktu pertama dekat dulu iyy.</p>
    <p class="p-4 reveal text-center">Aku bangga banget sama kamuu, gak nyangka aku kamu ngide mau usaha tuu. Makasih sayang kamu dah merintisin usaha dan bisnis buat masa depan kita bareng. Bismillah sesudah halal nante kita sama-sama bisa kembangin usaha dan bisnisnya bareng, dan dari ide pinterr kamu buat usaha dan bisnis lahir jua ide dari aku buat kembangin aplikasi manajemen bisnisnya, yang diselipi unsur bucin hahah. Semoga kamu suka dan bermanfaat aplikasinya :).</p>
    <div class="columns-2 gap-5 md:columns-3 lg:columns-3 xl:columns-4">
        @foreach ($laughtales as $lt)
            <div class="gallery-container">

                <div
                    class="reveal group"
                    onclick="
                    document.querySelectorAll('.group.active').forEach(el => {
                        if (el !== this) el.classList.remove('active');
                    });
                    this.classList.toggle('active');
                    "
                >
                    <div class="relative overflow-hidden rounded-lg">
                    <img src="{{ asset('storage/'.$lt->photo) }}" alt="{{ $lt->title }}">
                    <div class="absolute"></div>
                    </div>

                    <div class="p-4">
                    <h3 class="text-white text-xl font-bold mb-1">{{ $lt->title }}</h3>
                    <p class="caption">{{ $lt->caption }}</p>
                    </div>
                </div>

                <!-- Tambah card lain di sini -->

                </div>




        @endforeach
    </div>
</div>


{{-- w-full h-full object-cover transition-transform duration-500 ease-in-out transform group-hover:scale-110 --}}