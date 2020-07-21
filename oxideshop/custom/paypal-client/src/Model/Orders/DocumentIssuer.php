<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The document-issuing authority information.
 */
class DocumentIssuer implements \JsonSerializable
{
    /** @var string */
    public $country_code;

    /** @var string */
    public $province_code;

    /** @var string */
    public $authority;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
