<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The individual owner of the account.
 */
class IndividualOwner extends string implements \JsonSerializable
{
    /** @var string */
    public $type;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
