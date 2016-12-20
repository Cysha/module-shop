
<div class="row" itemscope itemtype="http://schema.org/Product">
    <div class="col-md-12">
        <h1 class="hide" itemprop="name">{{ $product->name }}</h1>
        <div class="col-sm-6">
            @include(partial('shop::frontend.product.partials.carousel', compact('product')))
        </div>
        <div class="col-sm-6">
            @include(partial('shop::frontend.product.partials.details', compact('product')))
        </div>
    </div>

    <div class="col-md-12">
        @include(partial('shop::frontend.product.partials.more-info', compact('product')))
    </div>
</div>
@debug($product->toArray())
