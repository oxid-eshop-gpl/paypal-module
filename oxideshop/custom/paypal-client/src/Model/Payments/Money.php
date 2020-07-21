<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * The currency and amount for a financial transaction, such as a balance or payment due.
 */
class Money implements \JsonSerializable
{
    /** @var string */
    public $currency_code;

    /** @var string */
    public $value;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
