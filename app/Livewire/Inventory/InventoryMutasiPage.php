<?php

namespace App\Livewire\Inventory;

use App\Models\Inventory\Inventory;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Inventory\Item;

class InventoryMutasiPage extends Component
{
    public $startDate;
    public $endDate;
    public $itemId = null;

    public function mount()
    {
        $this->startDate = now()->startOfMonth()->format('Y-m-d');
        $this->endDate = now()->endOfMonth()->format('Y-m-d');
    }

    public function render()
    {
        $items = Item::orderBy('item_name')
            ->get();
        // ================= OPENING BALANCE =================
        $openingInventories = Inventory::where('user_id', Auth::id())
            ->where('date', '<', $this->startDate)
            ->when($this->itemId, function ($q) {
                $q->where('item_id', $this->itemId);
            })
            ->get()
            ->groupBy('item_id');

        $openingBalances = $openingInventories->map(function ($items) {
            $in  = $items->where('type', 'beli')->sum('quantity');
            $out = $items->where('type', 'jual')->sum('quantity');
            return $in - $out;
        });

        // ================= AMBIL DATA =================
        $rows = Inventory::with([
                'inventoryItems.itemCategories',
                'inventorySources'
            ])
            ->where('user_id', Auth::id())
            ->whereBetween('date', [$this->startDate, $this->endDate])
            ->when($this->itemId, function ($q) {
                $q->where('item_id', $this->itemId);
            })
            ->orderBy('date')
            ->orderBy('id')
            ->get()
            ->groupBy('item_id');


        // ================= PROSES MUTASI =================
        $mutasi = $rows->map(function ($items, $itemId) use ($openingBalances) {

            $runningBalance = $openingBalances[$itemId] ?? 0;

            $mapped = $items->map(function ($item) use (&$runningBalance) {

                $runningBalance += $item->type === 'beli'
                    ? $item->quantity
                    : -$item->quantity;

                return [
                    'date'    => $item->date, // datetime full
                    'tanggal' => \Carbon\Carbon::parse($item->date)->format('Y-m-d'),
                    'waktu'   => \Carbon\Carbon::parse($item->date)->format('H:i'),
                    'desc'    => $item->desc,
                    'source'  => $item->inventorySources->item_source_name ?? '-',
                    'masuk'   => $item->type === 'beli' ? $item->quantity : 0,
                    'keluar'  => $item->type === 'jual' ? $item->quantity : 0,
                    'saldo'   => $runningBalance,
                ];
            });

            return [
                'item_id'        => $itemId,
                'item_name'      => $items->first()->inventoryItems->item_name,
                'category'       => $items->first()->inventoryItems->itemCategories->item_category_name,
                'openingBalance' => $openingBalances[$itemId] ?? 0,
                'totalIn'        => $mapped->sum('masuk'),
                'totalOut'       => $mapped->sum('keluar'),
                'closingBalance' => $runningBalance,
                'dates'          => $mapped->groupBy('tanggal'), // 🔥 SAMA PERSIS SEPERTI FINANCE
            ];
        });

        return view('livewire.inventory.inventory-mutasi-page', [
            'mutasi' => $mutasi,
            'items' => $items,
        ])
        ->layout('components.layouts.app', [
            'title' => 'JoyFinory - Mutasi Persediaan'
        ]);
    }


}
