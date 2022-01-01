<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddToCart extends Component
{

    public $class = [
        'btn', 'btn-primary', 'btn-lg', 'mr-2'
    ];

    public $product;

    public $count = 1;

    private $hasNewCart = false;

    public function addToCart(Product $product)
    {
        if (Auth::check())
        {
            if ($this->count < 0)
            {
                $this->count = 1;
            }

            if (Auth::user()->cart->contains('product_id', $product->id))
            {
                $cart = Auth::user()->cart()->where('product_id', $product->id)->first();

                $cart->count += $this->count;
                $cart->total_price = $cart->count * $product->price;
                $cart->save();

                $cart->refresh();
            }
            else
            {
                Auth::user()->cart()->where('product_id', $product->id)->create([
                    'product_id' => $product->id,
                    'count' => $this->count,
                    'total_price' => $this->count * $product->price,
                ]);
                $this->hasNewCart = true;
            }

            $this->emit('cartAdd', Auth::user()->cart->count() + ($this->hasNewCart ? 1 : 0));
        }
        else{
            return redirect()->route('login');
        }
    }

    public function setCount($count)
    {
        $this->count = $count;
        return $this;
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
