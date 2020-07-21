<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Disbursement type.
 */
class DisbursementType implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
