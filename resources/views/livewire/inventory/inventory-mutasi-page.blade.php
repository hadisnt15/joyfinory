<div>
    <div class="p-4">
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Tabel Mutasi Persediaan
                    </h3>
                    <div class="flex gap-3 mb-4 me-4">
                        <!-- 🔹 Date Range -->
                        <input type="date" wire:model.live="startDate"
                            class="bg-gray-50 border border-gray-300 text-xs rounded-md text-gray-700 focus:ring focus:ring-indigo-200 py-1 px-2 w-full sm:w-auto">
    
                        <input type="date" wire:model.live="endDate"
                            class="bg-gray-50 border border-gray-300 text-xs rounded-md text-gray-700 focus:ring focus:ring-indigo-200 py-1 px-2 w-full sm:w-auto">
    
                    </div>
                </div>
                <div class="overflow-x-auto overflow-y-auto max-h-[600px] relative z-10">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-gray-700 sticky top-0 z-20">
                            <tr>
                                <th class="px-3 py-3">#</th>
                                <th class="px-3 py-3">Tanggal</th>
                                <th class="px-3 py-3">Kategori</th>
                                <th class="px-3 py-3">Mitra</th>
                                <th class="px-3 py-3">Barang</th>
                                <th class="px-3 py-3">Deskripsi</th>
                                <th class="px-3 py-3 text-right">Masuk</th>
                                <th class="px-3 py-3 text-right">Keluar</th>
                                <th class="px-3 py-3 text-right">Saldo</th>
                            </tr>
                        </thead>

                        <tbody>
                        @forelse ($mutasi as $item)
                            {{-- HEADER ITEM --}}
                            <tr class="bg-gray-800 text-white font-semibold">
                                <td colspan="9" class="px-3 py-2">
                                    {{ $item['item_name'] }} — {{ $item['category'] }}
                                </td>
                            </tr>

                            {{-- SALDO AWAL PER ITEM --}}
                            <tr class="bg-gray-900 text-white">
                                <td colspan="6" class="px-3 py-2 font-bold">
                                    Saldo Awal
                                </td>
                                <td colspan="3" class="px-3 py-2 font-bold text-right">
                                    {{ number_format($item['openingBalance'],0,',','.') }}
                                </td>
                            </tr>

                            {{-- DETAIL MUTASI --}}
                            @foreach ($item['rows'] as $row)
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-3 py-2">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-3 py-2 font-medium text-gray-900 dark:text-white">
                                        {{ \Carbon\Carbon::parse($row['date'])->format('d/m/Y') }}
                                    </td>
                                    <td class="px-3 py-2">
                                        {{ $item['category'] }}
                                    </td>
                                    <td class="px-3 py-2">
                                        {{ $row['source'] }}
                                    </td>
                                    <td class="px-3 py-2">
                                        {{ $item['item_name'] }}
                                    </td>
                                    <td class="px-3 py-2">
                                        {{ $row['desc'] }}
                                    </td>
                                    <td class="px-3 py-2 text-right text-green-600">
                                        {{ $row['masuk'] ? number_format($row['masuk'],0,',','.') : '-' }}
                                    </td>
                                    <td class="px-3 py-2 text-right text-red-600">
                                        {{ $row['keluar'] ? number_format($row['keluar'],0,',','.') : '-' }}
                                    </td>
                                    <td class="px-3 py-2 text-right font-semibold text-white">
                                        {{ number_format($row['saldo'],0,',','.') }}
                                    </td>
                                </tr>
                            @endforeach

                            {{-- TOTAL PER ITEM --}}
                            <tr class="bg-gray-700 text-white font-bold">
                                <td colspan="6" class="px-3 py-2 text-center">
                                    Total {{ $item['item_name'] }}
                                </td>
                                <td class="px-3 py-2 text-right">
                                    {{ number_format($item['totalIn'],0,',','.') }}
                                </td>
                                <td class="px-3 py-2 text-right">
                                    {{ number_format($item['totalOut'],0,',','.') }}
                                </td>
                                <td class="px-3 py-2 text-right">
                                    {{ number_format($item['closingBalance'],0,',','.') }}
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="9" class="px-3 py-4 text-center">
                                    Tidak ada catatan persediaan.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
