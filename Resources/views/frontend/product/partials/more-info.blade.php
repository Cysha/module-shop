        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">More Information</h3>
                <span class="pull-right">
                    <ul class="nav panel-tabs">
                        <li class="active"><a data-toggle="tab" href="#description">Explore Product</a></li>
                        @if(count($attributes))
                        <li class=""><a data-toggle="tab" href="#specifications">Specifications</a></li>
                        @endif
                        <li><a data-toggle="tab" href="#reviews">Product Reviews</a></li>
                    </ul>
                </span>
            </div>
            <div class="panel-body">
                <div class="tab-content">
                    <div id="description" class="tab-pane active" itemprop="description">
                        {{ $product->MarkdownLongDescription }}
                    </div>

                    @if(!count($attributes))
                    <div id="specifications" class="tab-pane">
                        <table class="table table-striped table-bordered">
                            <tbody>
                                @foreach($attributes as $name => $value)
                                <tr>
                                    <td><strong>{{ $name }}</strong></td>
                                    <td>{{ $value }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                    <div id="reviews" class="tab-pane">
                    </div>

                </div>
            </div>
        </div>
