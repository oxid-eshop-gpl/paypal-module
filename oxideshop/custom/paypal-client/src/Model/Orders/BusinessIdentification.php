<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Business identification details.
 */
class BusinessIdentification implements \JsonSerializable
{
    /** @var string */
    public $type;

    /** @var string */
    public $identifier;

    /** @var DocumentIssuer */
    public $issuer;

    /** @var string */
    public $issued_time;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
