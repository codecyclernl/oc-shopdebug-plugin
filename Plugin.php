<?php namespace Kloos\ShopDebug;

use Event;
use Backend;
use System\Classes\PluginBase;
use Kloos\ShopDebug\Classes\Event\ExtendPaymentMethodCollection;
use Kloos\ShopDebug\Classes\Event\ExtendPaymentOptionFieldsHandler;

/**
 * ShopDebug Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'ShopDebug',
            'description' => 'No description provided yet...',
            'author'      => 'Kloos',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        Event::subscribe(ExtendPaymentMethodCollection::class);
        Event::subscribe(ExtendPaymentOptionFieldsHandler::class);
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Kloos\ShopDebug\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'kloos.shopdebug.some_permission' => [
                'tab' => 'ShopDebug',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'shopdebug' => [
                'label'       => 'ShopDebug',
                'url'         => Backend::url('kloos/shopdebug/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['kloos.shopdebug.*'],
                'order'       => 500,
            ],
        ];
    }
}
