<?php

namespace App\Livewire\Finance;

use App\Models\Finance\Finance;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class FinanceMutasiPage extends Component
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
        $openingBalanceQuery = Finance::where('user_id', Auth::id())
            ->where('date', '<', $this->startDate);

        $totalInBefore = (clone $openingBalanceQuery)->where('type', 'in')->sum('amount');
        $totalOutBefore = (clone $openingBalanceQuery)->where('type', 'out')->sum('amount');

        $openingBalance = $totalInBefore - $totalOutBefore;

        $rows = Finance::with('financeCategories')
            ->where('user_id', Auth::id())
            ->whereBetween('date', [$this->startDate, $this->endDate])
            ->orderBy('date') // penting
            ->get();

        $runningBalance = $openingBalance;

        $mutasi = $rows->map(function ($item) use (&$runningBalance) {
            $runningBalance += $item->type === 'in'
                ? $item->amount
                : -$item->amount;

            return [
                'date' => $item->date, // full datetime
                'tanggal' => \Carbon\Carbon::parse($item->date)->format('Y-m-d'),
                'waktu' => \Carbon\Carbon::parse($item->date)->format('H:i'),
                'category' => $item->financeCategories->category_name ?? '-',
                'desc' => $item->desc,
                'masuk' => $item->type === 'in' ? $item->amount : 0,
                'keluar' => $item->type === 'out' ? $item->amount : 0,
                'saldo' => $runningBalance,
            ];
        })
        ->groupBy('tanggal'); // 🔥 grouping di sini

        return view('livewire.finance.finance-mutasi-page', [
            'openingBalance' => $openingBalance,
            'mutasi' => $mutasi,
            'totalIn' => $mutasi->flatten(1)->sum('masuk'),
            'totalOut' => $mutasi->flatten(1)->sum('keluar'),
            'closingBalance' => $runningBalance,
        ])
        ->layout('components.layouts.app', [
            'title' => 'JoyFinory - Mutasi Keuangan'
        ]);
    }

}
