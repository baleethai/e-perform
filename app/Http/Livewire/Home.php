<?php

namespace App\Http\Livewire;

use App\Models\Banner;
use App\Models\Blog\Post;
use Livewire\Component;

class Home extends Component
{

    public $news;

    public function render()
    {
        $banners = Banner::where('is_visible', true)->get();
        return view('livewire.home', [
            'posts' => collect([]),
            'academics' => \App\Models\Academic::latest()->take(6)->get(),
            'banners' => $banners,
        ]);
    }
}
