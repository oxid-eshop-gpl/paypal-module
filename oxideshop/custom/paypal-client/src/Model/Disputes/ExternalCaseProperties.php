<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The third-party claims properties.
 */
class ExternalCaseProperties implements \JsonSerializable
{
    /** @var string */
    public $reference_id;

    /** @var string */
    public $external_type;

    /** @var string */
    public $recovery_type;

    /** @var Money */
    public $reversal_fee;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
