<div>
    <div class="p-4 mx-auto max-w-7xl">
        @if (session()->has('success'))
            <div class="p-2 mb-3 bg-green-100 text-green-600 rounded">
                {{ session('success') }}
            </div>
        @endif
        <div class="grid md:grid-cols-[1fr_2fr] gap-3">
            <div>
                <!-- Modal content -->
                <div class="relative p-4 mb-2 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <!-- Modal header -->
                    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Tambahkan Momen
                        </h3>
                    </div>
                    <!-- Modal body -->
                    <div class="gap-4 overflow-y-auto max-h-[680px] relative z-10">
                        <div class=" mb-4">
                            <label class="block py-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                            <input wire:model="date" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                            @error('date')
                                <p class="mt-2.5 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class=" mb-4">
                            <label class="block py-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                            <input wire:model="title" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                            @error('title')
                                <p class="mt-2.5 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="sm:col-span-2 mb-4">
                            <label class="block py-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                            <textarea wire:model="caption" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Write product description here"></textarea>        
                            @error('caption')
                                <p class="mt-2.5 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                            @enderror            
                        </div>
                        <div class="col-span-full">
                            <label for="profile-picture" class="block py-2 text-sm font-medium text-gray-900 dark:text-white">Momen</label>
                            <div class="col-span-full">
                                <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-300 px-6 py-6">
                                    <div class="text-center">
                                        <div class="mt-4 flex text-sm/6 text-gray-400">
                                            <label for="photo" class="relative cursor-pointer rounded-md bg-transparent font-semibold text-indigo-400 focus-within:outline-2 focus-within:outline-offset-2 focus-within:outline-indigo-500 hover:text-indigo-300">
                                            <span>Upload a file</span>
                                            <input wire:model="photo" id="photo" type="file" name="photo" class="sr-only" accept="image/png, image/jpg"/>
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs/5 text-gray-400">PNG and JPG up to 4MB</p>
                                    </div>
                                </div>
                            </div>
                            @error('photo')
                                <p class="mt-2.5 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                            @enderror
                        </div>
        
                        <div wire:loading wire:target="photo" class="flex items-center justify-center w-20 h-20 border border-gray-200 rounded-lg bg-gray-50">
                            <div class="px-3 py-1 text-[10px] font-medium leading-none text-center text-blue-800 bg-blue-200 rounded-full animate-pulse">
                                loading...
                            </div>
                        </div>
                        {{-- @if ($photo)
                            <p class="my-2 text-sm/6 font-medium text-white">Pratinjau</p>
                            <img src="{{ $photo->temporaryUrl() }}" alt="" class="rounded w-20 h-20 block object-cover">
                            @endif --}}
                        @if ($photo)
                            <p class="my-2 text-sm/6 font-medium text-white">Pratinjau</p>
                            <img src="{{ $photo->temporaryUrl() }}" alt="" class="rounded w-20 h-20 block object-cover">
                        @elseif ($oldPhoto)
                            <p class="my-2 text-sm/6 font-medium text-white">Pratinjau</p>
                            <img src="{{ asset('storage/'.$oldPhoto) }}" alt="" class="rounded w-20 h-20 block object-cover">
                        @endif
                    </div>
                    <button wire:click="saveMoment" class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mt-4">
                        <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Simpan
                    </button>
                    @if ($isEdit)
                        <button wire:click="resetForm" class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                            Batal
                        </button>
                    @endif
                </div>
            </div>
        
            <div>
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <!-- Start coding here -->
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Daftar Momen
                            </h3>
                        </div>
                        <div class="overflow-x-auto overflow-y-auto max-h-[620px] relative z-10">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 sticky top-0 z-20">
                                    <tr>
                                        <th scope="col" class="px-3 py-3">#</th>
                                        <th scope="col" class="px-3 py-3">Momen</th>
                                        <th scope="col" class="px-3 py-3">Foto</th>
                                        <th scope="col" class="px-3 py-3 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($galleries as $f)
                                        <tr class="border-b dark:border-gray-700">
                                            <td class="px-3">
                                                {{ $loop->iteration }} <br>
                                            </td>
                                            <th scope="row" class="px-3 font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                                {{ $f->date }} <br>
                                                <span class="font-semibold">{{ $f->title }}</span> <br>
                                                <span class="text-xs text-gray-300 block max-w-xs md:max-w-sm lg:max-w-md truncate-3-lines break-words whitespace-normal">{{ $f->caption }}</span>
                                            </th>
                                            <th scope="row" class="px-3 font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                                <img src="{{ !empty($f->photo) ? asset('storage/'.$f->photo) : asset('img/love.jpg') }}" alt="" class="size-12 flex-none rounded-md bg-gray-800 outline -outline-offset-1 outline-white/10" />
                                            </th>
                                            <td class="px-3">
                                                <ul class="text-sm text-gray-700 dark:text-gray-200" aria-labelledby="apple-imac-27-dropdown-button">
                                                    <li>
                                                        <button wire:click="edit({{ $f->id }})" class="block px-3 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</button>
                                                    </li>
                                                    <li>
                                                        <button wire:click="delete({{ $f->id }})" class="block px-3 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</button>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="p-1">
                                {{ $galleries->onEachSide(0)->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>