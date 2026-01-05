<?php

namespace App\Livewire\Inventory;

use App\Models\Inventory\Inventory;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class InventoryMutasiPage extends Component
{
    public $startDate;
    public $endDate;

    public function mount()
    {
        $this->startDate = now()->startOfMonth()->format('Y-m-d');
        $this->endDate = now()->endOfMonth()->format('Y-m-d');
    }

    public function render()
    {
        // Ambil semua inventory sebelum startDate (untuk opening balance)
        $openingInventories = Inventory::where('user_id', Auth::id())
            ->where('date', '<', $this->startDate)
            ->get()
            ->groupBy('item_id');

        // Hitung opening balance per item
        $openingBalances = $openingInventories->map(function ($items) {
            $in  = $items->where('type', 'beli')->sum('quantity');
            $out = $items->where('type', 'jual')->sum('quantity');
            return $in - $out;
        });

        // Ambil mutasi dalam periode
        $rows = Inventory::with([
                'inventoryItems.itemCategories',
                'inventorySources'
            ])
            ->where('user_id', Auth::id())
            ->whereBetween('date', [$this->startDate, $this->endDate])
            ->orderBy('date')
            ->orderBy('id')
            ->get()
            ->groupBy('item_id');

        // Proses mutasi per item
        $mutasi = $rows->map(function ($items, $itemId) use ($openingBalances) {

            $runningBalance = $openingBalances[$itemId] ?? 0;

            $detail = $items->map(function ($item) use (&$runningBalance) {
                if ($item->type === 'beli') {
                    $runningBalance += $item->quantity;
                } else {
                    $runningBalance -= $item->quantity;
                }

                return [
                    'date'   => $item->date,
                    'desc'   => $item->desc,
                    'source' => $item->inventorySources->item_source_name ?? '-',
                    'masuk'  => $item->type === 'beli' ? $item->quantity : 0,
                    'keluar' => $item->type === 'jual' ? $item->quantity : 0,
                    'saldo'  => $runningBalance,
                ];
            });

            return [
                'item_id'        => $itemId,
                'item_name'      => $items->first()->inventoryItems->item_name,
                'category'       => $items->first()->inventoryItems->itemCategories->item_category_name,
                'openingBalance' => $openingBalances[$itemId] ?? 0,
                'totalIn'        => $detail->sum('masuk'),
                'totalOut'       => $detail->sum('keluar'),
                'closingBalance' => $runningBalance,
                'rows'           => $detail,
            ];
        });

        return view('livewire.inventory.inventory-mutasi-page', [
            'mutasi' => $mutasi,
        ])
        ->layout('components.layouts.app', [
            'title' => 'JoyFinory - Mutasi Persediaan'
        ]);
    }

}
