<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => 'shop'], function (Router $router) {
    $router->get('/', ['as' => 'pxcms.shop.index', 'uses' => 'PagesController@getIndex']);
});
