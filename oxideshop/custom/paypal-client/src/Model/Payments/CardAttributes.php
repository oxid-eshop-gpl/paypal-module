<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * Additional attributes associated with the use of this card
 */
class CardAttributes implements \JsonSerializable
{
    /** @var Customer */
    public $customer;

    /** @var CardVerification */
    public $verification;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
