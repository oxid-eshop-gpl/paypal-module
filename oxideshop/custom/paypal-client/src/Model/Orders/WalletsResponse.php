<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The customer's wallet used to fund the transaction.
 */
class WalletsResponse implements \JsonSerializable
{
    /** @var ApplePayWalletResponse */
    public $apple_pay;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
