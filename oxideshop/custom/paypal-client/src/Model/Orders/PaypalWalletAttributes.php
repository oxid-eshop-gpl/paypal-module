<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Additional attributes associated with the use of this paypal wallet
 */
class PaypalWalletAttributes implements \JsonSerializable
{
    /** @var Customer */
    public $customer;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
