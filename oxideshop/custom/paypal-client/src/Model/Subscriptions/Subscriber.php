<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The subscriber response information.
 */
class Subscriber extends \Payer implements \JsonSerializable
{
    /** @var ShippingDetail */
    public $shipping_address;

    /** @var PaymentSourceResponse */
    public $payment_source;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
