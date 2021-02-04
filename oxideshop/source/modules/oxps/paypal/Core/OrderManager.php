<?php

namespace OxidProfessionalServices\PayPal\Core;

use OxidEsales\Eshop\Core\Registry;
use OxidProfessionalServices\PayPal\Api\Model\Orders\PurchaseUnit;
use OxidProfessionalServices\PayPal\Api\Model\Orders\ShippingDetail;
use OxidProfessionalServices\PayPal\Core\PaypalSession;

class OrderManager
{
    public function prepareOrderForPayNowFromCaptureOrderResponse($orderCaptureResponse)
    {
        // To implement
        $requestId = $orderCaptureResponse->id;
        $payer = $orderCaptureResponse->payer;
        $emailAddress = $payer->email_address;
        $purchaseUnits = $orderCaptureResponse->purchase_units;

        /** @var PurchaseUnit $purchaseUnit */
        foreach ($purchaseUnits as $purchaseUnit) {
            /** @var ShippingDetail $shipping */
            $shipping = $purchaseUnit->shipping;
            // only use the first one or?
            continue;
        }
    }

    public function prepareOrderForContinue($orderId)
    {
        PaypalSession::storePaypalOrderId($orderId);
    }
}
