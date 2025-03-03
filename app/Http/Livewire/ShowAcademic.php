<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowAcademic extends Component
{
    public \App\Models\Academic $academic;

    public function mount(\App\Models\Academic $academic)
    {
        $this->academic = $academic;
    }

    public function render()
    {
        return view('livewire.show-academic');
    }
}
