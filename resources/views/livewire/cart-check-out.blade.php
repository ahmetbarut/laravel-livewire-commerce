<div>
    <div class="d-flex justify-content-center">
        <div class="col-8">
            @if($carts === null)
                <div class="alert alert-info">
                    <h4 class="alert-heading">Sepetiniz Boş :((</h4>

                    <div class="mt-2">
                        <p>
                            <a href="{{ route('home') }}" class="btn btn-primary">
                                <i class="fa fa-shopping-cart"></i>
                                Alışverişe Devam Et
                            </a>
                        </p>
                    </div>
                </div>
            @else
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Count</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($carts as $product)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $product->product->name }}
                            </td>
                            <td>
                                {{ $product->count }} X $ {{ $product->product->price }}
                            </td>
                            <td>
                                $ {{ $product->count * $product->product->price }}
                            </td>
                            <td>
                                <div class="d-flex flex-row justify-content-around">
                                    <a href="#" wire:click="removeItemFromCart({{ $product->id }})" class="text-danger">
                                        <i class="fa fa-minus"></i>
                                    </a>
                                    <a href="#" class="text-decoration-none" wire:click="removeItem({{ $product->id }})">
                                        <i class="fa fa-trash text-red-700"></i>
                                        <i class="fa fa-trash text-red-700"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="3">
                            <h4>Total</h4>
                        </td>
                        <td>
                            <h4>
                                $ {{ $carts->map(function($cart){
                                    return($cart->product->price) * ($cart->count);
                                    }
                                    )->sum() }}
                            </h4>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            @endif
        </div>
    </div>
</div>
