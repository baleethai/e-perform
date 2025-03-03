<?php

namespace App\Http\Livewire;

use App\Models\AlbumType;
use Livewire\Component;

class Album extends Component
{
    public function render()
    {
        return view('livewire.album', [
            'albumTypes' => AlbumType::where('is_visible', true)->get(),
            'albums' => \App\Models\Album::where('is_visible', true)->paginate(),
        ]);
    }
}
