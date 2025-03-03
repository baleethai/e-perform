<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Logout extends Component
{

    public function mount()
    {
        auth()->guard('personnel')->logout();
        return $this->redirect(route('home.index'));
    }

    public function render()
    {
        return view('livewire.logout');
    }
}
