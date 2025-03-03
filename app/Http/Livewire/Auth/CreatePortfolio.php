<?php

namespace App\Http\Livewire\Auth;

use App\Models\PortfolioType;
use Livewire\Component;

class CreatePortfolio extends Component
{
    public $portfolioType;
    public $name;
    public $started_at;
    public $ended_at;
    public $description;

    public function mount()
    {
        $this->portfolioType = PortfolioType::where('is_visible', true)->get();
    }

    protected $rules = [
        'name' => 'required',
        'started_at' => 'required|date',
        'ended_at' => 'required|date',
        'description' => 'required',
    ];

    public function submit()
    {
        $data = $this->validate();
        
        $portfolio = \App\Models\Portfolio::create($data+['personnel_id' => auth()->guard('personnel')->user()->id]);

        session()->flash('status', 'success');
        session()->flash('message', 'ทำรายการสำเร็จ');

        return redirect(route('auth.portfolio.edit', $portfolio));
    }

    public function render()
    {
        return view('livewire.auth.create-portfolio');
    }
}
