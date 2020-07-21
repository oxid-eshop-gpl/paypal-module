<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The transaction details.
 */
class Transaction extends \CaptureStatus implements \JsonSerializable
{
    /** @var string */
    public $id;

    /** @var AmountWithBreakdown */
    public $amount_with_breakdown;

    /** @var Name */
    public $payer_name;

    /** @var string */
    public $payer_email;

    /** @var string */
    public $time;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
