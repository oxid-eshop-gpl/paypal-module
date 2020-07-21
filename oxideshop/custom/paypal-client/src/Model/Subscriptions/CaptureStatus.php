<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The status of a captured payment.
 */
class CaptureStatus implements \JsonSerializable
{
    /** @var string */
    public $status;

    /** @var CaptureStatusDetails */
    public $status_details;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
