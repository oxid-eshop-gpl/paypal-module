<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * A payment source that has additional authentication challenges.
 */
class ExtendedPaymentSource extends \PaymentSource implements \JsonSerializable
{
    /** @var array */
    public $contingencies;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
