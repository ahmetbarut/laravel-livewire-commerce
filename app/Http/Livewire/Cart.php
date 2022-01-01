<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Cart extends Component
{
    protected $listeners = ['cartAdd', 'itemRemoved'];

    public $cartTotal = 0;

    public function cartAdd($total)
    {
        $this->cartTotal = $total;
    }

    public function itemRemoved()
    {
        $this->cartTotal--;
    }

    public function mount()
    {
        if (Auth::check()) {
            $this->cartTotal = Auth::user()->cart->count();
        }
        else {
            $this->cartTotal = 0;
        }
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
