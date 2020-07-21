<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The recurring billing canceled details.
 */
class CanceledRecurringBilling implements \JsonSerializable
{
    /** @var Money */
    public $expected_refund;

    /** @var CancellationDetails */
    public $cancellation_details;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
