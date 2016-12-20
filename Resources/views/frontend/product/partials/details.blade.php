            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5 class="panel-title">{{ $product->name }}</h5>
                </div>
                <table class="table table-hover" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                    <tr itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                        <td><p>Product Reviews:</p></td>
                        <td> <span class="hide"></span>
                        <span class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </span> Rated <span itemprop="ratingValue">3.5</span>/5 based on <span itemprop="reviewCount">11</span> customer reviews</td>
                    </tr>
                    <tr>
                        <td><p>Availability:</p></td>
                        <td itemprop="availability" href="http://schema.org/{{ $product->in_stock ? 'InStock' : 'OutOfStock' }}">

                        {!! $product->in_stock ? '<span style="color: green">In Stock</span>': '<span style="color: red">Out of Stock</span>' !!}
                        </td>
                    </tr>
                    <tr>
                        <td><p>Price:</p></td>
                        <td><span class="hide" itemprop="priceCurrency">GBP</span> <span itemprop="price">{{ ($product->price) }}</span></td>
                    </tr>
                    @if( Config::get('shop::product.show-stock', true) )
                    <tr>
                        <td><p>Stock Level:</p></td>
                        <td>{{ $product->stock_quantity }}</td>
                    </tr>
                    @endif
                    @if( $product->in_stock )
                    <tr>
                        <td colspan="2">
                        <div class="add-to-cart">
                            {!! Former::open(/*route('shop.cart.add_item', $product->id)*/) !!}
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <label for="qty">Qty:</label>
                                </span>
                                <input type="number" class="input-text form-control qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                                <span class="input-group-btn">
                                    <button class="button btn btn-success btn-cart" title="Add to Cart" type="submit">Add to Cart</button>
                                </span>
                            </div>
                            {!! Former::close() !!}
                        </div>
                        </td>
                    </tr>
                    @else
                    <tr>
                        <td colspan="2">This product is out of stock ... <a href="#">Notify me when it comes back in stock.</a></td>
                    </tr>
                    @endif
                </table>
            </div>
