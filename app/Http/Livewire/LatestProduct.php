<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LatestProduct extends Component
{
    public $title;

    public $count = 5;

    protected $listeners = ['add'];

    public $cartTotal = 0;

    public function render()
    {
        return view('livewire.latest-product')->with([
            'products' => \App\Models\Product::latest()->take($this->count)->get()
        ]);
    }
}
