<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Pricing directive for transaction indication the source and type of pricing.
 */
class PricingDirective implements \JsonSerializable
{
    /** @var string */
    public $participant_type;

    /** @var string */
    public $account_number;

    /** @var string */
    public $type;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
