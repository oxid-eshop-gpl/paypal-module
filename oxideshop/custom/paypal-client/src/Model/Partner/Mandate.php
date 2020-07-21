<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * Seller’s consent to operate on this financial instrument.
 */
class Mandate implements \JsonSerializable
{
    /** @var boolean */
    public $accepted;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
