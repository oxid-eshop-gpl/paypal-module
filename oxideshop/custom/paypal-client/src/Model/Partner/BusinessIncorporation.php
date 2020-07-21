<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * Business incorporation information.
 */
class BusinessIncorporation implements \JsonSerializable
{
    /** @var string */
    public $incorporation_country_code;

    /** @var string */
    public $incorporation_date;

    /** @var string */
    public $incorporation_province_code;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
