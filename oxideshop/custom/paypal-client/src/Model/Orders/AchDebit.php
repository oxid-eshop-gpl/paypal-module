<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * ACH bank details required to fund the payment.
 */
class AchDebit implements \JsonSerializable
{
    /** @var string */
    public $account_number;

    /** @var string */
    public $routing_number;

    /** @var string */
    public $account_type;

    /** @var string */
    public $account_holder_name;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
