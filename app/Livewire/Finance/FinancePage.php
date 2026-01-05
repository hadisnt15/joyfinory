<?php

namespace App\Livewire\Finance;

use App\Models\Finance\Finance;
use Livewire\Component;
use App\Models\Finance\FinanceCategory;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class FinancePage extends Component
{
    public $financeId;
    public $date;
    public $type;
    public $category_id;
    public $desc;
    public $amount = 0;
    
    public $financeCategories = [];
    public $isEdit = false;
    
    public $rules = [
        'date' => 'required|date',
        'type' => 'required|in:in,out',
        'category_id' => 'required|exists:finance_categories,id',
        'desc' => 'required|string',
        'amount' => 'nullable|numeric',
    ];

    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public function mount()
    {
        // $this->financeCategories = FinanceCategory::where('active',1)->orderBy('category_name')->get();
        $this->loadFinanceCategories();
    }

    public function loadFinanceCategories()
    {
        if ($this->type === 'in') {
            $this->financeCategories = FinanceCategory::where('category_type', 'in')->where('active',1)->orderBy('category_name')->get();
        } elseif ($this->type === 'out') {
            $this->financeCategories = FinanceCategory::where('category_type', 'out')->where('active',1)->orderBy('category_name')->get();
        } else {
            $this->financeCategories = collect();
        }
    }

    public function updatedType()
    {
        // $this->item_source_id = null;
        $this->loadFinanceCategories();
    }

    public function save()
    {
        $this->validate();

        // $amount = $this->type === 'in' ? abs($this->amount) : abs($this->amount) * -1;

        Finance::updateOrCreate(
            ['id' => $this->financeId],
            [
                'user_id' => Auth::id(),
                'date' => $this->date,
                'type' => $this->type,
                'category_id' => $this->category_id,
                'desc' => $this->desc,
                'amount'  => $this->amount,
                'inventory_id'  => 0
            ]
        );

        $this->resetForm();
        session()->flash('success', 'Data pencatatan keuangan disimpan.');
    }

    public function edit($id)
    {
        $finance = Finance::findOrFail($id);

        $this->financeId = $finance->id;
        $this->date = $finance->date;
        $this->type = $finance->type;
        $this->loadFinanceCategories();
        $this->category_id = $finance->category_id;
        $this->desc = $finance->desc;
        $this->amount = $finance->amount;

        $this->isEdit = true;
    }

    public function delete($id)
    {
        Finance::findOrFail($id)->delete();
        session()->flash('success', 'Data pencatatan keuangan dihapus');
    }

    public function resetForm()
    {
        $this->reset([
            'financeId',
            'date',
            'type',
            'category_id',
            'desc',
            'amount',
            'isEdit'
        ]);
        $this->type = 'in';
        $this->isEdit = false;
    }
    
    public function render()
    {
        return view('livewire.finance.finance-page', [
            'finances' => Finance::with('financeCategories')->where('user_id', Auth::id())
            ->orderBy('date','desc')
            ->orderBy('id','desc')
            ->paginate(20)
        ])
        ->layout('components.layouts.app', [
            'title' => 'JoyFinory - Catatan Keuangan'
        ]);
    }
}
