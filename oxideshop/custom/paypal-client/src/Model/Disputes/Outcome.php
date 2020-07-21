<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The outcome of the dispute case.
 */
class Outcome implements \JsonSerializable
{
    /** @var string */
    public $faulty_party;

    /** @var string */
    public $adjudication_reason;

    /** @var string */
    public $resolution_date;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
