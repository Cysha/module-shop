<?php

namespace Cms\Modules\Shop\Models;

use Cms\Modules\Core\Models\BaseModel as CoreBaseModel;

class BaseModel extends CoreBaseModel
{
    public function __construct()
    {
        parent::__construct();

        $prefix = config('cms.shop.config.table-prefix', 'shop_');
        $this->table = $prefix.$this->table;
    }
}
