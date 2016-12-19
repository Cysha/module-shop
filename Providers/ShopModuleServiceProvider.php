<?php namespace Cms\Modules\Shop\Providers;

use Cms\Modules\Core\Providers\BaseModuleProvider;

class ShopModuleServiceProvider extends BaseModuleProvider
{

    /**
     * Register the defined middleware.
     *
     * @var array
     */
    protected $middleware = [
        'Shop' => [
        ],
    ];

    /**
     * The commands to register.
     *
     * @var array
     */
    protected $commands = [
        'Shop' => [
        ],
    ];

    /**
     * Register view composers
     *
     * @var array
     */
    protected $composers = [
        'Shop' => [
        ],
    ];

    /**
     * Register repository bindings to the IoC
     *
     * @var array
     */
    protected $bindings = [

    ];

    /**
     * Register Auth related stuffs
     */
    public function register()
    {
        parent::register();

    }

}
