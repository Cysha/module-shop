<?php

namespace Cms\Modules\Shop\Database\Seeders;

use Carbon\Carbon;
use Cms\Modules\Shop\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        $models = [
            [
                'name' => '3DS',
                'slug' => '3ds',
                'sku' => '3ds',
                'published' => true,
                'short_description' => 'Nintendo 3DS',

                'base_value' => 199.00,
                'cost' => 0,
                'profit' => 0,
                'special_value' => 0,
                'special_type' => 'value',
                'tax_id' => 0,
                'stock_quantity' => 5,
                'in_stock' => true,

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'PSP',
                'slug' => 'PSP',
                'sku' => 'PSP',
                'published' => true,
                'short_description' => 'Playstation Portable',

                'base_value' => 250.00,
                'cost' => 0,
                'profit' => 0,
                'special_value' => 0,
                'special_type' => 'value',
                'tax_id' => 0,
                'stock_quantity' => 2,
                'in_stock' => true,

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        with(new Product())->insert($models);

        $models = [
            ['category_id' => 1, 'product_id' => 1],
            ['category_id' => 2, 'product_id' => 1],
            ['category_id' => 3, 'product_id' => 1],
            ['category_id' => 1, 'product_id' => 2],
            ['category_id' => 2, 'product_id' => 2],
        ];

        \DB::table('shop_category_product')->insert($models);
    }
}
