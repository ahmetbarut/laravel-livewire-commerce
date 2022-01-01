<div class="d-flex flex-row justify-content-around">
    <div class="input-group mb-3">
        <input type="number" wire:model="count" value="1" class="form-control" style="width: 65px" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
        <button @class($class) wire:click="addToCart('{{ $product }}')" type="button" id="button-addon1">
            Sepete Ekle <i class="fa fa-cart-plus"></i>
        </button>
    </div>
</div>
