<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Http\Request;
use Livewire\Component;

class ProductDetail extends Component
{
    public $product;

    public $comment;

    public $rate;

    public $hasComment = false;

    protected $listeners = ['setRating', 'addToCart'];

    protected $rules = [
        'comment' => 'required|min:5',
        'rate' => 'required|integer|min:1|max:5',
    ];

    public function setRating($rate)
    {
        $this->rate = $rate;
    }

    public function saveComment(Product $product, Request $request)
    {

        $this->validate();

        $product->comments()->create([
            'comment' => $this->comment,
            'rating' => $this->rate,
            'user_id' => auth()->id(),
        ]);
        $this->comment = null;
        $this->rate = 0;
    }

    public function mount(Product $product)
    {
        $this->product = $product;

        $this->hasComment = $product->comments->where('user_id', auth()->id())->count() > 0;
    }

    public function addToCart()
    {
        $this->emit('add');
    }

    public function render()
    {
        return view('livewire.product-detail')->extends('layouts.app');
    }
}
