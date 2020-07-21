<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The subscriber response information.
 */
class Subscriber extends Payer implements JsonSerializable
{
    use BaseModel;

    /**
     * @var ShippingDetail
     * The shipping details.
     */
    public $shipping_address;

    /**
     * @var PaymentSourceResponse
     * The payment source used to fund the payment.
     */
    public $payment_source;
}
