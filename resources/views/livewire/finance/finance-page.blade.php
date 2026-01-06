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
                            Buat Catatan Keuangan
                        </h3>
                    </div>
                    <!-- Modal body -->
                    <div class="gap-4 relative z-10">
                        {{-- <div class=" mb-4">
                            <label class="block py-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                            <input wire:model="date" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                        </div> --}}
                        <div class="mb-4 grid grid-cols-[1fr_2fr]">
                            <div class="p-1">
                                <label class="block py-2 text-sm font-medium text-gray-900 dark:text-white">Tipe</label>
                                <select wire:model.live="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="">Tipe Catatan Keuangan</option>
                                    <option value="in">Pemasukan</option>
                                    <option value="out">Pengeluaran</option>
                                </select>
                            </div>
                            <div class="p-1">
                                <label class="block py-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                                <select wire:model.refer="category_id" wire:key="category-select-{{ $type }}" @disabled(empty($type)) class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="">Kategori Keuangan</option>
                                    @foreach($financeCategories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class=" mb-4">
                            <label class="block py-2 text-sm font-medium text-gray-900 dark:text-white">Nominal</label>
                            <input wire:model="amount" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                        </div>
                        <div class="sm:col-span-2 mb-4">
                            <label class="block py-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea wire:model="desc" rows="9" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Write product description here"></textarea>                    
                        </div>
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
        
            <div>
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5 ">
                    <!-- Start coding here -->
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Tabel Catatan Keuangan
                            </h3>
                        </div>
                        <div class="overflow-x-auto overflow-y-auto max-h-[620px] relative z-10">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 sticky top-0 z-20">
                                    <tr>
                                        <th scope="col" class="px-3 py-3">#</th>
                                        <th scope="col" class="px-3 py-3">Catatan</th>
                                        <th scope="col" class="px-3 py-3">Jumlah</th>
                                        {{-- <th scope="col" class="px-3 py-3 text-center">Aksi</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($finances as $f)
                                        <tr class="border-b dark:border-gray-700">
                                            <td class="px-3">
                                                {{ $loop->iteration }} <br>
                                            </td>
                                            <th scope="row" class="px-3 font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                                @if ($f->type === 'in')
                                                    <span class="text-green-600 font-semibold text-xs">Pemasukan</span>
                                                @else
                                                    <span class="text-red-600 font-semibold text-xs">Pengeluaran</span>
                                                @endif
                                                <br>{{ $f->date }} 
                                                <br>{{ $f->financeCategories->category_name }} 
                                                <br><span class="text-xs">Ket: {{ $f->desc }}</span>
                                            </th>
                                            <td class="px-3">
                                                @if ($f->type === 'in')
                                                    <span class="text-green-600 font-semibold text-xs">{{ number_format($f->amount) }}</span>
                                                @else
                                                    <span class="text-red-600 font-semibold text-xs">{{ number_format($f->amount) }}</span>
                                                @endif
                                            </td>
                                            {{-- <td class="px-3">
                                                <ul class="text-sm text-gray-700 dark:text-gray-200" aria-labelledby="apple-imac-27-dropdown-button">
                                                    <li>
                                                        <button wire:click="edit({{ $f->id }})" class="text-white bg-warning box-border border border-transparent hover:bg-warning-strong focus:ring-4 focus:ring-success-medium shadow-xs font-medium leading-5 rounded-md text-xs px-1.5 py-1 focus:outline-none"><i class="ri-edit-circle-fill"></i></button>
                                                    </li>
                                                    <li>
                                                        <button wire:click="delete({{ $f->id }})" class="block px-3 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</button>
                                                    </li>
                                                </ul>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="p-1">
                                {{ $finances->onEachSide(0)->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>