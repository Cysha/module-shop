<?php

namespace Cms\Modules\Shop\Http\Controllers\Backend\Attributes;

use Cms\Modules\Shop\Datatables\AttributesManager;
use Cms\Modules\Admin\Traits\DataTableTrait;

class AttributesController extends BaseAttributeController
{
    use DataTableTrait;

    public function manager()
    {
        return $this->renderDataTable((new AttributesManager())->boot());
    }
}
