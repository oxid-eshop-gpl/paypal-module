<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The refund details.
 */
class RefundDetails implements \JsonSerializable
{
    /** @var Money */
    public $allowed_refund_amount;

    /** @var array */
    public $refunds;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
