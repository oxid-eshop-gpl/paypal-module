<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * A resource that identies that a paypal wallet is used for payment.
 */
class PaypalWallet implements \JsonSerializable
{
    /** @var string */
    public $payment_method_preference;

    /** @var PaypalWalletAttributes */
    public $attributes;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
