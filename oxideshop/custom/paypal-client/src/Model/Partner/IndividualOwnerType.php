<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * Role of the person party played in the account.
 */
class IndividualOwnerType implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
