<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The refund status.
 */
class RefundStatus implements \JsonSerializable
{
    /** @var string */
    public $status;

    /** @var RefundStatusDetails */
    public $status_details;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
