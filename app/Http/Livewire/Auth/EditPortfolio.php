<?php

namespace App\Http\Livewire\Auth;

use App\Models\PortfolioItem;
use App\Models\PortfolioType;
use Illuminate\Http\Request;
use Livewire\Component;

class EditPortfolio extends Component
{
    public $portfolioType = [];
    public $portfolio;
    public $name;
    public $result;
    public $started_at;
    public $ended_at;
    public $description;
    public $items = [];
    public $data = [];


    public function mount(\App\Models\Portfolio $portfolio)
    {
        $this->portfolioTypes = PortfolioType::where('is_visible', true)->get();
        $this->portfolio = $portfolio;
        $this->name = $portfolio->name;
        $this->started_at = $portfolio->started_at->format('Y-m-d');
        $this->ended_at = $portfolio->ended_at->format('Y-m-d');
        $this->description = $portfolio->description;
        $this->portfolios = \App\Models\Portfolio::where('personnel_id', auth()->guard('personnel')->user()->id)->get();
        $data = [];
        foreach ($this->portfolio->portfolioItems()->orderBy('sort', 'ASC')->get() as $item) {
            $data[] = $item->toArray();
        }

        $this->items = $data;
    }

    protected $rules = [
        'name' => 'required',
        'started_at' => 'required|date',
        'ended_at' => 'required|date',
        'description' => 'required',
    ];

    public function submit(Request $request)
    {
        $data = $this->validate();

        $this->portfolio->update($data);
        if (count($this->items) > 0) {
            foreach ($this->items as $item) {
                PortfolioItem::where('id', $item['id'])->update([
                    'portfolio_type_id' => $item['portfolio_type_id'],
                    'name' => $item['name'],
                    'result' => $item['result'],
                    'sort' => $item['sort'],
                ]);
            }
        }

        $data = [];
        foreach ($this->portfolio->portfolioItems()->orderBy('sort', 'ASC')->get() as $item) {
            $data[] = $item->toArray();
        }

        $this->items = $data;

        session()->flash('status', 'success');
        session()->flash('message', 'อัปเดตข้อมูลสำเร็จ');

    }

    public function addItem()
    {
        $this->portfolio->portfolioItems()->create([
            'portfolio_id' => $this->portfolio->id,
            'portfolio_type_id' => 1,
            'name' => '',
            'sort' => $this->portfolio->portfolioItems->count()+1,
        ]);
        $this->items = $this->portfolio->portfolioItems()->get()->toArray();
    }

    public function removeItem($id)
    {
        PortfolioItem::where('id', $id)->delete();
        $this->items = $this->portfolio->portfolioItems()->get()->toArray();
    }

    public function render()
    {
        return view('livewire.auth.edit-portfolio');
    }
}
