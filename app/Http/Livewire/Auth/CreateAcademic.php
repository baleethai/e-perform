<?php

namespace App\Http\Livewire\Auth;

use App\Models\AcademicType;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateAcademic extends Component
{

    use WithFileUploads;

    public $academic_type_id;
    public $name;
    public $description;
    public $author;
    public $is_visible;
    public $document;

    protected $rules = [
        'academic_type_id' => 'required',
        'name' => 'required',
        'description' => 'required',
        'is_visible' => 'required',
        'author' => 'required',
    ];

    public function submit()
    {
        $validateData = $this->validate();

        $document = $this->document->store('/');
        $validateData['document'] = $document;
        \App\Models\Academic::create($this->validate());

        session()->flash('status', 'success');
        session()->flash('message', 'ทำรายการสำเร็จ');

        return redirect(route('auth.academic.index'));

    }
    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $academicTypes = AcademicType::all();
        return view('livewire.auth.create-academic', compact('academicTypes'));
    }
}
