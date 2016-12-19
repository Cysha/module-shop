<?php namespace Cms\Modules\Shop\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Cms\Modules\Core\Providers\BaseEventsProvider;

class ShopEventsProvider extends BaseEventsProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [

    ];

    /**
     * The subscriber classes to register.
     *
     * @var array
     */
    protected $subscribe = [

    ];


    /**
     * Register any other events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

    }

}
