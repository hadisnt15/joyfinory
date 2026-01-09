<?php

namespace App\Livewire\Gallery;

use Livewire\Component;
use App\Models\Gallery\Gallery;

class LaughTalePage extends Component
{
    public function render()
    {
        return view('livewire.gallery.laugh-tale-page', [
            'laughtales' => Gallery::orderBy('id','desc')->get()
        ])
        ->layout('components.layouts.app', [
            'title' => 'JoyFinory - Our Laughtales'
        ]);
    }
}
