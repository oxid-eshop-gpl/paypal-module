<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Completes an action for an order.
 */
class OrderValidateRequest implements \JsonSerializable
{
    /** @var ExtendedPaymentSource */
    public $payment_source;

    /** @var OrderValidateApplicationContext */
    public $application_context;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
