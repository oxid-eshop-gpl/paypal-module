<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * Transaction signature status identifier.
 */
class SignatureVerificationStatus implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
