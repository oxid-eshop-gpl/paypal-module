<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * The merchant-preferred payment methods.
 */
class PayeePaymentMethodPreference implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
