<div id="search-product" x-show="search_area" x-transition>
    <div>
        <div class="d-flex align-items-center flex-column">
            <div class="col-3 justify-content-center d-flex mt-3 mb-5">
                <button class="rounded-circle rounded btn btn-dark" @click="search_area =! search_area">
                    <i class="fa fa-times"></i>
                </button>
            </div>
            <div class="col-4 mt-5">
                <input class="form-control" name="search" type="search" wire:model="search" placeholder="Arama Yapın">
            </div>
            <div class="col-4" id="search-result">
                <ul class="list-group">
                    @foreach($products as $product)
                    <li class="list-group-item">
                        <a href="{{ route('product.detail', $product->slug) }}" class="d-flex flex-row justify-content-between align-items-center text-dark text-decoration-none">
                            <div class="col-3">
                                @if($product->media != null)
                                    <img src="{{ $product->media->path }}" class="img-fluid rounded-circle" style="width: 30px;height: 30px;">
                                @endif
                            </div>
                            <div class="col-6">
                                <span class="text-end">{{ $product->name }}</span>
                            </div>
                            <div class="col-3 text-end">
                                <span class="text-end">$ {{ $product->price }}</span>
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
