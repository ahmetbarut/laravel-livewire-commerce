<div id="latest-product">
   <div class="container p-5">
      <div class="row">
         <div class="col-md-12">
            <h2 class="text-center">{{ $title }}</h2>
         </div>
      </div>
       <div class="d-flex flex-wrap justify-content-between">
           @foreach($products as $product)
           <div class="col-4">
               <div style="position:relative;" class="card shadow" x-data="{product_show: false}" @mouseout="product_show =! product_show" @mouseover= "product_show =! product_show" >
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
                               @livewire('add-to-cart', ['product' => $product->slug])
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           @endforeach
       </div>
   </div>
</div>
