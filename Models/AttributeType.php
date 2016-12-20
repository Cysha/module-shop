<?php

namespace Cms\Modules\Shop\Models;

class AttributeType extends BaseModel
{
    public $table = 'attribute_types';

    protected $fillable = ['name', 'data_type', 'order', 'is_frontend', 'is_required', 'price_calc'];

    protected $casts = [
        'is_frontend' => 'boolean',
        'is_required' => 'boolean',
        'price_calc' => 'boolean',
    ];

    protected $dataTypes = [
        'text' => 'Text Field',
        'textarea' => 'Textarea',
        'date' => 'Date',
        'boolean' => 'Yes/No',
        'multiselect' => 'Multiple Select',
        'select' => 'Dropdown',
        'price' => 'Price',
        'media_image' => 'Media Image',
        'weee' => 'Fixed Product Tax',
    ];

    public function scopePriceCalc($query)
    {
        return $query->where('price_calc', 1);
    }

    public function attributeSet()
    {
        return $this->belongsToMany(AttributeSet::class, 'attribute_set_type');
    }

    public function getDataTypeAttribute($value)
    {
        return array_get($this->getDataTypes(), $value, 'text');
    }

    public function getDataTypes()
    {
        return $this->dataTypes;
    }

    public function setsCount()
    {
        return 0; //$this->attributeSet()->count();
    }
}
