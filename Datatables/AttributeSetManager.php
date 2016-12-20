<?php

namespace Cms\Modules\Shop\Datatables;

class AttributeSetManager
{
    public function boot()
    {
        return [
            /*
             * Page Decoration Values
             */
            'page' => [
                'title' => 'Attribute Set Manager',
                'alert' => [
                    'class' => 'info',
                    'text' => '<i class="fa fa-info-circle"></i> You can manage your Product Attribute Sets here.',
                ],
                'header' => [
                    [
                        'btn-text' => 'Create Attribute Set',
                        'btn-route' => 'admin.shop.attributeset.create',
                        'btn-class' => 'btn btn-info btn-labeled',
                        'btn-icon' => 'fa fa-plus',
                    ],
                ],
            ],

            /*
             * Set up some table options, these will be passed back to the view
             */
            'options' => [
                'pagination' => false,
                'searching' => false,
                'ordering' => false,
                'sort_column' => 'order',
                'sort_order' => 'desc',
                'source' => 'admin.shop.attributeset.manager',
                'collection' => function () {
                    $model = 'Cms\Modules\Shop\Models\AttributeSet';

                    return $model::all();
                },
            ],

            /*
             * Lists the tables columns
             */
            'columns' => [
                'name' => [
                    'th' => 'Set Name',
                    'tr' => function ($model) {
                        return $model->name;
                    },
                    'orderable' => true,
                    'searchable' => true,
                    'width' => '40%',
                ],

                'Description' => [
                    'th' => 'Set Description',
                    'tr' => function ($model) {
                        return $model->description;
                    },
                    'orderable' => true,
                    'searchable' => true,
                    'width' => '40%',
                ],

                'actions' => [
                    'th' => 'Actions',
                    'tr' => function ($model) {
                        $return = [
                            [
                                'btn-title' => 'Edit',
                                'btn-link' => route('admin.shop.attributeset.update', $model->id),
                                'btn-class' => 'btn btn-warning btn-xs btn-labeled',
                                'btn-icon' => 'fa fa-pencil',
                                'hasPermission' => 'update@shop_attributeset',
                            ],
                        ];

                        return $return;
                    },
                ],
            ],
        ];
    }
}
