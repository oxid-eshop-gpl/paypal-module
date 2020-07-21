<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * The date and time stamps that are common to authorized payment, captured payment, and refund transactions.
 */
class ActivityTimestamps implements \JsonSerializable
{
    /** @var string */
    public $create_time;

    /** @var string */
    public $update_time;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
