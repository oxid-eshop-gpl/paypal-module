<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The subscriber request information .
 */
class SubscriberRequest extends Payer implements \JsonSerializable
{
    use BaseModel;

    /** @var ShippingDetail */
    public $shipping_address;

    /** @var PaymentSource */
    public $payment_source;
}
