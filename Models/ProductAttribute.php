<?php

namespace Cms\Modules\Shop\Models;

class ProductAttribute extends BaseModel
{
    public $table = 'product_attributes';

    protected $fillable = ['attribute_type_id', 'product_id', 'value'];
    protected $link = false;

    public function attribute()
    {
        return $this->belongsTo(AttributeType::class, 'attribute_type_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
