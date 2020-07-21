<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The provide supporting information request details.
 */
class ProvideSupportingInfo implements \JsonSerializable
{
    /** @var string */
    public $notes;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
