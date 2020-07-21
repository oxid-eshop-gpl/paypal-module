<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The payment card used to fund the payment. Card can be a credit or debit card.
 */
class CardResponseWithBillingAddress extends \CardResponse implements \JsonSerializable
{
    /** @var string */
    public $name;

    /** @var AddressPortable */
    public $billing_address;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
