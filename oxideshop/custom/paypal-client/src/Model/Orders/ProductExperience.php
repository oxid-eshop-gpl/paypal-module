<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The product experiences that a user completes on a PayPal transaction.
 */
class ProductExperience implements \JsonSerializable
{
    /** @var string */
    public $user_experience_flow;

    /** @var string */
    public $entry_point;

    /** @var string */
    public $payment_method;

    /** @var string */
    public $channel;

    /** @var string */
    public $product_flow;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
