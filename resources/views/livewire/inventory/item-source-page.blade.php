<div>
    <div class="p-4">
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
                            {{ $editId ? 'Perbarui Mitra Persediaan' : 'Buat Mitra Persediaan' }}
                        </h3>
                    </div>
                    <!-- Modal body -->
                    <form wire:submit="{{ $editId ? 'updateItemSource' : 'createItemSource' }}" action="#" method="POST">
                        <div class="gap-4 overflow-y-auto max-h-[680px] relative z-10">
                            <div class=" mb-4">
                                <label class="block py-2 text-sm font-medium text-gray-900 dark:text-white">Nama Mitra Persediaan</label>
                                <input wire:model.live="item_source_name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                <div>
                                    @error('item_source_name') <span class="text-red-700">{{ $message }}</span> @enderror 
                                </div>
                            </div>
                            <div class="sm:col-span-2 mb-4">
                                <label class="block py-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Mitra Persediaan</label>
                                <textarea wire:model.live="item_source_description" rows="9" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Deskripsikan kategori persediaanmu di sini."></textarea>                    
                            </div>
                            <div class="sm:col-span-2 mb-4 grid grid-cols-[1fr_2fr]">
                                <div class="p-1">
                                    <label class="block py-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Mitra</label>
                                    <select wire:model.live="item_source_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option value="">Jenis Mitra Persediaan</option>
                                            <option value="pelanggan">Pelanggan</option>
                                            <option value="penyuplai">Penyuplai</option>
                                    </select>
                                    <div>
                                        @error('item_source_type') <span class="text-red-700">{{ $message }}</span> @enderror 
                                    </div>
                                </div>
                                <div class="p-1">
                                    <label class="block py-2 text-sm font-medium text-gray-900 dark:text-white">Platform Mitra</label>
                                    <select wire:model.live="item_source_platform" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option value="">Platform Mitra Persediaan</option>
                                            @if ($item_source_type === 'penyuplai')
                                                <option value="shopee">Shopee</option>
                                                <option value="tiktok">Tiktok</option>
                                                <option value="toko_offline">Toko Offline</option>
        
                                            @elseif ($item_source_type === 'pelanggan')
                                                <option value="sekolah">Sekolah</option>
                                                <option value="les_sekolah">Les Sekolah</option>
                                            @endif
                                    </select>
                                    <div>
                                        @error('item_source_platform') <span class="text-red-700">{{ $message }}</span> @enderror 
                                    </div>
                                </div>
                            </div>
                            <div class="sm:col-span-2 mb-4">
                                <input type="hidden" name="active" value="0">
                                <input 
                                    type="checkbox"
                                    id="active"
                                    value="1"
                                    wire:model.live="active"
                                    class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft"
                                />
                                <label for="active" class="select-none ms-2 text-sm font-medium text-heading text-white">{{ $active ? 'Aktif' : 'Tidak Aktif' }}</label>
                            </div>
                            
                        </div>
                        <button type="submit" class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                            {{ $editId ? 'Perbarui Mitra Persediaan' : 'Buat Mitra Persediaan' }}
                        </button>
                    </form>
                </div>
            </div>
        
            <div>
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <!-- Start coding here -->
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Tabel Mitra Persediaan
                            </h3>
                        </div>
                        <div class="overflow-x-auto overflow-y-auto max-h-[600px] relative z-10">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 sticky top-0 z-20">
                                    <tr>
                                        <th scope="col" class="px-3 py-3">#</th>
                                        <th scope="col" class="px-3 py-3">Nama Mitra Persediaan</th>
                                        <th scope="col" class="px-3 py-3">Platform Mitra Persediaan</th>
                                        <th scope="col" class="px-3 py-3">Deskripsi Mitra Persediaan</th>
                                        <th scope="col" class="px-3 py-3 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($itemSources as $isc)
                                        <tr class="border-b dark:border-gray-700">
                                            <td class="px-3">
                                                {{ $loop->iteration }} <br>
                                            </td>
                                            <th scope="row" class="px-3 font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                                {{ $isc->item_source_name }}
                                                @if($isc->active)
                                                    <span class="text-green-700 font-medium bg-gray-200 p-1 rounded-md text-xs ms-1">Aktif</span>
                                                @else
                                                    <span class="text-red-700 font-medium bg-gray-200 p-1 rounded-md text-xs ms-1">Tidak Aktif</span>
                                                @endif
                                            </th>
                                            <td class="px-3">
                                                {{ $isc->item_source_platform }}
                                            </td>
                                            <td class="px-3">
                                                {{ $isc->item_source_description }}
                                            </td>
                                            <td class="px-3">
                                                <button wire:click="editItemSource({{ $isc->id }})" class="text-white bg-warning box-border border border-transparent hover:bg-warning-strong focus:ring-4 focus:ring-success-medium shadow-xs font-medium leading-5 rounded-md text-xs px-1.5 py-1 focus:outline-none">
                                                    <i class="ri-edit-circle-fill"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="p-1">
                                {{ $itemSources->onEachSide(0)->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

