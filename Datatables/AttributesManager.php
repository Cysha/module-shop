<?php

namespace Cms\Modules\Shop\Datatables;

class AttributesManager
{
    public function boot()
    {
        return [
            /*
             * Page Decoration Values
             */
            'page' => [
                'title' => 'Attributes Manager',
                'alert' => [
                    'class' => 'info',
                    'text' => '<i class="fa fa-info-circle"></i> You can manage your Product Attributes here.',
                ],
                'header' => [
                    [
                        'btn-text' => 'Create Attributes',
                        'btn-route' => 'admin.shop.attributes.create',
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
                'source' => 'admin.shop.attributes.manager',
                'collection' => function () {
                    $model = 'Cms\Modules\Shop\Models\AttributeType';

                    return $model::all();
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
                    'width' => '10%',
                ],

                'data_type' => [
                    'th' => 'Data Type',
                    'tr' => function ($model) {
                        return $model->data_type;
                    },
                    'orderable' => true,
                    'searchable' => true,
                    'width' => '10%',
                ],

                'is_frontend' => [
                    'th' => 'Show on Frontend?',
                    'tr' => function ($model) {

                        $return = ($model->is_frontend)
                            ? '<span class="label label-success">Shown</span>'
                            : '<span class="label label-warning">Not Shown</span>';

                        return $return;
                    },
                    'orderable' => true,
                    'searchable' => true,
                    'width' => '10%',
                ],

                'is_required' => [
                    'th' => 'Show on Frontend?',
                    'tr' => function ($model) {

                        $return = ($model->is_required)
                            ? '<span class="label label-success">Required</span>'
                            : '<span class="label label-warning">Not Required</span>';

                        return $return;
                    },
                    'orderable' => true,
                    'searchable' => true,
                    'width' => '10%',
                ],

                'price_calc' => [
                    'th' => 'Usable in Price Calculation?',
                    'tr' => function ($model) {

                        $return = ($model->price_calc)
                            ? '<span class="label label-success">Usable</span>'
                            : '<span class="label label-warning">Not Usable</span>';

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
                                'btn-link' => route('admin.shop.attributes.update', $model->id),
                                'btn-class' => 'btn btn-warning btn-xs btn-labeled',
                                'btn-icon' => 'fa fa-pencil',
                                'hasPermission' => 'update@shop_attributes',
                            ],
                        ];

                        return $return;
                    },
                ],
            ],
        ];
    }
}
