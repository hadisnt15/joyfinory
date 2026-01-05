<?php

use App\Livewire\Counter;

use App\Livewire\Auth\Login;
use App\Livewire\Home\HomePage;
use App\Models\Inventory\Inventory;
use App\Livewire\Inventory\ItemPage;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Finance\FinancePage;
use Illuminate\Support\Facades\Route;
use App\Livewire\Inventory\InventoryPage;
use App\Livewire\Inventory\InventoryMutasiPage;
use App\Livewire\Inventory\ItemSourcePage;
use App\Livewire\Finance\FinanceMutasiPage;
use App\Livewire\Inventory\ItemCategoryPage;
use App\Livewire\Finance\FinanceCategoryPage;
use App\Livewire\Gallery\GalleryPage;
use App\Livewire\Gallery\LaughTalePage;

Route::get('/', HomePage::class)->name('home');

Route::get('/login', Login::class)->name('login')->middleware('guest');
Route::post('/logout', function(){
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::middleware(['auth'])->group(function(){
    Route::get('/keuangan/catatan', FinancePage::class)->name('finance.index');
    Route::get('/keuangan/mutasi', FinanceMutasiPage::class)->name('finance.mutasi');
    Route::get('/keuangan/kategori', FinanceCategoryPage::class)->name('finance.category');
    
    Route::get('/persediaan/daftar', ItemPage::class)->name('item.index');
    Route::get('/persediaan/kategori', ItemCategoryPage::class)->name('item.category');
    Route::get('/persediaan/mitra', ItemSourcePage::class)->name('item.source');
    Route::get('/persediaan/catatan', InventoryPage::class)->name('inventory.index');
    Route::get('/persediaan/mutasi', InventoryMutasiPage::class)->name('inventory.mutasi');

    Route::get('/galeri/daftar', GalleryPage::class)->name('gallery.index');
    Route::get('/galeri/laughtales', LaughTalePage::class)->name('laughtale.index');
});


Route::get('/counter', Counter::class);


