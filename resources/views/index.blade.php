@extends('layouts.app')
@section('content')
        <div class="slider-area bg-light">
            @livewire('slider')
        </div>
        <livewire:latest-product :title="'Son ürünler'" :count="6"/>

        <livewire:latest-product :title="'Popüler Ürünler'" :count="21"/>
        <div class="d-flex justify-content-center">
            <a href="{{ route('catalog.index') }}" class="btn btn-danger text-center">Daha Fazla Ürün</a>
        </div>

        <div class="info d-flex flex-row justify-content-center container p-5">
            <div class="col-3 mt-3 text-white p-4">
                <h4>
                    Ücretsiz kargo
                </h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum dignissimos et, labore omnis pariatur
                    perspiciatis totam. Doloribus labore nam, natus placeat unde velit voluptatum! Cupiditate eum maxime
                    neque soluta voluptatibus!</p>
            </div>
            <div class="col-3 mt-3 text-white p-4">
                <h4>
                    Güvenli Ödeme
                </h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A asperiores dicta ea eaque eos fuga
                    possimus quam sapiente sed! Animi consequuntur, cupiditate dolor eveniet fugit illo laudantium
                    provident vitae. Temporibus!</p>
            </div>
            <div class="col-3 mt-3 text-white p-4">
                <h4>
                    Kolay iade
                </h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae distinctio, dolore eos illum libero
                    neque nisi non perferendis sit voluptate. Ad at autem enim esse laboriosam omnis qui sapiente
                    tempore.
                </p>
            </div>
        </div>
@endsection
