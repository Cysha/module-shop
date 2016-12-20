<?php

namespace Cms\Modules\Shop\Providers;

use Cms\Modules\Core\Providers\CmsRoutingProvider;
use Cms\Modules\Shop\Models\Category;
use Cms\Modules\Shop\Models\Product;
use Illuminate\Support\Facades\Route;

class ShopRoutingProvider extends CmsRoutingProvider
{
    protected $namespace = 'Cms\Modules\Shop\Http\Controllers';

    /**
     * @return string
     */
    protected function getFrontendRoute()
    {
        return __DIR__.'/../Http/routes-frontend.php';
    }

    /**
     * @return string
     */
    protected function getBackendRoute()
    {
        return __DIR__.'/../Http/routes-backend.php';
    }

    /**
     * @return string
     */
    protected function getApiRoute()
    {
        return __DIR__.'/../Http/routes-api.php';
    }

    public function boot()
    {
        parent::boot();

        Route::bind('shop_category_id', function ($id) {
            return Category::with(['products'])
                ->findOrFail($id);
        });

        Route::bind('shop_category_slug', function ($slug) {
            return Category::with(['products'])
                ->where('slug', $slug)
                ->firstOrFail();
        });

        Route::bind('shop_product_id', function ($id) {
            return Product::with(['categories'])
                ->findOrFail($id);
        });

        Route::bind('shop_product_slug', function ($slug) {
            return Product::with(['categories'])
                ->where('slug', $slug)
                ->firstOrFail();
        });
    }
}
