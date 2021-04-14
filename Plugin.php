<?php namespace Codecycler\ShopDebug;

use Event;
use Backend;
use System\Classes\PluginBase;
use Codecycler\ShopDebug\Classes\Event\ExtendPaymentMethodCollection;
use Codecycler\ShopDebug\Classes\Event\ExtendPaymentOptionFieldsHandler;

/**
 * ShopDebug Plugin Information File
 */
class Plugin extends PluginBase
{
    public $require = [
        'Lovata.Shopaholic',
        'Lovata.OrdersShopaholic',
        'Lovata.Toolbox',
    ];

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Debug plugin for Shopaholic',
            'description' => 'This plugin let\'s you debug your Shopaholic webshop',
            'author'      => 'Codecycler',
            'icon'        => 'icon-leaf'
        ];
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
}
