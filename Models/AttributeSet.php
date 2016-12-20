<?php

namespace Cms\Modules\Shop\Models;

class AttributeSet extends BaseModel
{
    public $table = 'attribute_sets';

    protected $fillable = ['name', 'description'];

    public function getAttributes()
    {
        return $this->belongsToMany(AttributeType::class, 'attribute_set_type')
            ->orderBy('order', 'asc');
    }

    public function getAttributeCount()
    {
        return 0;
    }
}
