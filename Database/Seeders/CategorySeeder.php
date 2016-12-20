<?php

namespace Cms\Modules\Shop\Database\Seeders;

use Carbon\Carbon;
use Cms\Modules\Shop\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $models = [
            [
                'name' => 'Console',
                'slug' => 'console',
                'order' => 1,
                'visible' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Handhelds',
                'slug' => 'handhelds',
                'order' => 2,
                'visible' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Nintendo',
                'slug' => 'nintendo',
                'order' => 3,
                'visible' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        with(new Category())->insert($models);
    }
}
