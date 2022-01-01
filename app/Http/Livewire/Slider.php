<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Slider extends Component
{
    public function render()
    {
        return view('livewire.slider')->with([
            'products' => Product::inRandomOrder()->take(4)->get(),
        ]);
    }
}
