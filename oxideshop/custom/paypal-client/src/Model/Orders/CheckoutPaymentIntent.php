<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The intent to either capture payment immediately or authorize a payment for an order after order creation.
 */
class CheckoutPaymentIntent implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
