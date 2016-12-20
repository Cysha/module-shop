<?php

namespace Cms\Modules\Shop\Http\Controllers\Backend\Attributes;

use Cms\Modules\Shop\Http\Controllers\Backend\BaseController;
use Cms\Modules\Shop\Models\AttributeSet;
use Cms\Modules\Shop\Models\AttributeType;

class BaseAttributeController extends BaseController
{
    public function getSetDetails(AttributeSet $attributeSet)
    {
        Former::populate($attributeSet);

        return compact('attributeSet');
    }

    public function getTypeDetails(AttributeType $attributeType)
    {
        Former::populate($attributeType);

        return compact('attributeType');
    }
}
