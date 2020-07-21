<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The method used to contact the merchant.
 */
class MerchantContactedMode implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
