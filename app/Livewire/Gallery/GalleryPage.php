<?php

namespace App\Livewire\Gallery;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Gallery\Gallery;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;

class GalleryPage extends Component
{
    use WithFileUploads, WithPagination;

    #[Validate('required|date')]
    public $date = '';

    #[Validate('required|min:3')]
    public $title = '';
    
    #[Validate('required|min:3')]
    public $caption = '';

    #[Validate('image|max:4096')]
    public $photo;

    public $galleryId;
    public $isEdit = false;
    public $oldPhoto;

    public function resetForm()
    {
        $this->reset([
            'galleryId',
            'date',
            'photo',
            'oldPhoto',
            'title',
            'caption',
            'isEdit'
        ]);
        $this->isEdit = false;
    }

    public function saveMoment()
    {
        $validated = $this->validate();
        
        if ($this->photo) {
            $validated['photo'] = $this->photo->store('out_moments', 'public');
        }

        Gallery::updateOrCreate(
            ['id' => $this->galleryId],
            [
                'date' => $this->date,
                'title' => $this->title,
                'caption' => $this->caption,
                'photo' => $validated['photo']
            ]
        );

        $this->resetForm();
        session()->flash('success', 'Our laughtale saved 🫰 Let’s create more Laughtales together!');
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);

        $this->galleryId = $gallery->id;
        $this->date = $gallery->date;
        $this->caption = $gallery->caption;
        $this->title = $gallery->title;
        $this->oldPhoto = $gallery->photo;

        $this->isEdit = true;
    }

    public function delete($id)
    {
        Gallery::findOrFail($id)->delete();
        session()->flash('success', 'Data galeri dihapus, ayo buat lagi');
    }

    public function render()
    {
        return view('livewire.gallery.gallery-page', [
            'galleries' => Gallery::orderBy('date','desc')->orderBy('id','desc')->paginate(10)
        ])
        ->layout('components.layouts.app', [
            'title' => 'JoyFinory - Daftar Galeri'
        ]);
    }
}
