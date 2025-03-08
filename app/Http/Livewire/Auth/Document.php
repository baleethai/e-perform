<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class Document extends Component
{
    public $document_type_id,$personnel_id,$name,$description,$files;
    public $updateMode = false;

    public function render()
    {
        $this->documents = \App\Models\Document::all();
        return view('livewire.auth.document');
    }

    private function resetInputFields(){
        $this->document_type_id = '';
        $this->personnel_id = '';
        $this->name = '';
        $this->description = '';
        $this->files = '';
    }

    public function store()
    {
        $validatedData = $this->validate([
            'document_type_id' => 'required',
            'personnel_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'files' => 'nullable',
        ]);

        \App\Models\Document::create($validatedData);

        session()->flash('message', 'Document Created Successfully.');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $document = \App\Models\Document::findOrFail($id);
        $this->id = $id;
        $this->document_type_id = $document->document_type_id;
        $this->personnel_id = $document->personnel_id;
        $this->name = $document->name;
        $this->description = $document->description;
        $this->files = $document->descriptifileson;

        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedData = $this->validate([
            'document_type_id' => 'required',
            'personnel_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'files' => 'nullable',
        ]);

        $document = \App\Models\Document::find($this->id);
        $document->update([
            'document_type_id' => $this->document_type_id,
            'personnel_id' => $this->personnel_id,
            'name' => $this->name,
            'description' => $this->description,
            'files' => $this->files,
        ]);

        $this->updateMode = false;

        session()->flash('message', 'Post Updated Successfully.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        \App\Models\Document::find($id)->delete();
        session()->flash('message', 'Document Deleted Successfully.');
    }

}
