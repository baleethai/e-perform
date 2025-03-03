<?php

namespace App\Http\Livewire\Auth;

use App\Models\AcademicType;
use Livewire\Component;

class EditAcademic extends Component
{
    public \App\Models\Academic $academic;

    public $academic_type_id;
    public $name;
    public $description;
    public $author;
    public $is_visible;
    public $document;

    public function render()
    {
        return view('livewire.auth.edit-academic', [
            'academicTypes' => AcademicType::all(),
        ]);
    }
}
