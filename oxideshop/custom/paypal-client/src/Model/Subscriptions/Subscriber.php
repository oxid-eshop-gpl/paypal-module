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

    /** @var ShippingDetail */
    public $shipping_address;

    /** @var PaymentSourceResponse */
    public $payment_source;
}
