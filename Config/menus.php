<?php

/**
 * TODO: add a link here to the docs for config/menus.php.
 */
return [

    'backend_sidebar' => [
        [
            'text' => 'Shop',
            'type' => 'header',
            'order' => 200,
        ],
        [
            'route' => 'admin.shop.product.manager',
            'text' => 'Product Manager',
            'icon' => 'fa-cubes',
            'order' => 201,
            'permission' => 'read@shop_products',
            'activePattern' => '\/{backend}\/shop\/*',
        ],
        'Shop Attributes' => [
            'order' => 202,
            'children' => [
                [
                    'route' => 'admin.shop.attributeset.manager',
                    'text' => 'Attribute Set Manager',
                    'icon' => 'fa-cubes',
                    'order' => 1,
                    'permission' => 'read@shop_attributeset',
                    'activePattern' => '\/{backend}\/shop\/attribute-set\/*',
                ],
                [
                    'route' => 'admin.shop.attributes.manager',
                    'text' => 'Attributes Manager',
                    'icon' => 'fa-cube',
                    'order' => 2,
                    'permission' => 'read@shop_attributes',
                    'activePattern' => '\/{backend}\/shop\/attributes\/*',
                ],
            ],
        ],
    ],

];
