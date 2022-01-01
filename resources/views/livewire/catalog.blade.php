<div class="container">
    <div class="flex flex-row">
        <div class="col-3">
            <div class="d-flex flex-column">
                <div class="col-12">
                    <div class="d-flex flex-column">
                        @foreach($categories as $category)
                            <div class="d-flex flex-row">
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" wire:model="category" type="radio" value="{{ $category->id }}" id="category_{{ $category->id }}">
                                        <label class="form-check-label" for="category_{{ $category->id }}">
                                            {{ $category->name }}
                                        </label>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-12">
                    <h2>Filtreler</h2>
                    <div class="d-flex flex-column">
                        <div class="d-flex flex-column">
                            <label for="price" class="form-label d-block">Fiyat <sup>(minimum)</sup></label>
                            <div class="d-flex flex-row justify-content-around">
                                <div class="col-6">
                                    <input type="range" class="form-range" wire:model="priceMin" min="0" max="10000" step="1" id="price">
                                </div>
                                <div class="col-3">
                                    @if($priceMin)
                                        <span class="form-label text-red-600">$ {{ $priceMin }}</span>

                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <label for="price" class="form-label d-block">Fiyat <sup>(maksimum)</sup></label>
                            <div class="d-flex flex-row justify-content-around">
                                <div class="col-6">
                                    <input type="range" class="form-range" wire:model="priceMax" min="0" max="10000" step="1" id="price">
                                </div>
                                <div class="col-3">
                                    @if($priceMax)
                                        <span class="form-label text-red-600">$ {{ $priceMax }}</span>

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-9 d-flex flex-wrap">
            @foreach($products as $product)
                @if($product->media !== null)
                    <div class="col-4 p-1">
                        <div style="position:relative;" class="card shadow" x-data="{product_show: false}"
                             @mouseout="product_show =! product_show" @mouseover="product_show =! product_show">
                            <a href="{{ route('product.detail', $product->slug) }}">
                                <img src="{{ $product->media->path }}" class="card-img-top" alt="{{ $product->name }}">
                            </a>
                            <div class="card-body">
                                <p class="card-text">
                                </p>
                                <div class="d-flex flex-column align-items-center">
                                    <h4 class="name">{{ $product->name }}</h4>
                                    <h5 class="price">$ {{ $product->price }}</h5>
                                </div>
                                <div class="detail" x-show="product_show" x-transition>
                                    <div class="d-flex flex-row justify-content-center align-items-center">
                                        <div class="d-flex flex-row justify-content-around">
                                            <div class="input-group mb-3">
                                                <input type="number" wire:model="count" value="1" class="form-control" style="width: 65px" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                                <button class="btn btn-primary" wire:click="add('{{ $product->slug }}', {{ $count }})" type="button" id="button-addon1">
                                                    Sepete Ekle <i class="fa fa-cart-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
@push('scripts')
    <script>
        window.onscroll = function (ev) {
            if ((Math.ceil(window.scrollY + window.innerHeight)) >= document.body.offsetHeight) {
                window.livewire.emit('load-more');
            }
        };
    </script>
@endpush
