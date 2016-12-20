<?php

namespace Cms\Modules\Shop\Datatables;

class ProductManager
{
    public function boot()
    {
        return [
            /*
             * Page Decoration Values
             */
            'page' => [
                'title' => 'Product Manager',
                'alert' => [
                    'class' => 'info',
                    'text' => '<i class="fa fa-info-circle"></i> You can manage your Products here.',
                ],
                'header' => [
                    [
                        'btn-text' => 'Create Product',
                        'btn-route' => 'admin.shop.product.create',
                        'btn-class' => 'btn btn-info btn-labeled',
                        'btn-icon' => 'fa fa-plus',
                    ],
                ],
            ],

            /*
             * Set up some table options, these will be passed back to the view
             */
            'options' => [
                'pagination' => true,
                'searching' => true,
                'ordering' => true,
                'column_search' => true,
                'sort_column' => 'order',
                'sort_order' => 'desc',
                'source' => 'admin.shop.product.manager',
                'collection' => function () {
                    $model = 'Cms\Modules\Shop\Models\Product';

                    return $model::with(['categories'])
                        ->get();
                },
            ],

            /*
             * Lists the tables columns
             */
            'columns' => [
                'name' => [
                    'th' => 'Name',
                    'tr' => function ($model) {
                        return $model->name;
                    },
                    'orderable' => true,
                    'searchable' => true,
                    'width' => '30%',
                ],

                'categories' => [
                    'th' => 'Categories',
                    'tr' => function ($model) {

                        $categories = collect($model->categories)->map(function ($category) {
                            return sprintf('<span class="label label-default">%s</span>', $category->name);
                        })->implode(' ');

                        return $categories;
                    },
                    'orderable' => true,
                    'searchable' => true,
                    'width' => '20%',
                ],

                'price' => [
                    'th' => 'Price',
                    'tr' => function ($model) {
                        return $model->price;
                    },
                    'orderable' => true,
                    'searchable' => true,
                    'width' => '7%',
                ],

                'sku' => [
                    'th' => 'SKU',
                    'tr' => function ($model) {
                        return $model->sku;
                    },
                    'orderable' => true,
                    'searchable' => true,
                    'width' => '5%',
                ],

                'stock_quantity' => [
                    'th' => 'Stock',
                    'tr' => function ($model) {
                        return $model->stock_quantity;
                    },
                    'orderable' => true,
                    'searchable' => true,
                    'width' => '5%',
                ],

                'published' => [
                    'th' => 'Published?',
                    'tr' => function ($model) {

                        $return = ($model->published)
                            ? '<span class="label label-success">Published</span>'
                            : '<span class="label label-danger">Not Published</span>';

                        return $return;
                    },
                    'orderable' => true,
                    'searchable' => true,
                    'width' => '10%',
                ],

                'actions' => [
                    'th' => 'Actions',
                    'tr' => function ($model) {
                        $return = [
                            [
                                'btn-title' => 'Edit',
                                'btn-link' => route('admin.shop.product.update', $model->id),
                                'btn-class' => 'btn btn-warning btn-xs btn-labeled',
                                'btn-icon' => 'fa fa-pencil',
                                'hasPermission' => 'update@shop_products',
                            ],
                        ];

                        return $return;
                    },
                ],
            ],
        ];
    }
}
