<?php

namespace Cms\Modules\Shop\Models;

class Category extends BaseModel
{
    public $table = 'categories';

    protected $fillable = ['name', 'slug', 'order'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'shop_category_product', 'category_id', 'product_id');
    }
}
