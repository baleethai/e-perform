<?php

namespace App\Http\Livewire;

use App\Models\Blog\Post;
use Livewire\Component;

class ShowNews extends Component
{
    public Post $post;

    public function render()
    {
        return view('livewire.show-news', [
            'latestPosts' => Post::latest()->take(3)->get(),
        ]);
    }
}
