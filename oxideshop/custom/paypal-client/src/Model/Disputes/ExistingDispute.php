<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The dispute details.
 */
class ExistingDispute implements \JsonSerializable
{
    /** @var string */
    public $id;

    /** @var string */
    public $create_time;

    /** @var string */
    public $update_time;

    /** @var string */
    public $reason;

    /** @var string */
    public $status;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
