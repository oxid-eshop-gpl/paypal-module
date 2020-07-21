<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * The payment card to use to fund a payment. Can be a credit or debit card.
 */
class Card implements \JsonSerializable
{
    /** @var string */
    public $id;

    /** @var string */
    public $name;

    /** @var string */
    public $number;

    /** @var string */
    public $expiry;

    /** @var string */
    public $security_code;

    /** @var string */
    public $last_digits;

    /** @var string */
    public $card_type;

    /** @var AddressPortable */
    public $billing_address;

    /** @var array */
    public $authentication_results;

    /** @var CardAttributes */
    public $attributes;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
