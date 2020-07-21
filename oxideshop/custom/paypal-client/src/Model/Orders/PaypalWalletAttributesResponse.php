<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Additional attributes associated with the use of a PayPal Wallet.
 */
class PaypalWalletAttributesResponse implements \JsonSerializable
{
    /** @var VaultResponse */
    public $vault;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
