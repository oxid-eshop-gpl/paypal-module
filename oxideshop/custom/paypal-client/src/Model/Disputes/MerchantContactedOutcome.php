<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The outcome when the customer has contacted the merchant.
 */
class MerchantContactedOutcome implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
