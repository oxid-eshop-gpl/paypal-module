<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The Apple Pay Wallet used to fund a payment.
 */
class ApplePayWalletResponse implements \JsonSerializable
{
    /** @var ApplePayCardResponse */
    public $card;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
