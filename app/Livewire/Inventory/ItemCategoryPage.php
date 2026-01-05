<?php

namespace App\Livewire\Inventory;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Inventory\ItemCategory;
use Livewire\Attributes\Validate;

class ItemCategoryPage extends Component
{
    public $editId = null;

    #[Validate('required|min:5|unique:item_categories')]
    public $item_category_name = '';
    
    #[Validate('required|min:5')]
    public $item_category_description = '';

    public $active = true;

    public function createItemCategory()
    {
        ItemCategory::create([
            'item_category_name' => $this->item_category_name,
            'item_category_description' => $this->item_category_description,
            'active' => $this->active ? 1 : 0,
        ]);

        $this->reset();

        session()->flash('status', 'Kategori persediaan berhasil dibuat.');
    }   

    public function editItemCategory($id)
    {
        $itemCategory = ItemCategory::findOrFail($id);

        $this->editId = $id;
        $this->item_category_name = $itemCategory->item_category_name;
        $this->item_category_description = $itemCategory->item_category_description;
        $this->active = $itemCategory->active ? true : false;
    }

    public function updateItemCategory(Request $request)
    {
        $itemCategory = ItemCategory::findOrFail($this->editId);

        $this->validate([
            'item_category_name' => 'required|min:5|unique:item_categories,item_category_name,' . $itemCategory->id,
            'item_category_description' => 'required|min:5'
        ]);

        $itemCategory->update([
            'item_category_name' => $this->item_category_name,
            'item_category_description' => $this->item_category_description,
            'active' => $this->active ? 1 : 0,
        ]);

        $this->reset(['editId', 'item_category_name', 'item_category_description', 'active']);

        session()->flash('status', 'Kategori persediaan berhasil diperbarui');
    }

    public function render()
    {
        return view('livewire.inventory.item-category-page', [
            'itemCategories' => ItemCategory::orderBy('item_category_name')->paginate(20)
        ])
        ->layout('components.layouts.app', [
            'title' => 'JoyFinory - Kategori Persediaan'
        ]);
    }
}
