<?php namespace Codecycler\ShopDebug\Classes\Event;

use Lovata\OrdersShopaholic\Models\PaymentMethod;
use Lovata\OrdersShopaholic\Controllers\PaymentMethods;
use Lovata\Toolbox\Classes\Event\AbstractBackendFieldHandler;

class ExtendPaymentOptionFieldsHandler extends AbstractBackendFieldHandler
{
    public function extendFields($obWidget)
    {
        $arFieldList = [
            'is_admin_only' => [
                'label' => 'Is admin only',
                'span' => 'left',
                'type' => 'checkbox',
            ],
        ];

        $obWidget->addFields($arFieldList);
    }

    protected function getControllerClass() : string
    {
        return PaymentMethods::class;
    }

    protected function getModelClass() : string
    {
        return PaymentMethod::class;
    }
}