<div class="container d-flex flex-column">
    <div class="row justify-content-center">
        <div class="col-9 d-flex flex-row justify-content-around">
            <div class="col-8">
                <h3>{{ $product->name }}</h3>

                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($product->photos as $media)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <img src="{{ $media->path }}" class="d-block w-100" alt="{{ $product->name }}">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-4 m-3 flex-column">
                <div class="col-12">
                    <h3>Ürün Hakkında</h3>
                    <p class="justify-text">
                        {{ $product->description }}
                    </p>
                </div>
                <hr>
                <div class="col-12 d-flex flex-column">
                    <div class="col-12">
                        <h3>Fiyat</h3>
                        <p class="justify-text">
                            $ {{ $product->price }}
                        </p>
                    </div>
                    <div class="col-12 d-flex flex-row">
                        @livewire('add-to-cart', ['product' => $product->slug])
                    </div>
                </div>
            </div>

        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-9">
            <h3>Ürün Detayları</h3>
            <p class="justify-text">
                {{ $product->features }}
            </p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-9 mb-4">
            <h3>Ürün Değerlendirmeleri</h3>
            <div class="d-flex flex-column">
                <div class="col-9 d-flex flex-column">
                    @foreach($product->comments as $comment)
                        <div class="d-flex flex-column">
                            <div class="d-flex flex-row justify-content-start align-items-center">
                                <div class="col-2">
                                    <img class="rounded-circle" src="{{ $comment->user->profile_photo_url }}">
                                </div>
                                <div class="col-3">
                                    {{ $comment->user->name }}
                                </div>

                                <div class="col-3 d-flex flex-row">
                                    @for($i = 0; $i < $comment->rating; $i++)
                                        <i class="fa fa-star {{ 'text-warning' }}"></i>
                                    @endfor
                                </div>
                            </div>
                            <div class="d-flex flex-row justify-content-center align-items-center">
                                <div class="col-9 bg-light rounded">
                                    <p class="p-3">
                                        {{ $comment->comment }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @if(!$loop->last)
                            <hr>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">

        <div class="col-9">
            @if($hasComment)
                <h3>Yorum Yaptınız</h3>
            @else
                <h3>Yorum Yap</h3>
            <form wire:submit.prevent="saveComment('{{ $product->slug }}')" x-data="{
                             rating: 0,
                             tempRating: 0,
                             setTempRating(rating) {
                             this.tempRating = rating;
                             },
                             setRating(rating) {
                             this.rating = rating;
                             }
                             }">
                <div class="form-group">
                    <label for="comment">Yorumunuz</label>
                    <textarea class="form-control @error('comment') is-invalid @enderror" wire:model="comment"
                              id="comment" rows="3"></textarea>
                    @error('comment')
                    <div class="alert alert-danger text-center mt-2">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="rating">Puanınız</label>
                    <div class="d-flex flex-row">
                        <div class="col-2 rating d-flex flex-row justify-content-around">
                            <div class="rating">
                                @for($i = 1; $i <= 5; $i++)
                                    <span @click="setRating('{{ $i }}')" wire:click="$emit('setRating', '{{ $i }}')"
                                          @mousemove="setTempRating('{{ $i }}')"
                                          :class="{'active': tempRating >= '{{ $i }}'} ">
                                    <i class="fa fa-star"></i>
                                </span>
                                @endfor
                            </div>
                            <input type="hidden" wire:model="rate" x-bind:value="rating">
                        </div>
                    </div>
                    @error('rating')
                    <div class="alert alert-danger text-center mt-2">{{ $message }}</div> @enderror
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" @click="rating = 0" class="btn btn-primary m-3">Gönder</button>
                </div>
            </form>
            @endif
        </div>
    </div>
</div>
