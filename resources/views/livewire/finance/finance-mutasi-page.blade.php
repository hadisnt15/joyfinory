<div>
    <div class="p-4">
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Tabel Mutasi Keuangan
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
                                <th scope="col" class="px-3 py-3">#</th>
                                <th scope="col" class="px-3 py-3">Tanggal</th>
                                <th scope="col" class="px-3 py-3">Kategori</th>
                                <th scope="col" class="px-3 py-3">Deskripsi</th>
                                <th scope="col" class="px-3 py-3 text-right">Masuk</th>
                                <th scope="col" class="px-3 py-3 text-right">Keluar</th>
                                <th scope="col" class="px-3 py-3 text-right">Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-3 py-2 font-bold text-white" colspan="6">
                                    Saldo Awal
                                </td>
                                <td class="px-3 py-2 font-bold text-white text-right">
                                    {{ number_format($openingBalance,0,',','.') }}
                                </td>
                            </tr>
                            @forelse ($mutasi as $m)
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-3">
                                        {{ $loop->iteration }} <br>
                                    </td>
                                    <td scope="row" class="px-3 font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                        {{ \Carbon\Carbon::parse($m['date'])->format('d/m/Y') }}
                                    </td>
                                    <td class="px-3">
                                        {{ $m['category'] }}
                                    </td>
                                    <td class="px-3">
                                        {{ $m['desc'] }}
                                    </td>
                                    <td class="px-3 text-right text-green-600">
                                        {{ $m['masuk'] ? number_format($m['masuk'],0,',','.') : '-' }}
                                    </td>
                                    <td class="px-3 text-right text-red-600">
                                        {{ $m['keluar'] ? number_format($m['keluar'],0,',','.') : '-' }}
                                    </td>
                                    <td class="px-3 text-right text-white font-semibold">
                                        {{ number_format($m['saldo'],0,',','.') }}
                                    </td>
                                </tr>
                            @empty
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-3" colspan="7">
                                        Tidak ada catatan keuangan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot class="uppercase bg-gray-700">
                            <td class="px-3 py-2 font-bold text-white text-center" colspan="4">
                                Total
                            </td>
                            <td class="px-3 py-2 font-bold text-white text-right">
                                {{ number_format($totalIn,0,',','.') }}
                            </td>
                            <td class="px-3 py-2 font-bold text-white text-right">
                                {{ number_format($totalOut,0,',','.') }}
                            </td>
                            <td></td>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
