<?php

namespace Cms\Modules\Shop\Http\Controllers\Frontend\Category;

use Cms\Modules\Shop\Http\Controllers\Frontend\BaseController;
use Cms\Modules\Shop\Models\Category;

class CategoryController extends BaseController
{
    public $layout = '1-column';

    public function getAll()
    {
    }

    public function viewCategory(Category $category)
    {
        return $this->setView('frontend.category.view', [
            'category' => $category,
            'products' => $category->products()->paginate(10),
        ]);
    }
}
