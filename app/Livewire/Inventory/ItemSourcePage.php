<?php

namespace App\Livewire\Inventory;

use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;
use App\Models\Inventory\ItemSource;

class ItemSourcePage extends Component
{
    public $editId = null;

    #[Validate('required|min:5|unique:item_sources')]
    public $item_source_name = '';
    
    #[Validate('required|min:5')]
    public $item_source_description = '';
    
    #[Validate('required')]
    public $item_source_platform = '';
    
    #[Validate('required|in:penyuplai,pelanggan')]
    public $item_source_type = '';

    public $active = true;

    public function createItemSource()
    {
        $this->validate();
        ItemSource::create([
            'item_source_name' => $this->item_source_name,
            'item_source_description' => $this->item_source_description,
            'item_source_platform' => $this->item_source_platform,
            'item_source_type' => $this->item_source_type,
            'active' => $this->active ? 1 : 0,
        ]);

        $this->reset();

        session()->flash('status', 'Mitra persediaan berhasil dibuat.');
    }   

    public function editItemSource($id)
    {
        $itemSource = ItemSource::findOrFail($id);

        $this->editId = $id;
        $this->item_source_name = $itemSource->item_source_name;
        $this->item_source_description = $itemSource->item_source_description;
        $this->item_source_type = $itemSource->item_source_type;
        $this->item_source_platform = $itemSource->item_source_platform;
        $this->active = $itemSource->active ? true : false;
    }

    public function updateItemSource(Request $request)
    {
        $itemSource = ItemSource::findOrFail($this->editId);

        $this->validate([
            'item_source_name' => 'required|min:5|unique:item_sources,item_source_name,' . $itemSource->id,
            'item_source_description' => 'required|min:5',
            'item_source_type' => 'required|in:penyuplai,pelanggan',
            'item_source_platform' => 'required'
        ]);

        $itemSource->update([
            'item_source_name' => $this->item_source_name,
            'item_source_description' => $this->item_source_description,
            'item_source_type' => $this->item_source_type,
            'item_source_platform' => $this->item_source_platform,
            'active' => $this->active ? 1 : 0,
        ]);

        $this->reset(['editId', 'item_source_name', 'item_source_description', 'item_source_type', 'item_source_platform', 'active']);

        session()->flash('status', 'Mitra persediaan berhasil diperbarui');
    }

    public function updatedItemSourceType()
    {
        $this->item_source_platform = '';
    }
    
    public function render()
    {
        return view('livewire.inventory.item-source-page', [
            'itemSources' => ItemSource::orderBy('item_source_name')->paginate(20)
        ])
        ->layout('components.layouts.app', [
            'title' => 'JoyFinory - Mitra Persediaan'
        ]);
    }
}
