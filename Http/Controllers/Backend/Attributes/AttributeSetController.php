<?php

namespace Cms\Modules\Shop\Http\Controllers\Backend\Attributes;

use Cms\Modules\Shop\Datatables\AttributeSetManager;
use Cms\Modules\Admin\Traits\DataTableTrait;

class AttributeSetController extends BaseAttributeController
{
    use DataTableTrait;

    public function manager()
    {
        return $this->renderDataTable((new AttributeSetManager())->boot());
    }
}
