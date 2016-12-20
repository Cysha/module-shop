<?php

use Illuminate\Routing\Router;

// /shop/category/{slug}

$router->group(['prefix' => config('cms.shop.config.url_prefix', 'shop/')], function (Router $router) {

    $router->group(['prefix' => 'category', 'namespace' => 'Category'], function (Router $router) {
        $router->get('all', ['as' => 'shop.category.all', 'uses' => 'CategoryController@getAll']);
        $router->get('{shop_category_slug}', ['as' => 'shop.category.view', 'uses' => 'CategoryController@viewCategory']);

        $router->get('/', function () {
            return redirect()->route('shop.category.all');
        });
    });

    $router->group(['prefix' => 'product', 'namespace' => 'Product'], function (Router $router) {

        $router->get('{shop_product_id}-{shop_product_slug}', ['as' => 'shop.product.view', 'uses' => 'ProductController@viewProduct']);

        $router->get('/', function () {
            return redirect()->route('shop.category.all')->withInfo('Product not found. Redirected to main category page.');
        });
    });

    $router->get('/', function () {
        return redirect()->route('shop.category.all');
    });
});
