<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowAlbum extends Component
{
    public \App\Models\Album $album;

    public function render()
    {
        return view('livewire.show-album');
    }
}
