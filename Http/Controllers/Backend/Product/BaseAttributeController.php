<?php

namespace Cms\Modules\Shop\Http\Controllers\Backend\Product;

use Cms\Modules\Shop\Http\Controllers\Backend\BaseController;
use Cms\Modules\Shop\Models\Product;

class BaseProductController extends BaseController
{
    public function getProductDetails(Product $product)
    {
        Former::populate($product);

        return compact('product');
    }
}
