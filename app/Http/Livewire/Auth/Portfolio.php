<?php

namespace App\Http\Livewire\Auth;

use App\Models\PortfolioItem;
use Livewire\Component;

class Portfolio extends Component
{

    public $portfolios;

    public function mount()
    {
        $this->portfolios = \App\Models\Portfolio::where('personnel_id', auth()->guard('personnel')->user()->id)->get();
    }

    public function delete($id)
    {
        PortfolioItem::where('portfolio_id', $id)->delete();
        \App\Models\Portfolio::where('id', $id)->delete();
        $this->portfolios = \App\Models\Portfolio::where('personnel_id', auth()->guard('personnel')->user()->id)->get();

        session()->flash('status', 'success');
        session()->flash('message', 'ทำรายการสำเร็จ');

        return redirect(route('auth.portfolio.index'));
    }

    public function render()
    {
        return view('livewire.auth.portfolio', [
            'portfolios' => $this->portfolios,
        ]);
    }
}
