<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The payment source definition. To be eligible to create subscription using debit or credit card, you will need to sign up here (https://www.paypal.com/bizsignup/entry/product/ppcp). Please note, its available only for non-3DS cards and for merchants in US and AU regions.
 */
class PaymentSource implements \JsonSerializable
{
    /** @var Card */
    public $card;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
