<?php

namespace App\Livewire\Finance;

use Livewire\Component;
use App\Models\Finance\FinanceCategory;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;

class FinanceCategoryPage extends Component
{
    public $editId = null;

    #[Validate('required|min:5|unique:finance_categories')]
    public $category_name = '';
    
    #[Validate('required|min:5')]
    public $category_description = '';

    public $active = true;

    public function createCategory()
    {
        $validated = $this->validate();

        FinanceCategory::create([
            'category_name' => $this->category_name,
            'category_description' => $this->category_description,
            'active' => $this->active ? 1 : 0,
        ]);

        $this->reset();

        session()->flash('status', 'Kategori keuangan berhasil ditambah.');
    }    

    public function editCategory($id)
    {
        $category = FinanceCategory::findOrFail($id);

        $this->editId = $id;
        $this->category_name = $category->category_name;
        $this->category_description = $category->category_description;
        $this->active = $category->active ? true : false;
    }

    public function updateCategory(Request $request)
    {
        $category = FinanceCategory::findOrFail($this->editId);

        $this->validate([
            'category_name' => 'required|min:5|unique:finance_categories,category_name,' . $category->id,
            'category_description' => 'required|min:5'
        ]);

        $category->update([
            'category_name' => $this->category_name,
            'category_description' => $this->category_description,
            'active' => $this->active ? 1 : 0,
        ]);

        $this->reset(['editId', 'category_name', 'category_description', 'active']);

        session()->flash('status', 'Kategori keuangan berhasil diperbarui');
    }
    
    public function render()
    {
        return view('livewire.finance.finance-category-page', [
            'categories' => FinanceCategory::orderBy('category_name')->paginate(20)
        ])
        ->layout('components.layouts.app', [
            'title' => 'JoyFinory - Kategori Keuangan'
        ]);
    }
}
