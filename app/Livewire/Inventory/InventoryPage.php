<?php

namespace App\Livewire\Inventory;

use Livewire\Component;
use App\Models\Inventory\Item;
use App\Models\Finance\Finance;
use Livewire\Attributes\Validate;
use App\Models\Inventory\Inventory;
use App\Models\Inventory\ItemSource;
use Illuminate\Support\Facades\Auth;

class InventoryPage extends Component
{
    public $itemSources = [];
    public $items = [];
    public $isEdit = false;
    public $inventoryId;
    public $inventoryType;

    // #[Validate('required|date')]
    // public $date;
    
    #[Validate('required')]
    public $type;
    
    #[Validate('required|exists:item_sources,id')]
    public $item_source_id;
    
    #[Validate('required|exists:items,id')]
    public $item_id;
    
    #[Validate('required|string')]
    public $desc;
    
    #[Validate('required|numeric')]
    public $quantity = 0;
    
    #[Validate('required|numeric')]
    public $unit_price = 0;

    public $active = true;

    public function mount()
    {
        // $this->type = $type;
        $this->loadItemSources();
        $this->loadItems();
    }

    public function loadItems()
    {
        $this->items = Item::where('active', 1)->orderBy('item_name')->get();
    }

    public function loadItemSources()
    {
        if ($this->type === 'jual') {
            $this->itemSources = ItemSource::where('item_source_type', 'pelanggan')->orderBy('item_source_name')->get();
        } elseif ($this->type === 'beli') {
            $this->itemSources = ItemSource::where('item_source_type', 'penyuplai')->orderBy('item_source_name')->get();
        } else {
            $this->itemSources = collect();
        }
    }

    public function updatedType()
    {
        $this->item_source_id = null;
        $this->loadItemSources();
    }

    public function resetForm()
    {
        $this->reset([
            'inventoryId',
            // 'date',
            'type',
            'item_id',
            'item_source_id',
            'desc',
            'quantity',
            'unit_price',
            'isEdit'
        ]);
        $this->type = '';
        $this->isEdit = false;
    }

    public function save()
    {
        $this->validate();
        $inventory = Inventory::updateOrCreate(
            ['id' => $this->inventoryId],
            [
                'user_id' => Auth::id(),
                'date' => now(),
                'type' => $this->type,
                'item_id' => $this->item_id,
                'item_source_id' => $this->item_source_id,
                'desc' => $this->desc,
                'quantity'  => $this->quantity,
                'unit_price'  => $this->unit_price
            ]
        );
        $this->inventoryId = $inventory->id;
        $flowType = match ($this->type) {
            'jual' => 'in',
            'beli' => 'out',
        };
        Finance::updateOrCreate(
            ['inventory_id' => $this->inventoryId],
            [
                'user_id' => Auth::id(),
                'date' => now(),
                'type' => $flowType,//$this->inventoryType === 'jual' ? 'in' : 'out',
                'category_id' => $this->inventoryType === 'jual' ? 6 : 9,
                'desc' => $this->desc,
                'amount'  => $this->quantity * $this->unit_price
            ]
        );

        $this->resetForm();
        session()->flash('success', 'Data pencatatan persediaan disimpan.');
    }

    public function edit($id)
    {
        $inventory = Inventory::findOrFail($id);

        $this->inventoryId = $inventory->id;
        $this->date = $inventory->date;
        $this->type = $inventory->type;
        $this->loadItemSources();
        $this->item_source_id = $inventory->item_source_id;
        $this->item_id = $inventory->item_id;
        $this->desc = $inventory->desc;
        $this->unit_price = $inventory->unit_price;
        $this->quantity = $inventory->quantity;

        $this->isEdit = true;
    }

    public function render()
    {
        return view('livewire.inventory.inventory-page', [
            'inventories' => Inventory::with(['inventorySources','inventoryItems.itemCategories'])->where('user_id', Auth::id())
            ->orderBy('date','desc')
            ->orderBy('id','desc')
            ->paginate(20)
        ])
        ->layout('components.layouts.app', [
            'title' => 'JoyFinory - Catatan Persediaan'
        ]);
    }
}
