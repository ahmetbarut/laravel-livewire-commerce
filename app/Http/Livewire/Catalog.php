<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Catalog extends Component
{
    public $products;

    public $perPage = 10;

    protected $listeners = [
        'load-more' => 'loadMore',
        'updated'
    ];

    public $categories;

    public $category;

    public $priceMax = 0;

    public $priceMin = 0;

    public $count = 1;

    public function add(Product $product)
    {
        (new AddToCart())->setCount($this->count)->addToCart($product);
        $this->count = 1;
    }

    public function loadMore()
    {
        $this->perPage += 10;
        $this->emit('updated');
    }

    public function updated()
    {
        $this->products = \App\Models\Product::limit($this->perPage)
            ->when($this->category, function ($query, $category){
                $query->where('category_id', $category);
            })
            ->when($this->priceMax, function ($query, $priceMax){
                $query->where('price', '<=', $priceMax);
            })
            ->when($this->priceMin, function ($query, $priceMin){
                $query->where('price', '>=', $priceMin);
            })
            ->get();
    }

    public function mount()
    {
        $this->products = \App\Models\Product::limit($this->perPage)->get();
        $this->categories = \App\Models\Category::all();
    }

    public function render()
    {
        return view('livewire.catalog')->extends('layouts.app');
    }
}
