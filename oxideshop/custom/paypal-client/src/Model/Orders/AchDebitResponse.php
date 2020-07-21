<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * ACH bank details response object
 */
class AchDebitResponse implements \JsonSerializable
{
    /** @var string */
    public $last_digits;

    /** @var string */
    public $routing_number;

    /** @var string */
    public $account_holder_name;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
