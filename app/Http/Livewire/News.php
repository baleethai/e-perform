<?php

namespace App\Http\Livewire;

use Livewire\Component;

class News extends Component
{
    public function render()
    {
        return view('livewire.news', [
            'news' => \App\Models\Blog\Post::latest()->simplePaginate(9)
        ]);
    }
}
