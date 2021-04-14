<?php namespace Codecycler\ShopDebug\Classes\Event;

use BackendAuth;
use Lovata\OrdersShopaholic\Models\PaymentMethod;
use Lovata\OrdersShopaholic\Classes\Collection\PaymentMethodCollection;

class ExtendPaymentMethodCollection
{
    public function subscribe()
    {
        PaymentMethodCollection::extend(function ($obPaymentMethodCollection) {
            $obPaymentMethodCollection->addDynamicMethod('processAdminOnly', function () use ($obPaymentMethodCollection) {
                if (!BackendAuth::getUser()) {
                    // Filter list
                    $arElementIDList = PaymentMethod::where('is_admin_only', 0)->get()->pluck('id')->toArray();

                    return $obPaymentMethodCollection->intersect($arElementIDList);
                } else {
                    return $obPaymentMethodCollection;
                }
            });
        });
    }
}