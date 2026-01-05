<div class="p-4 md:p-10">
    <div class="columns-2 gap-5 md:columns-3 lg:columns-3 xl:columns-4">
        @foreach ($laughtales as $lt)
            <div class="group cursor-pointer mb-5 lg:mb-8 break-inside-avoid rounded-lg border border-gray-800 shadow-lg">
                
                <div class="relative overflow-hidden rounded-lg ">
                    <img 
                        src="{{ asset('storage/'.$lt->photo) }}" 
                        alt="{{ $lt->title }}" 
                        class="w-full transition-transform duration-500 ease-in-out group-hover:scale-110"
                    >

                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                        <h3 class="text-white text-xl font-bold transition-all duration-500 transform translate-y-4 group-hover:translate-y-0">
                            {{ $lt->title }}
                        </h3>
                        <p class="text-gray-200 text-sm mt-1 transition-all duration-700 transform translate-y-4 group-hover:translate-y-0">
                            {{ $lt->caption }}
                        </p>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
</div>


{{-- w-full h-full object-cover transition-transform duration-500 ease-in-out transform group-hover:scale-110 --}}