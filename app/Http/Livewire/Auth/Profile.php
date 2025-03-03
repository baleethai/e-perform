<?php

namespace App\Http\Livewire\Auth;

use App\Models\Position;
use App\Models\Prefix;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;
use WireUi\Traits\Actions;

class Profile extends Component implements HasForms
{
    use Actions;
    use InteractsWithForms;
    public $prefixes = [];
    public $positions = [];
    public $prefix_id;
    public $position_id;
    public $code;
    public $first_name;
    public $last_name;
    public $id_card;
    public $birthdate;
    public $work_start_date;
    public $bio;
    public $remark;
    public $email;
    public $password;

    public function mount()
    {
        $this->prefixes = Prefix::all();
        $this->positions = Position::all();

        $this->prefix_id = auth()->guard('personnel')->user()->prefix_id;
        $this->position_id = auth()->guard('personnel')->user()->position_id;
        $this->first_name = auth()->guard('personnel')->user()->first_name;
        $this->last_name = auth()->guard('personnel')->user()->last_name;
        $this->code = auth()->guard('personnel')->user()->code;
        $this->email = auth()->guard('personnel')->user()->email;
        $this->id_card = auth()->guard('personnel')->user()->id_card;
        $this->birthdate = auth()->guard('personnel')->user()->birthdate;
        $this->work_start_date = auth()->guard('personnel')->user()->work_start_date;
        $this->bio = auth()->guard('personnel')->user()->bio;

    }

    protected $rules = [
        'prefix_id' => 'required',
        'position_id' => 'required',
    ];

    public function submit()
    {
        $this->validate();

        auth()->guard('personnel')->user()->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'bio' => $this->bio,
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'ทำรายการสำเร็จ');

    }

    public function render()
    {
        return view('livewire.auth.profile');
    }
}
