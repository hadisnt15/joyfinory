<div>
    <div class="p-4">
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Tabel Mutasi Persediaan
                    </h3>
                    <div class="flex gap-1 mb-4 me-4">
                        <select wire:model.live="itemId"
                            class="border rounded-md px-3 py-2 text-sm bg-white text-gray-800">
                            <option value="">Semua Barang</option>

                            @foreach ($items as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->item_name }}
                                </option>
                            @endforeach
                        </select>
                        <!-- 🔹 Date Range -->
                        <input type="date" wire:model.live="startDate"
                            class="bg-gray-50 border border-gray-300 text-xs rounded-md text-gray-700 focus:ring focus:ring-indigo-200 py-1 px-2 w-full sm:w-auto">
    
                        <input type="date" wire:model.live="endDate"
                            class="bg-gray-50 border border-gray-300 text-xs rounded-md text-gray-700 focus:ring focus:ring-indigo-200 py-1 px-2 w-full sm:w-auto">
    
                    </div>
                </div>
                <div class="overflow-x-auto overflow-y-auto max-h-[600px] relative z-10">
                    <div class="hidden md:block">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-white uppercase bg-gray-700 sticky top-0 z-20">
                                <tr>
                                    <th class="px-3 py-3">#</th>
                                    <th class="px-3 py-3">Memo</th>
                                    <th class="px-3 py-3 text-right">Masuk</th>
                                    <th class="px-3 py-3 text-right">Keluar</th>
                                    <th class="px-3 py-3 text-right">Saldo</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($mutasi as $item)

                                    {{-- ================= HEADER ITEM ================= --}}
                                    <tr class="bg-gray-800 text-white font-semibold">
                                        <td colspan="9" class="px-3 py-2">
                                            {{ $item['item_name'] }} — {{ $item['category'] }}
                                        </td>
                                    </tr>

                                    {{-- ================= SALDO AWAL ================= --}}
                                    <tr class="bg-gray-900 text-white">
                                        <td colspan="2" class="px-3 py-2 font-bold">
                                            Saldo Awal
                                        </td>
                                        <td colspan="3" class="px-3 py-2 font-bold text-right">
                                            {{ number_format($item['openingBalance'],0,',','.') }}
                                        </td>
                                    </tr>

                                    {{-- ================= MUTASI PER TANGGAL ================= --}}
                                    @foreach ($item['dates'] as $tanggal => $rows)

                                        {{-- HEADER TANGGAL --}}
                                        <tr class="bg-gray-700 text-white font-bold">
                                            <td colspan="5" class="px-3 py-2">
                                                {{ \Carbon\Carbon::parse($tanggal)->format('d/m/Y') }}
                                            </td>
                                        </tr>

                                        @foreach ($rows as $row)
                                            <tr class="border-b dark:border-gray-700">
                                                <td class="px-3 py-2">
                                                    {{ $loop->parent->iteration }}.{{ $loop->iteration }}
                                                </td>

                                                <td class="px-3 py-2 font-medium text-gray-900 dark:text-white">
                                                    <span class="text-xs font-base">{{ $row['waktu'] }}</span> - {{ $item['item_name'] }} ({{ $item['category'] }}) <br>
                                                    <span class="text-xs font-base">
                                                        @if( $row['masuk'] != 0)
                                                            Pembelian dari: {{ $row['source'] }}
                                                        @else
                                                            Penjualan ke: {{ $row['source'] }}
                                                        @endif
                                                    </span>
                                                    <span class="text-xs font-base">(Ket: {{ $row['desc'] }})</span>
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

                                    @endforeach

                                    {{-- ================= TOTAL PER ITEM ================= --}}
                                    <tr class="bg-gray-800 text-white font-bold">
                                        <td colspan="2" class="px-3 py-2 text-center">
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
                                        <td colspan="5" class="px-3 py-4 text-center">
                                            Tidak ada catatan persediaan.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                    <div class="md:hidden">
                        @forelse ($mutasi as $item)

                            {{-- ================= HEADER ITEM ================= --}}
                            <div class="bg-gray-800 text-white font-semibold rounded-lg px-4 py-2">
                                {{ $item['item_name'] }} — {{ $item['category'] }}
                            </div>

                            {{-- ================= SALDO AWAL ================= --}}
                            <div class="bg-gray-900 text-white rounded-lg px-4 py-3 flex justify-between font-bold">
                                <span>Saldo Awal</span>
                                <span>{{ number_format($item['openingBalance'],0,',','.') }}</span>
                            </div>

                            {{-- ================= MUTASI PER TANGGAL ================= --}}
                            @foreach ($item['dates'] as $tanggal => $rows)

                                {{-- HEADER TANGGAL --}}
                                <div class="text-sm font-bold text-gray-700 dark:text-white mt-4">
                                    {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}
                                </div>

                                @foreach ($rows as $row)
                                    <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow border dark:border-gray-700 space-y-2">

                                        {{-- WAKTU + JENIS --}}
                                        <div class="text-xs text-gray-500">
                                            {{ $row['waktu'] }} • 
                                            {{ $row['masuk'] ? 'Pembelian' : 'Penjualan' }}
                                        </div>

                                        {{-- ITEM --}}
                                        <div class="font-semibold text-gray-900 dark:text-white">
                                            {{ $item['item_name'] }}
                                            <span class="text-xs text-gray-500">({{ $item['category'] }})</span>
                                        </div>

                                        {{-- MITRA --}}
                                        <div class="text-sm text-gray-700 dark:text-gray-300">
                                            @if($row['masuk'])
                                                Pembelian dari: <b>{{ $row['source'] }}</b>
                                            @else
                                                Penjualan ke: <b>{{ $row['source'] }}</b>
                                            @endif
                                        </div>

                                        {{-- DESKRIPSI --}}
                                        @if($row['desc'])
                                        <div class="text-xs text-gray-500 italic">
                                            Ket: {{ $row['desc'] }}
                                        </div>
                                        @endif

                                        {{-- MASUK / KELUAR --}}
                                        <div class="flex justify-between text-sm pt-2 border-t dark:border-gray-700">
                                            <span class="text-green-600">
                                                + {{ $row['masuk'] ? number_format($row['masuk'],0,',','.') : 0 }}
                                            </span>
                                            <span class="text-red-600">
                                                - {{ $row['keluar'] ? number_format($row['keluar'],0,',','.') : 0 }}
                                            </span>
                                        </div>

                                        {{-- SALDO --}}
                                        <div class="text-right font-bold text-white">
                                            Saldo: {{ number_format($row['saldo'],0,',','.') }}
                                        </div>

                                    </div>
                                @endforeach

                            @endforeach

                            {{-- ================= TOTAL ITEM ================= --}}
                            <div class="bg-gray-800 text-white rounded-lg p-4 font-bold space-y-1">
                                <div class="flex justify-between">
                                    <span>Total Masuk</span>
                                    <span>{{ number_format($item['totalIn'],0,',','.') }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Total Keluar</span>
                                    <span>{{ number_format($item['totalOut'],0,',','.') }}</span>
                                </div>
                                <div class="flex justify-between border-t pt-2 mt-2">
                                    <span>Saldo Akhir</span>
                                    <span>{{ number_format($item['closingBalance'],0,',','.') }}</span>
                                </div>
                            </div>

                        @empty
                            <div class="text-center text-gray-500">
                                Tidak ada catatan persediaan.
                            </div>
                        @endforelse
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
