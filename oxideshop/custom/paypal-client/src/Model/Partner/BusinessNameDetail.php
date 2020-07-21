<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * Name of the business provided.
 */
class BusinessNameDetail extends \BusinessName implements \JsonSerializable
{
    /** @var string */
    public $id;

    /** @var string */
    public $type;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
