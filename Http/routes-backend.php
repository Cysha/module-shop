<?php

use Illuminate\Routing\Router;

// admin panel config
$router->group(['prefix' => 'config'], function (Router $router) {

});

// custom shop admin stuffs...
$router->group(['prefix' => 'shop'], function (Router $router) {

    $router->group(['prefix' => 'product', 'namespace' => 'Product'], function (Router $router) {
        $router->group(['prefix' => '{shop_product_id}'], function (Router $router) {

            $router->get('/', ['as' => 'admin.shop.product.update', 'uses' => 'ProductController@manager']);
        });

        $router->post('create', 'ProductController@store');
        $router->get('create', ['as' => 'admin.shop.product.create', 'uses' => 'ProductController@create']);

        $router->get('/', ['as' => 'admin.shop.product.manager', 'uses' => 'ProductController@manager']);
    });

    $router->group(['prefix' => 'attributes', 'namespace' => 'Attributes'], function (Router $router) {

        $router->get('/', ['as' => 'admin.shop.attributes.manager', 'uses' => 'AttributesController@manager']);
    });

    $router->group(['prefix' => 'attribute-sets', 'namespace' => 'Attributes'], function (Router $router) {

        $router->group(['prefix' => '{shop_attribute_set_id}'], function (Router $router) {

        });

        $router->post('create', 'AttributeSetController@store');
        $router->get('create', ['as' => 'admin.shop.attributeset.create', 'uses' => 'AttributeSetController@create']);

        $router->get('/', ['as' => 'admin.shop.attributeset.manager', 'uses' => 'AttributeSetController@manager']);
    });

});
