<?php

namespace App\Http\Livewire\Auth;

use App\Models\AcademicType;
use Livewire\Component;

class Academic extends Component
{

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $academics = \App\Models\Academic::all();
        return view('livewire.auth.academic', compact('academics'));
    }
}
