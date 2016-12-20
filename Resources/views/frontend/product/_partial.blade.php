@if ($product)
<div class="partials partial-product {{ $class or 'col-lg-3 col-md-3 col-sm-4 col-xs-6'}}">
    <div class="panel panel-default">
        <div class="panel-body">
            <?php $itemUrl = $product->makeLink(true); ?>
            <a href="{{ $itemUrl }}" class="thumbnail">
                <img src="{{ /*$product->defaultImage()->image_path*/false or 'http://placehold.it/234/234/bbbbbb/fff&amp;text=Product' }}" alt="{{ $product->name }}" />
            </a>
        </div>
        <div class="panel-footer">
            <div class="product-name">
                <h4><a href="{{ $itemUrl }}">{{ $product->name }}</a></h4>
            </div>
            <div class="product-price">
                @if($product->hasSpecialPrice)
                    <span class="btn btn-xs btn-default"><s>{{ ($product->base_price) }}</s></span>
                    {{-- <span class="btn btn-xs btn-default"><s>{{ currency($product->base_price) }}</s></span> --}}
                @endif
                <span class="btn btn-xs btn-primary">{{ ($product->price) }}</span>
                {{-- <span class="btn btn-xs btn-primary">{{ currency($product->price) }}</span> --}}
                <a href="{{ $itemUrl }}" class="btn btn-xs hidden-xs btn-success pull-right"> More Info</a>
            </div>
        </div>
    </div>
</div>

@endif
