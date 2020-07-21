<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The details for the regulation under which the transaction is covered.
 */
class RegulationInfo implements \JsonSerializable
{
    /** @var string */
    public $regulation_covered;

    /** @var string */
    public $resolution_sla;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
