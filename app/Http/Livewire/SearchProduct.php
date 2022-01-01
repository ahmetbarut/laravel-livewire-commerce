<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchProduct extends Component
{
    public $search = "";

    protected $queryString = ['search'];

    public function render()
    {
        return view('livewire.search-product')->with([
            'products' => $this->search === ""
                ? []
                : \App\Models\Product::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->get(),
        ]);
    }
}
