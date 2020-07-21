<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * A merchant- or customer-submitted supporting information.
 */
class SupportingInfo implements \JsonSerializable
{
    /** @var string */
    public $notes;

    /** @var array */
    public $documents;

    /** @var string */
    public $source;

    /** @var string */
    public $provided_time;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
