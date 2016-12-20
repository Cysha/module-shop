<?php

namespace Cms\Modules\Shop\Models;

class Product extends BaseModel
{
    public $table = 'products';

    protected $fillable = array(
        'id', 'name', 'slug', 'sku', 'published',
        'rating_cache', 'rating_count',
        'short_description', 'long_description',
        'base_value', 'cost', 'profit', 'tax_id', 'special_value', 'special_type', 'stock_quantity', 'in_stock',
    );

    protected $casts = [
        'published' => 'boolean',
        'price' => 'integer',
    ];

    protected $identifiableName = 'name';
    protected $link = [
        'route' => 'shop.product.view',
        'attributes' => ['shop_product_id' => 'id', 'shop_product_slug' => 'slug'],
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'shop_category_product', 'product_id', 'category_id');
    }

    /*public function image(){
        return $this->hasMany(ProductImage::class);
    }*/

    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function getPriceAttribute($price)
    {
        return number_format($price, 2);
    }

    public function transform()
    {
        $return = [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => (string) $this->slug,
            'created' => date_array($this->created_at),
            'updated' => date_array($this->updated_at),

            'links' => [
                'self' => (string) $this->makeLink(false),
                'href' => (string) $this->makeLink(true),
            ],
        ];

        return $return;
    }
}
