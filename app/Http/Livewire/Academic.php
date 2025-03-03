<?php

namespace App\Http\Livewire;

use App\Models\AcademicType;
use Livewire\Component;

class Academic extends Component
{
    public $academicType;

    public function render()
    {
        return view('livewire.academic', [
            'academicTypes' => AcademicType::where('is_visible', true)->get(),
            'academics' => \App\Models\Academic::all(),
        ]);
    }
}
