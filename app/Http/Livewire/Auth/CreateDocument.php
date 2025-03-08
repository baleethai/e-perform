<?php

namespace App\Http\Livewire\Auth;

use App\Models\DocumentType;
use Livewire\Component;

class CreateDocument extends Component
{
    public function render()
    {
        return view('livewire.auth.create-document', [
            'documentTypes' => DocumentType::pluck('name', 'id')->all(),
        ]);
    }
}
