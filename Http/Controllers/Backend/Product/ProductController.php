<?php

namespace Cms\Modules\Shop\Http\Controllers\Backend\Product;

use Cms\Modules\Admin\Traits\DataTableTrait;
use Cms\Modules\Shop\Datatables\ProductManager;

class ProductController extends BaseProductController
{
    use DataTableTrait;

    public function manager()
    {
        return $this->renderDataTable((new ProductManager())->boot());
    }
}
