<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The cancellation details.
 */
class CancellationDetails implements \JsonSerializable
{
    /** @var string */
    public $cancellation_date;

    /** @var string */
    public $cancellation_number;

    /** @var boolean */
    public $cancelled;

    /** @var string */
    public $cancellation_mode;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
