<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * A customer request to accept the offer made by the merchant.
 */
class AcceptOffer implements \JsonSerializable
{
    /** @var string */
    public $note;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
