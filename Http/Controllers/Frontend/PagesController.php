<?php namespace Cms\Modules\Shop\Http\Controllers\Frontend;

class PagesController extends BaseController
{

    public function getIndex()
    {
        return $this->setView('frontend.index', [

        ]);
    }


}
