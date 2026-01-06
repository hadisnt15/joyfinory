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
                            Buat Catatan Persediaan
                        </h3>
                    </div>
                    <!-- Modal body -->
                    <div class="gap-2 overflow-y-auto max-h-[660px] relative z-10 pe-2">
                        {{-- <div class=" mb-4">
                            <label class="block py-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                            <input wire:model.live="date" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                            <div>
                                @error('date') <span class="text-red-700">{{ $message }}</span> @enderror 
                            </div>
                        </div> --}}
                        <div class="mb-4 grid grid-cols-[1fr_2fr]">
                            <div class="p-1">
                                <label class="block py-2 text-sm font-medium text-gray-900 dark:text-white">Tipe</label>
                                <select wire:model.live="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="">Tipe Catatan Persediaan</option>
                                    <option value="jual">Penjualan</option>
                                    <option value="beli">Pembelian</option>
                                </select>
                                <div>
                                    @error('type') <span class="text-red-700">{{ $message }}</span> @enderror 
                                </div>
                            </div>
                            <div class="p-1">
                                <label class="block py-2 text-sm font-medium text-gray-900 dark:text-white">Mitra Persediaan</label>
                                <select wire:model.refer="item_source_id" wire:key="item-source-select-{{ $type }}" @disabled(empty($type)) class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="">Mitra Persediaan</option>
                                    @foreach($itemSources as $isc)
                                        <option value="{{ $isc->id }}">{{ $isc->item_source_name }} - {{ $isc->item_source_platform }}</option>
                                    @endforeach
                                </select>
                                <div>
                                    @error('item_source_id') <span class="text-red-700">{{ $message }}</span> @enderror 
                                </div>
                            </div>
                        </div>
                        <div class="p-1">
                            <label class="block py-2 text-sm font-medium text-gray-900 dark:text-white">Daftar Persediaan</label>
                            <select wire:model.live="item_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="">Daftar Persediaan</option>
                                @foreach($items as $i)
                                    <option value="{{ $i->id }}">{{ $i->item_name }}</option>
                                @endforeach
                            </select>
                            <div>
                                @error('item_id') <span class="text-red-700">{{ $message }}</span> @enderror 
                            </div>
                        </div>
                        <div class="grid grid-cols-2 mb-4">
                            <div class="p-1">
                                <label class="block py-2 text-sm font-medium text-gray-900 dark:text-white">Kuantitas (Pcs)</label>
                                <input wire:model.live="quantity" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                <div>
                                    @error('quantity') <span class="text-red-700">{{ $message }}</span> @enderror 
                                </div>
                            </div>
                            <div class="p-1">
                                <label class="block py-2 text-sm font-medium text-gray-900 dark:text-white">Harga Satuan (Rp)</label>
                                <input wire:model.live="unit_price" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                <div>
                                    @error('unit_price') <span class="text-red-700">{{ $message }}</span> @enderror 
                                </div>
                            </div>
                        </div>
                        <div class="sm:col-span-2 mb-4">
                            <label class="block py-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea wire:model.live="desc" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Write product description here"></textarea>                    
                        </div>
                        <button wire:click="save" class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
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
            </div>
        
            <div>
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <!-- Start coding here -->
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Tabel Catatan Persediaan
                            </h3>
                        </div>
                        <div class="overflow-x-auto overflow-y-auto max-h-[600px] relative z-10">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 sticky top-0 z-20">
                                    <tr>
                                        <th scope="col" class="px-3 py-3">#</th>
                                        <th scope="col" class="px-3 py-3">Tanggal</th>
                                        <th scope="col" class="px-3 py-3">Persediaan</th>
                                        <th scope="col" class="px-3 py-3">Jumlah</th>
                                        <th scope="col" class="px-3 py-3 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inventories as $f)
                                        <tr class="border-b dark:border-gray-700">
                                            <td class="px-3">
                                                {{ $loop->iteration }} <br>
                                            </td>
                                            <th scope="row" class="px-3 font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                                @if ($f->type === 'beli')
                                                    <span class="text-yellow-600 font-semibold text-xs">Pembelian</span>
                                                @else
                                                    <span class="text-green-600 font-semibold text-xs">Penjualan</span>
                                                @endif
                                                <br>
                                                {{ $f->date }} 
                                            </th>
                                            <td class="px-3">
                                                <span class="text-xs text-white font-semibold">{{ $f->inventorySources->item_source_name }}</span> <br>
                                                <span class="text-xs text-white font-semibold">{{ $f->inventoryItems->item_name }}</span> -
                                                <span class="text-xs">Ket: {{ $f->desc }}</span>
                                            </td>
                                            <td class="px-3 text-right">
                                                @if ($f->type === 'beli')
                                                    <span class="text-yellow-600 font-semibold text-sm">Rp{{ number_format($f->quantity*$f->unit_price) }}</span><br>
                                                    <span class="text-white text-xs">Kuantitas: {{ number_format($f->quantity) }} {{$f->inventoryItems->item_uom}}</span><br>
                                                    <span class="text-white text-xs">Harga Satuan: Rp{{ number_format($f->unit_price) }}</span>
                                                @else
                                                    <span class="text-green-600 font-semibold text-sm">Rp{{ number_format($f->quantity*$f->unit_price) }}</span><br>
                                                    <span class="text-white text-xs">Kuantitas: {{ number_format($f->quantity) }} {{$f->inventoryItems->item_uom}}</span><br>
                                                    <span class="text-white text-xs">Harga Satuan: Rp{{ number_format($f->unit_price) }}</span>
                                                @endif
                                            </td>
                                            <td class="px-3">
                                                <ul class="text-sm text-gray-700 dark:text-gray-200" aria-labelledby="apple-imac-27-dropdown-button">
                                                    <li>
                                                        <button wire:click="edit({{ $f->id }})" class="text-white bg-warning box-border border border-transparent hover:bg-warning-strong focus:ring-4 focus:ring-success-medium shadow-xs font-medium leading-5 rounded-md text-xs px-1.5 py-1 focus:outline-none"><i class="ri-edit-circle-fill"></i></button>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="p-1">
                                {{ $inventories->onEachSide(0)->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>