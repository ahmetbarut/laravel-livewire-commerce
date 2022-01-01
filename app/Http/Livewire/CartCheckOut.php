<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Cart;

class CartCheckOut extends Component
{
    use AuthorizesRequests;

    public $carts;

    public function mount()
    {
        if (Auth::check()) {
            $this->carts = Auth::user()->cart;
        }
    }

    public function removeItemFromCart(Cart $cart)
    {
        $this->authorize('update', $cart);

        if ($cart->count > 1)
        {
            $cart->count--;
            $cart->save();
        }
        else
        {
            $cart->delete();
            $this->products = Auth::user()->cart;
            $this->emit('itemRemoved');
        }

        $this->carts = Auth::user()->cart;
    }

    public function removeItem(Cart $cart)
    {
        $this->authorize('delete', $cart);

        $cart->delete();
        $this->emit('itemRemoved');
    }

    public function render()
    {
        return view('livewire.cart-check-out')->extends('layouts.app');
    }
}
