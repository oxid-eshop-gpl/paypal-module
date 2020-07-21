<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The subsequent action.
 */
class SubsequentAction implements \JsonSerializable
{
    /** @var array */
    public $links;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
