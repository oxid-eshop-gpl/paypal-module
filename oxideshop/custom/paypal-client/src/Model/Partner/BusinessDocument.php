<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The documents associated with the business.
 */
class BusinessDocument extends \Document implements \JsonSerializable
{
    /** @var string */
    public $type;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
