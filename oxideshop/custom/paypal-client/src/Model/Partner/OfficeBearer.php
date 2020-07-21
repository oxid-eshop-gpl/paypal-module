<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The office bearer associated to the account.
 */
class OfficeBearer extends string implements \JsonSerializable
{
    /** @var string */
    public $role;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
