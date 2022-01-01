<div>
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach ($products as $product)
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active': '' }}" aria-current="true" aria-label="Slide 1"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach($products as $product)
                <div
                    class="carousel-item {{ $loop->first ? 'active' : '' }}"
                    data-bs-interval="5000"
                >
                    <div class="container justify-content-around d-flex flex-row" style="height: 500px">
                        <div class="col-3 align-items-center d-flex justify-content-center">
                            <div class="">
                                <h5>{{ $product->name }}</h5>
                                <p>{{ $product->description }}</p>
                                <button @class('btn btn-info')>Şimdi Al</button>
                            </div>
                        </div>
                        <div class="col-4">
                            <img src="{{ $product->media->path }}" class=" w-100" alt="...">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>


{{--
<div>
    <div id="productSlider" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">

        </div>
        <div class="carousel-inner">
            @foreach($products as $product)
            <div
                class="carousel-item {{ $loop->first ? 'active' : '' }}"
                data-bs-interval="5000"
            >
                <div class="container justify-content-around d-flex flex-row" style="height: 500px">
                    <div class="col-3 align-items-center d-flex justify-content-center">
                        <div class="">
                            <h5>{{ $product->name }}</h5>
                            <p>{{ $product->description }}</p>
                            <button @class('btn btn-info')>Şimdi Al</button>
                        </div>
                    </div>
                    <div class="col-4">
                        <img src="{{ $product->media->path }}" class=" w-100" alt="...">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

--}}
