
<div class="row category">

    <div class="page-heading">
        <div class="page-title"><h2>{{ $category->name }}</h2></div>
    </div>

    <div class="col-md-6 col-md-offset-6">
        <span class="pull-right">
            {!! $products->links() !!}
        </span>
    </div>

    <div class="col-md-12">
        @forelse ($products as $product)
            @include(partial('shop::frontend.product._partial'), compact('product'))
        @empty
        <div class="alert alert-warning">
            <strong>Warning:</strong> Category has no products.
        </div>
        @endforelse
    </div>

    <div class="col-md-6 col-md-offset-6">
        <span class="pull-right">
            {!! $products->links() !!}
        </span>
    </div>

</div>


@debug($category->toArray())
