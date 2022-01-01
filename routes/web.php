<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/sepet', \App\Http\Livewire\CartCheckOut::class)->name('cart.index');
Route::get('/urunler', \App\Http\Livewire\Catalog::class)->name('catalog.index');
Route::get('/urun/{product}', \App\Http\Livewire\ProductDetail::class)->name('product.detail');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
