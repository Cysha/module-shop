<?php

namespace Cms\Modules\Shop\Http\Controllers\Frontend\Product;

use Cms\Modules\Shop\Http\Controllers\Frontend\BaseController;
use Cms\Modules\Shop\Models\Product;

class ProductController extends BaseController
{
    public $layout = '1-column';

    public function getAll()
    {
    }

    public function viewProduct(Product $product)
    {
        return $this->setView('frontend.product.view', [
            'product' => $product,
            'attributes' => [],
        ]);
    }
}
