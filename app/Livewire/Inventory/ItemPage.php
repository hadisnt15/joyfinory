<?php

namespace App\Livewire\Inventory;

use Livewire\Component;
use App\Models\Inventory\Item;
use Illuminate\Http\Request;
use App\Models\Inventory\ItemCategory;
use Livewire\Attributes\Validate;

class ItemPage extends Component
{
    public $editId = null;

    #[Validate('required|min:5|unique:items')]
    public $item_name = '';
    
    #[Validate('required|min:5')]
    public $item_description = '';
    
    #[Validate('required|in:Pcs')]
    public $item_uom = 'Pcs';
    
    #[Validate('required|exists:item_categories,id')]
    public $item_category_id = '';

    public $active = true;

    public $itemCategories;

    public function mount()
    {
        $this->itemCategories = ItemCategory::where('active',1)->orderBy('item_category_name')->get();
    }

    public function createItem()
    {
        $this->validate();

        Item::create([
            'item_name' => $this->item_name,
            'item_description' => $this->item_description,
            'item_uom' => $this->item_uom,
            'item_category_id' => $this->item_category_id,
            'active' => $this->active ? 1 : 0,
        ]);

        $this->resetExcept('itemCategories');

        session()->flash('status', 'Persediaan berhasil dibuat.');
    }   

    public function editItem($id)
    {
        $item = Item::findOrFail($id);

        $this->editId = $id;
        $this->item_name = $item->item_name;
        $this->item_description = $item->item_description;
        $this->item_uom = $item->item_uom;
        $this->item_category_id = $item->item_category_id;
        $this->active = $item->active ? true : false;
    }

    public function updateItem(Request $request)
    {
        $item = Item::findOrFail($this->editId);

        $this->validate([
            'item_name' => 'required|min:5|unique:items,item_name,' . $item->id,
            'item_description' => 'required|min:5'
        ]);

        $item->update([
            'item_name' => $this->item_name,
            'item_description' => $this->item_description,
            'item_uom' => $this->item_uom,
            'item_category_id' => $this->item_category_id,
            'active' => $this->active ? 1 : 0,
        ]);

        $this->reset(['editId', 'item_name', 'item_description', 'item_uom', 'item_category_id', 'active']);

        session()->flash('status', 'Persediaan berhasil diperbarui');
    }


    public function render()
    {
        return view('livewire.inventory.item-page', [
            'items' => Item::with('itemCategories')->orderBy('item_name')->paginate(20)
        ])
        ->layout('components.layouts.app', [
            'title' => 'JoyFinory - Persediaan'
        ]);
    }
}
